<?php
namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticatesUser
{
    use ValidatesRequests;

    protected $request;

    public function __constructor(Request $request)
    {
        $this->request = $request;
    }

    public function invite()
    {
        // Validate the request
        $this->validateRequest()
        // Create a token
             ->createToken();
        // Send token to user
            //  ->send();
    }

    public function login(LoginToken $token)
    {
        // login the user associated to the token
        Auth::login($token->user);
        // delete the token
        $token->delete();
    }

    protected function validateRequest()
    {
        $this->validate($this->request, [
            'email' => 'required|email|exists:users'
        ]);

        return $this;
    }

    protected function createToken()
    {
        $user = User::byEmail($this->request->email);

        LoginToken::generateFor($user); // create a new row in the database.
    }
}