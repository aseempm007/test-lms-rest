<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;

class AdminController extends Controller
{
    function signup(Request $request)
    {
        $req = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed'
        ]);

        $req['password'] = bcrypt($request['password']);

        $admin = Admin::create($req);

        return response()->json(
            [
                'message' => 'Admin Created',
                'token' => $admin
            ],
            201
        );
    }

    function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials['password'] = bcrypt($request['password']);

        if (!Auth::guard('admin')->attempt($credentials))
            return response()->json(
                [
                    'message' => "unauthorized"
                ],
                401
            );

        return response()->json(
            [
                'message' => 'Admin Signed In',
                'token' => 'a'
            ],
            200
        );
    }
}
