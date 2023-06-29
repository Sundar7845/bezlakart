<?php

namespace App\Http\Controllers\Frontend\Login;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacebookLoginController extends Controller
{
    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function facebookLoginStore()
    {

        $user = Socialite::driver('facebook')->user();
        $finduser = User::where('social_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            $notification = array(
                'message' => 'Logged in successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('myaccount')->with($notification);
        } else {

            $newUser = User::create([
                'user_name' => $user->name,
                'email' => $user->email,
                'social_id' => $user->id,
                'login_medium' => "facebook",
                'role_id' => 3,
            ]);

            Auth::login($newUser);

            $notification = array(
                'message' => 'Logged in successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('myaccount')->with($notification);
        }
    }
}
