<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginToken extends Model
{
    
    public static function generateFor(User $user)
    {
        return static::create([
            'user_id' => $user->id, // associates token to a user's email address.
            'token' => str_random(50) //creates a random token.
        ]);
    }
}
