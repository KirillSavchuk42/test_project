<?php

namespace App\Http\Middleware;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

/**
 * Authenticate Middleware
 *
 * @class App\Http\Middleware\Authenticate
 * @package App\Http\Middleware
 */
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param Request $request
     * @param array $guards
     * @return void
     * @throws AuthenticationException
     */
    protected function unauthenticated($request, array $guards): void
    {
        if ($request->is('api/*')) {
            throw new AuthenticationException(
                'Authentication token is missing or invalid..', $guards
            );
        }

        parent::unauthenticated($request, $guards);
    }
}
