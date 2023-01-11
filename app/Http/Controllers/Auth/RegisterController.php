<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\hs_access_log;
use App\Models\hs_user_account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date:DD-MM-YYYY'],
            'tempat_lahir'  => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:hs_user_accounts'],
            'handphone'     => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string', 'max:255'],
            'agama'         => ['required', 'string', 'max:255'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\hs_user_account
     */
    protected function create(array $data)
    {
        return hs_user_account::create([
            'name'          => $data['name'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'tempat_lahir'  => $data['tempat_lahir'],
            'email'         => $data['email'],
            'handphone'     => $data['handphone'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'agama'         => $data ['agama'],
            'password'      => Hash::make($data['password']),
        ]);
    }


  public function userRegister(Request $request){

    $user  = $request->validate([
        'name'          => ['required', 'string', 'max:255'],
        'tanggal_lahir' => ['required', 'date:DD-MM-YYYY'],
        'tempat_lahir'  => ['required', 'string', 'max:255'],
        'email'         => ['required', 'string', 'email', 'max:255', 'unique:hs_user_accounts'],
        'handphone'     => ['required', 'string', 'max:255'],
        'jenis_kelamin' => ['required', 'string', 'max:255'],
        'agama'         => ['required', 'string', 'max:255'],
        'password'      => ['required', 'string', 'min:8', 'confirmed'], 
    ]);

            //$ipadd = hs_access_log::get('mac_address');  
            //$mac = explode(" ", $ipadd);
           //$mac_address = $mac[0];

           // $ipaddress = $request->ip();
            //$user ['mac_address'] = $ipadd;
            /* $ip = $request->ip(); Dynamic IP address */
        //$ip = '48.188.144.248'; /* Static IP address */
        //$currentUserInfo = Location::get($ip);
          
            return view('home', compact('currentUserInfo'));
            $user ['password'] = Hash::make($request->password);
            hs_user_account::create($user);
            return redirect()->route('home');
 
     }


  public function getIpAddress(Request $request)
  { 
  
 /* $ip = $request->ip(); Dynamic IP address */
 $ip = '48.188.144.248'; /* Static IP address */
 $currentUserInfo = Location::get($ip);
 dd($currentUserInfo);
 return view('home', compact('currentUserInfo'));
}
}
