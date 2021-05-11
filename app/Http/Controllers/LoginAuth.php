<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class LoginAuth extends Controller
{
    public function index()
    {
        return view('admin_login/admin_login_form');
    }
    public function admin_login_auth(request $request)
    {

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;

        $result = DB::table('admin_user')->where('username', $username)
            ->where('password', md5($password))
            ->first();

        if ($result) {
            session::put('username', $result->username);
            session::put('email', $result->email);

            return Redirect::to('/admin_dashboard');
        } else {
            session::put('message', 'Please enter valid email or password');
            return Redirect::to('/admin');
        }

    }
    public function log_out()
    {
        Session::put('username', '');
        Session::put('email', '');
        return Redirect::to('/admin');
    }
}
