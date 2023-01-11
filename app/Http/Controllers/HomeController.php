<?php

namespace App\Http\Controllers;

use console;
use Error;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        Error_log('test1');
        $user = auth()->user();
        $subs =$user->authentication;
        $ip = '101.128.76.14'; /* Static IP address */ //request()->ip();
        $currentUserInfo = Location::get($ip);     
        return view('home', compact('currentUserInfo'));
    
    }
}


//compact('subs')