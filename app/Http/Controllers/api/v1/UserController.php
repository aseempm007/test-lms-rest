<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    function signup(Request $request)
    {
        $req = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $req['password'] = bcrypt($request['password']);

        $user = User::create($req);

        return response()->json(
            [
                'message' => 'User Created',
                'token' => $user
            ],
            201
        );
    }
}
