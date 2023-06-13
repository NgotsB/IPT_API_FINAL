<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get Users
    public function index(Request $request)
    {
        $query = User::where('name', 'LIKE', '%' . $request->search . '%');
        
        if ($request->role) {
            $query->where('role', '=', $request->role);
        }

        $users = $query->latest()->paginate(10);

        if (empty($users)) {
            return response([
                'message' => 'Users not found.',
            ], 404);
        }

        return response([
            'message' => 'Users have been retrieved.',
            'data' => [
                'users' => $users
            ]
        ], 200);
    }

    // Get User Details
    public function show($id)
    {
        $user = User::find($id);

        return response([
            'message' => 'User retreived.',
            'data' => [
                'user' => $user,
            ]
        ], 200);
    }


    // Add User
    public function store(Request $request)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'role' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
                'success' => false,
            ], 400);
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        
        // Send verification email
        event(new Registered($user));
        Mail::to($user->email);

        return response([
            'message' => 'User created.',
            'success' => true,
            'data' => [
                'user' => $user
            ]
        ], 200);
    }

    // Update User Details
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validate = Validator::make($input, [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if ($validate->fails()) {
            return response([
                'message' => $validate->errors()->first(),
            ], 400);
        }

        $user = User::find($id);
        $user->name = $input['name'];
        $user->email = $input['email'];
        $user->role = $input['role'];
        $user->save();

        return response([
            'message' => 'User updated.',
            'data' => [
                'user' => $user
            ]
        ], 200);
    }

    // Delete User
    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();

        return response([
            'message' => 'User deleted.',
        ], 200);
    }
}
