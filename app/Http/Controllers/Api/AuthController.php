<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $data=$request->validated();
    $user = User::where('email', $data['email'])->first();
    if(!$user || !Hash::check($data['password'], $user->password)){
    return response([
    'message' => 'wrong email or password'
    ], 401);
    }
    $token = $user-> createToken('webToken')->plainTextToken;
    return response([
        'user' => $user,
        'token' => $token
    ]);
    }
    public function register(RegisterRequest $request){
        $data = $request ->validated();
        $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            $token = $user-> createToken('webToken')->plainTextToken;
    return response([
        'user' => $user,
        'token' => $token
    ]);
    }

}
