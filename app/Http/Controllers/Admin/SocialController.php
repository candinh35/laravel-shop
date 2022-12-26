<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function getInfo($social){

//        $social == 'facebook' || 'google';
//        switch ($social){
//            case 'facebook':
//                return Socialite::driver($social)->redirect();
//                break;
//            case 'google':
//
//                break;
//        }

        return Socialite::driver($social)->redirect();
    }

    public function checkInfo($social)
    {
        $info = Socialite::driver($social)->user();
        dd($info);
    }
}
