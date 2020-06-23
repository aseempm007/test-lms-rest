<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Teacher;

class TeacherController extends Controller
{
    function signup(Request $request)
    {
        $req = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers',
            'password' => 'required|confirmed'
        ]);

        $req['password'] = bcrypt($request['password']);

        $teacher = Teacher::create($req);

        return response()->json(
            [
                'message' => 'Teacher Created',
                'token' => $teacher
            ],
            201
        );
    }
}
