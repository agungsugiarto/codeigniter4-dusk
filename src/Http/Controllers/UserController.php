<?php

namespace Fluent\Dusk\Http\Controllers;

use CodeIgniter\Controller;
use Illuminate\Support\Str;
use Fluent\Auth\Facades\Auth;

class UserController extends Controller
{
    /**
     * Retrieve the authenticated user identifier and class name.
     *
     * @param  string|null  $guard
     * @return array
     */
    public function user($guard = null)
    {
        $user = Auth::guard($guard)->user();

        if (! $user) {
            return [];
        }

        return [
            'id' => $user->getAuthIdColumn(),
            'className' => get_class($user),
        ];
    }

    /**
     * Login using the given user ID / email.
     *
     * @param  string  $userId
     * @param  string|null  $guard
     * @return void
     */
    public function login($userId, $guard = null)
    {
        $guard = $guard ?: config('auth')->defaults['guard'];

        $provider = Auth::guard($guard)->getProvider();

        $user = Str::contains($userId, '@')
            ? $provider->findByCredentials(['email' => $userId])
            : $provider->findById($userId);

        Auth::guard($guard)->login($user);
    }

    /**
     * Log the user out of the application.
     *
     * @param  string|null  $guard
     * @return void
     */
    public function logout($guard = null)
    {
        $guard = $guard ?: config('auth')->defaults['guard'];

        Auth::guard($guard)->logout();
    }
}
