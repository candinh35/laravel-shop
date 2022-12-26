<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact');
    }

    public function feedback(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ]);

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message,
        ]);

        return redirect()->back()->with('success', 'Feedback Send Successfully');
    }
}
