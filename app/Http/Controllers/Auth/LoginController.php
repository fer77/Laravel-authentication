<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticatesUser;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function postLogin(AuthenticateUser $auth)
    {
        $auth->invite();

        return 'Sweet - check your email.';
    }
}
