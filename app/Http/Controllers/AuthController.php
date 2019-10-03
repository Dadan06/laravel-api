<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Http\Resources\AuthResource;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return AuthResource
     */
    public function login()
    {
        $credentials = request(['login', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return (new AuthResource(['message' => 'Unauthorized']))->response()->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }

        return new AuthResource(['token' => $token]);
    }

    /**
     * Get the authenticated User.
     *
     * @return AuthResource
     */
    public function me()
    {
        return new AuthResource(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return AuthResource
     */
    public function logout()
    {
        auth()->logout();

        return new AuthResource(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return AuthResource
     */
    public function refresh()
    {
        return new AuthResource(auth()->refresh());
    }
}
