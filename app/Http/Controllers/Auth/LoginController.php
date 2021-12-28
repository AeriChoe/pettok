<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    //github Login
    public function githubRedirectTo() {
        return Socialite::driver('github')->redirect();
    }
    
    public function githubProviderCallback()
    {
        $githubUser = Socialite::driver('github')->user();
        
        $name = $githubUser->getName();
        $email = $githubUser->getEmail();
        $providerID = $githubUser->getId();
        $no_name = explode('@', $email)[0];
        
        $user = User::where('email', $email)->first();

        if (!$user) {
            if($name == '') {
                $user = User::create([
                    'email' => $email,
                    'name' => $no_name,
                    'provider_id' => $providerID,
                ]);
            } else {
                $user = User::create([
                    'email' => $email,
                    'name' => $name,
                    'provider_id' => $providerID,
                ]);
            }
        }
        
        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
    
    
}
