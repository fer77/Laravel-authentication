<?php
namespace App;

use Illuminate\Foundation\Validation\ValidatesRequests;

class AuthenticatesUser
{
    public function invite()
    {
        // Validate the request
        $this->validateRequest()
        // Create a token
             ->createToken()
        // Send token to user
             ->send();
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