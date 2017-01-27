<?php

namespace App\Http\Controllers\HiddenLink;

use App\HiddenLink\SocialAccountService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use Session;


class SocialAuthController extends Controller
{
    public function index() {
        Session::put('redirect_to', $_SERVER["REQUEST_URI"]);
        if (auth()->user()) {
            return view('hidden.index', [

            ]);
        }
        return view('hidden.index');
    }
    public function redirect(Request $request) {

        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service) {
        $providerUser = Socialite::driver('facebook')->user();
        $user = $service->createOrGetUser($providerUser);
        auth()->login($user);
        Session::put('fb_user_access_token', (string) $providerUser->token);
        return redirect()->route('link.index');
    }
}
