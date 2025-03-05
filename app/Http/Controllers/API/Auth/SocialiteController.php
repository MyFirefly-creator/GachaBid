<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect()
    {
        $url = Socialite::driver('google')->redirect()->getTargetUrl();
        return response()->json(['url' => $url]);
    }

    public function callback(Request $request)
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate([
                'google_id' => $socialUser->id,
            ], [
                'Username' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => Hash::make('password'),
                'google_token' => $socialUser->token,
                'google_refresh_token' => $socialUser->refreshToken ?? null,
                'NamaLengkap' => $socialUser->name,
                'image' => $socialUser->getAvatar(),
                'role' => 'user',
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'user' => $user,
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Google authentication failed.'], 500);
        }
    }
}
