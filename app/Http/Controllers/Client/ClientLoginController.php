<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientLoginController extends Controller
{
    public function index()
    {
        return view('client.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            return redirect()->route('Home');
        }

        return redirect()->back()->with('error', 'Email Or Password wrong');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();

    }
}
