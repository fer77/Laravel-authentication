<?php
namespace App;

use Illuminate\Http\Requests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticatesUser
{
    use ValidatesRequests;

    protected $requests;

    public function __constructor(Request $request)
    {
        $this->request = $request;
    }

    public function invite()
    {
        // Validate the request
        $this->validateRequest();
        // Create a token
            //  ->createToken()
        // Send token to user
            //  ->send();
    }

    protected function validateRequest()
    {
        $this->validate($this->request, [
            'email' => 'required|email|exists:users'
        ]);

        return $this;
    }

    private function createToken()
    {
        //... @ 11:56
    }
}