<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $gitHubUser = Socialite::driver('github')->user();

        $user = $this->findOrCreateGitHubUser(
            Socialite::driver('github')->user()
        );

        auth()->login($user);

        return redirect('/');

        // $user->token;

    }

    protected function findOrCreateGitHubUser($githubUser)
    {
        $user = User::firstOrNew(['github_id' => $githubUser->id]);

        if ($user->exists) return $user;

        $user->fill([
            'username' => $githubUser->nickname,
            'email' => $githubUser->email,
            'avatar' => $githubUser->avatar
        ])->save();

        return $user;
    }
}
