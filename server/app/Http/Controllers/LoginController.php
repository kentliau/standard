<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'Email or password is incorrect.'
        ]);

        if (Auth::attempt($credentials)) {
            // $request->session()->regenerate();
            $token = $request->user()->createToken('multi_client_personal_access_tokens');

            return response()->json([
                'message' => 'Successfully logged in.',
                'token' => $token->plainTextToken
            ]);
        }
    }

    /**
     * Verify a token is valid or not, it verified via route middleware.
     * If able to come till this method it is guaranteed to be valid,
     * here just an opportunity to do more stuff.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validateToken(Request $request) {
        $message = 'Is valid token.';
        $isValid = true;

        return response()->json([
            'message' => $message,
            'is_valid' => $isValid
        ]);
    }

    /**
     * Invalidate all current user's token
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request) {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'message' => 'All token invalidated.'
        ]);
    }
}