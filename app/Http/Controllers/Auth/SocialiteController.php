<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\hs_access_log;
use App\Models\hs_user_account;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToProvider(String $provider)
    {
        return Socialite::driver($provider)->redirect();
    }

   /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProvideCallback(String $provider)
    {
        try {

            $social_user = Socialite::driver($provider)->user();

            $account = hs_access_log::where([
                  'method'=>$provider,
                  'socialprovider_id'=>$social_user->getId()
            ])->first();

            
            if($account){
                auth()->login($account->user);
                return redirect()->route('home');
            }


            $user = hs_user_account::where([
                   'email'=>$social_user->getEmail()
            ])->first();


            if(!$user){
                $user = hs_user_account::create([
                    'email'=>$social_user->getEmail(),
                    'name'=>$social_user->getName()
                ]);
            }

            $user->socialAccounts()->create([
                'socialprovider_id'=>$social_user->getId(),
                'method'=>$provider
            ]);

            // Login
            auth()->login($user);
            return redirect()->route('home');

        }catch(\Exception $e){
            return redirect()->route('login');
        }
    }   
}