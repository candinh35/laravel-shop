<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserAddRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stichoza\GoogleTranslate\GoogleTranslate;

class LoginContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserAddRequest $request)
    {
       $user = [
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
           'phone' => $request->phone,
           'address' => $request->address,
       ];

       if (User::create($user)){
           return redirect()->route('login')->with('success', 'Sign Up Success');
       }

        return redirect()->back()->with('error', 'registration failed');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(LoginRequest $request): \Illuminate\Http\RedirectResponse
    {
        if (Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ], $request->remember)){
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Email hoặc Password không đúng');
    }

    public function logout()
    {

        Auth::logout();

        return redirect()->route('login');
    }

//     chuyển đổi ngôn ngữ

    public function loginGoogle()
    {
        $lang = new GoogleTranslate('en');
        return $lang->setSource('en')->setTarget('en')->translate("hello Word");
    }
}
