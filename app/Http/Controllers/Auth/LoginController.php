<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
     * Where to redirect users after login.*
     * 
     * @var string
     * 
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $this->LoginOrReg($user , "google");
        return redirect()->route('home');
    }
    // //////////
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        $this->LoginOrReg($user , "meta");
        return redirect()->route('home');
    }
    // /////////
    public function redirectToGit()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleGitCallback()
    {
        $user = Socialite::driver('github')->user();
        $this->LoginOrReg($user , "git");
        return redirect()->route('home');
    }
    // 
    protected function LoginOrReg($data, $prv = "")
    {
        $user = User::where('email', 'LIKE', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->email = $data->email;
            $user->name = $data->name;
            $user->provider    = $prv;
            $user->provider_id  = $data->id;
            $user->avatar = $data->avatar;
            $user->role_id = 4;
            $user->save();
        }
        Auth::login($user, true);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
