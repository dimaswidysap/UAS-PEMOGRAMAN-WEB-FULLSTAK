<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Signup extends Controller
{
    //
    public function createUser(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'name.required' => 'Nama jangan kosong',
                'email.required' => 'Email jangan kosong',
                'password.required' => 'Kata sandi jangan kosng',
            ],
        );

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('login-page');
    }
}
