<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
   public function Register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15',
            'email' => 'required|string|email|unique:users|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 201);
    }

     function LoginUser(Request $data){
        $data->validate([
            'email' => 'required | email ',
            'password' => 'required '
        ],
        [
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        ]);

        $user = User::where('email', $data->email)->first();
        if($user && Hash::check($data->password, $user->password)){

            if($user->role === 'admin') {
                return "admin";
            } else {
                return "user";
            }
        } else {
            return "login failed";
        }
    }
}
