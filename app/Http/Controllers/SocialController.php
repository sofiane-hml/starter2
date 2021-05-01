<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class SocialController extends Controller
{

    // // facebook
    // public function redirect($service){

    //     return Socialite::driver($service)->redirect();

    // }

    // public function callback($service){

    //     return $user = Socialite::with($service)->user();

    // }
    // // end facebook


    //facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

    }
}
