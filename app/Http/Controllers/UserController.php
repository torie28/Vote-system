<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'admission_number' => 'required|string|unique:users,admission_number|max:255',
            'password' => 'required|string|min:8|confirmed',  // 'confirmed' ensures password confirmation is required
        ]);

        // Create and store the new user
        $user = new User();
        $user->name = $request->name;
        $user->admission_number = $request->admission_number;
        $user->password = Hash::make($request->password); // Hash the password before saving

        // Optional: Generate and save a token (if necessary)
        $user->token = bin2hex(openssl_random_pseudo_bytes(16)); // Generate a random token if needed

        // Save the user to the database
        $user->save();

        // Optionally return a response or redirect
        return response()->json([
            'message' => 'User created successfully!',
            'user' => $user
        ], 201);
    }
}
