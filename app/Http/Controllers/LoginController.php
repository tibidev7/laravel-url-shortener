<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function request()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $google = Socialite::driver('google')->user();

        $checkForUser = User::where('google_id', $google->getId())->first();

        if ($checkForUser) {
            Auth::login($checkForUser, true);
        } else {
            $createUser = User::create([
                'name' => $google->getName(),
                'email' => $google->getEmail(),
                'google_id' => $google->getId(),
                'avatar' => $google->getAvatar()
            ]);
            Auth::login($createUser, true);
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
