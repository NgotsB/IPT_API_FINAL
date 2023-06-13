<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Verify;
class AuthController extends Controller
{

    public function register(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $input['password'] = bcrypt($input['password']);
        $input['role'] = 'Student';
        $user = User::create($input);

        // Send verification email
        event(new Registered($user));
        Mail::to($user->email);
        // ->send(new VerifyEmail($user));

        // return response([
        //     'message' => 'User registered. Verification email sent.',
        //     'data' => [
        //         'user' => $user
        //     ]
        // ], 200);

        return response([
            'message' => 'User registered.',
            'data' => [
                'user' => $user
            ]
        ], 200);
    }

    

    public function login(Request $request)
    {

        $input = $request->all();

        
        $validate = Validator::make($input, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $user = User::where('email', $input['email'])->first();


        if (!$user->hasVerifiedEmail()) {
            return response([
                'message' => 'Please verify your email'
            ], 403);
        }

        

        // if ($user && $user->hasVerifiedEmail())
        // {
        //     return response([
        //         'message' => 'Please verify your email'
        //     ], 403);
        // }    


        if (!$user || !Hash::check($input['password'], $user->password)) {
            return response([
                'message' => "Your password is incorrect or this account doesn't exist. Please try again."
            ], 401);
        }

    

        $token = $user->createToken('game_token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token,
        ];

        return response([
            'data' => $response
        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response([
            'message' => "User logout."
        ]);
    }
}
