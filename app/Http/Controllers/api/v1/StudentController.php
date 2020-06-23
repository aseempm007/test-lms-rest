<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    function signup(Request $request)
    {
        $req = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|confirmed'
        ]);

        $req['password'] = bcrypt($request['password']);

        $student = Student::create($req);

        return response()->json(
            [
                'message' => 'Student Created',
                'token' => $student
            ],
            201
        );
    }
}
