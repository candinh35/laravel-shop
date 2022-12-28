<?php

namespace App\Http\Controllers\Client;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Laravel\Socialite\Facades\Socialite, Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\Redirect, Illuminate\Support\Facades\Session, Illuminate\Support\Facades\URL;
use App\User;

class SocialAuthController extends Controller
{
    /**
     * Chuyển hướng người dùng sang OAuth Provider.
     *
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider()
    {
        if (!Session::has('pre_url')) {
            Session::put('pre_url', URL::previous());
        } else {
            if (URL::previous() != URL::to('login')) Session::put('pre_url', URL::previous());
        }
        return Socialite::driver('google')->redirect();
    }

    /**
     * Lấy thông tin từ Provider, kiểm tra nếu người dùng đã tồn tại trong CSDL
     * thì đăng nhập, ngược lại nếu chưa thì tạo người dùng mới trong SCDL.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::guard('cus')->login($authUser);
        return Redirect::to(Session::get('pre_url'));
    }

    /**
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  Use
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = Customer::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return Customer::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }

    //    login bang fb

    public function login_facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback_facebook()
    {
        $provider = Socialite::driver('facebook')->user();
        dd($provider);
//        $account = Social::where('provider', 'facebook')->where('provider_user_id', $provider->getId())->first();
//        if ($account) {
//            //login in vao trang quan tri
//            $account_name = Login::where('admin_id', $account->user)->first();
//            Session::put('admin_login', $account_name->admin_name);
//            Session::put('admin_id', $account_name->admin_id);
//            return redirect('/admin/dashboard')->with('message', 'Đăng nhập Admin thành công');
//        } else {
//            $hieu = new Social([
//                'provider_user_id' => $provider->getId(),
//                'provider' => 'facebook'
//            ]);
//            $orang = Login::where('admin_email', $provider->getEmail())->first();
//            if (!$orang) {
//                $orang = Login::create([
//                    'admin_name' => $provider->getName(),
//                    'admin_email' => $provider->getEmail(),
//                    'admin_password' => '',
//                    'admin_status' => 1
//                ]);
//            }
//            $hieu->login()->associate($orang);
//            $hieu->save();
//            $account_name = Login::where('admin_id', $account->user)->first();
//            Session::put('admin_login', $account_name->admin_name);
//            Session::put('admin_id', $account_name->admin_id);
//            return redirect('/admin/dashboard')->with('message', 'Đăng nhập Admin thành công');
//        }

    }
}
