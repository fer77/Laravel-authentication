<?php

namespace App\Http\Controllers\Auth;

use App\AuthenticatesUser;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    protected $auth;

    public function __construct(AuthenticatesUser $auth)
    {
        $this->auth = $auth;
    }

    public function login()
    {
        return view('login');
    }

    public function postLogin(AuthenticatesUser $auth)
    {
        $auth->invite();

        return 'Sweet - check your email.';
    }

    public function authenticate(LoginToken $token)
    {
        $this->auth->login($token);
    }
}
