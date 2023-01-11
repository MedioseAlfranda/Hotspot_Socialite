<?php

namespace App\Http\Controllers\Auth;

use Exception;
use App\Models\hs_access_log;
use App\Models\hs_user_account;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        Error_log('test0');
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider(String $provider)
    {
        return Socialite::driver($provider)->redirect();
    }
 
    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(String $provider)
    {
          //Memanggil Base asal Socialite 
          $userSocial = Socialite::driver($provider)->user();

        //Mengecek apakah user ada dan user sudah masuk
         $user = hs_user_account::where('email', $userSocial->user['email'])->first();
         if($user){
            if(Auth::loginUsingId($user->id)){
                return redirect()->route('home');
            }
         }
         $userSignIn = hs_user_account::create([
            'name'          => $userSocial->user['name'],      
            'email'         => $userSocial->user['email'],
            'password'      => bcrypt('12345'),
            'avatar'        => $userSocial->avatar,
            //'jenis_kelamin' => $userSocial->user['gender'],
        ]);

         $userSignIn->socialAccounts()->create([
            'socialprovider_id'=>$userSocial->getId(),
            'method'=>$provider
        ]);

        if ($userSignIn){
            if(Auth::loginUsingId($userSignIn->id)){
                return redirect()->route('home'); 
        }else{
            
        }

      }
   }
}

    

