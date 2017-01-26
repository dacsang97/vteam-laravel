<?php

namespace App\Http\Controllers\HiddenLink;

use App\HiddenLink\SocialAccountService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;


class SocialAuthController extends Controller
{
    public function index() {
        return view('hidden.index');
    }
    public function redirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service) {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->route('link.index');
    }
}
