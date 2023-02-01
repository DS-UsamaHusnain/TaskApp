<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {


        // validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
         
        if ($validator->fails()) {
             return response()->json([
                "message" => $validator->messages()->first()
            ]);
        }
            
        
        
        // create user data + save
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        
        $resp_obj = [
            "id" => $user->id,
            "email" => $user->email
        ];
        // send response
        return response()->json([
            "user" => $resp_obj
        ], 200);
    }
        // USER LOGIN API - POST
    public function login(Request $request)
    {
        // validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
         
        if ($validator->fails()) {
             return response()->json([
                "message" => $validator->messages()->first()
            ]);
        }
        // verify user + token
        if (!$token = auth()->attempt(["email" => $request->email, "password" => $request->password])) {
        return response()->json([
                "message" => "Invalid credentials"
            ]);
        }
        // send response
        return response()->json([
            
            "jwt" => $token
        ]);
    }


    public function user()
    {
        $user = auth()->user();
        
        $resp_obj = [
            "id" => $user->id,
            "email" => $user->email
        ];
        return response()->json([
            "user" => $resp_obj
        ]);
    }

}
