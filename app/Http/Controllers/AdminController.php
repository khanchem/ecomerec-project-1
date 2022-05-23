<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.auth.login');
    }
    public function AdminDash()
    {
        return view('admin.index');
    }
    public function AdminLogin(Request $request)
    {
        //dd($request->all());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {


            $noty = array(
                'message' => ' Admin login successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($noty);
        } else {
            $noty = array(
                'message' => ' Invalid Email or Password',
                'alert-type' => 'success'
            );

            return back()->with($noty);
        }
    }
    public function AdminLogout()
    {
        Auth::guard('admin')->logout();
        $noty = array(
            'message' => ' Admin logout successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('login_form')->with($noty);
    }
}
