<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\hs_user_account;
use App\Http\Controllers\Controller;
use Faker\Provider\ar_EG\Text;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
public function loginwithgoogle(){
        return Socialite::driver('google')->redirect();
        
    }

public function loginwithfacebook(){
        return Socialite::driver('facebook')->redirect();

    }

public function loginwithgithub(){
        return Socialite::driver('github')->redirect();

    }


public function callbackwithgoogle(){

        try{
            $usergoogle = Socialite::driver('google')->user();
            $Dapatkanuser   = hs_user_account::where('email',$usergoogle->getEmail())->first();
            //periksa user apakah sudah ada dalam database //
            //$adauser = hs_user_account::where('email', $usergoogle->getEmail())->first()//;      
        
            //dd($usergoogle);
            
        if($Dapatkanuser){
            Auth::login($Dapatkanuser);
            return redirect()->intended('home');

        }else{
            $Dapatkanuser = hs_user_account::create([
                'name'     => $usergoogle->name,
                'email'    => $usergoogle->email,
                'avatar'   => $usergoogle->avatar, 
                'password' =>  Hash::make($usergoogle->getName(). '@'.$usergoogle->getId()),
            ]);

            $Dapatkanuser->socialAccounts()->create([
                'socialprovider_id' => $usergoogle->getId(),
                'method' => ('Google')
            ]);
        }
        Auth::login($Dapatkanuser);
        return redirect()->intended('home');
        }          
        catch (\Throwable $th){
                throw $th;
    }  
  }
  

public function callbackwithfacebook(){

    try{
        $userfacebook = Socialite::driver('facebook')->user();
        $Dapatkanuser   = hs_user_account::where('email',$userfacebook->getEmail())->first();
        //periksa user apakah sudah ada dalam database //
        //$adauser = hs_user_account::where('email', $usergoogle->getEmail())->first()//;      
    

    if($Dapatkanuser){
        Auth::login($Dapatkanuser);
        return redirect()->intended('home');

    }else{
        $Dapatkanuser = hs_user_account::create([
            'name'     =>  $userfacebook->name,
            'email'    =>  $userfacebook->email,
            'avatar'   =>  $userfacebook->avatar, 
            'password' =>  Hash::make($userfacebook->getName(). '@'. $userfacebook->getId()),
        ]);

        $Dapatkanuser->socialAccounts()->create([
            'socialprovider_id' =>  $userfacebook->getId(),
            'method' => ('Facebook')
        ]);
    }
    Auth::login($Dapatkanuser);
    return redirect()->intended('home');
    }          
    catch (\Throwable $th){
            throw $th;
   }   
}



public function callbackwithgithub(){

    try{
        $usergithub = Socialite::driver('github')->user();
        $Dapatkanuser   = hs_user_account::where('email',$usergithub->getEmail())->first();
        //periksa user apakah sudah ada dalam database //
        //$adauser = hs_user_account::where('email', $usergoogle->getEmail())->first()//;      


    if($Dapatkanuser){
        Auth::login($Dapatkanuser);
        return redirect()->intended('home');


    }else{
        $Dapatkanuser = hs_user_account::create([
            'name'     => $usergithub->name,
            'email'    => $usergithub->email,
            'avatar'   => $usergithub->avatar, 
            'password' =>  Hash::make($usergithub->getName(). '@'.$usergithub->getId()),
        ]);

        $Dapatkanuser->socialAccounts()->create([
            'socialprovider_id' => $usergithub->getId(),
            'method' => ('Github')
        ]);
    }
    Auth::login($Dapatkanuser);
    return redirect()->intended('home');
    }          
    catch (\Throwable $th){
            throw $th;
   }   
}




}