<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User logged in successfully',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'Username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:15',
            'role' => 'required|string|in:admin,user,superadmin',
            'google_id' => 'nullable|string',
            'google_token' => 'nullable|string',
            'google_refresh_token' => 'nullable|string',
        ]);

        $user = User::create([
            'Username' => $request->Username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'nomor_telepon' => $request->nomor_telepon,
            'role' => $request->role,
            'google_id' => $request->google_id,
            'google_token' => $request->google_token,
            'google_refresh_token' => $request->google_refresh_token,
        ]);

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User created successfully',
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        $request->validate([
            'Username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:15',
            'role' => 'required|string|in:admin,user,superadmin',
            'google_id' => 'nullable|string',
            'google_token' => 'nullable|string',
            'google_refresh_token' => 'nullable|string',
        ]);

        $user->Username = $request->Username;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->alamat = $request->alamat;
        $user->nomor_telepon = $request->nomor_telepon;
        $user->role = $request->role;
        $user->google_id = $request->google_id;
        $user->google_token = $request->google_token;
        $user->google_refresh_token = $request->google_refresh_token;
        $user->save();

        return response()->json([
            'success' => true,
            'data' => $user,
            'message' => 'User updated successfully',
        ]);
    }

    // Logout user (API)
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'success' => true,
            'message' => 'User logged out successfully',
        ]);
    }
}
