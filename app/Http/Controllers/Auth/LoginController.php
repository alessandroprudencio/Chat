<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Socialite;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function handleProviderCallback($provider)
    {
        try{
            $user = Socialite::driver($provider)->user();
            $createdUser = User::firstOrCreate([
                'email'=>$user->getEmail()
            ],[
                'name'=>$user->getName()
            ]);

            auth()->login($createdUser);
            return redirect('/');

        }catch(\GuzzleHttp\Exception\ClientException $e){
            dd($e);
        }
    }
}
