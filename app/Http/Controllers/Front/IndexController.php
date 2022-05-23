<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function Index()
    {
        // return view('frontend.index');
    }
    public function UserLogout($id)
    {
        Auth::logout($id);
        return redirect()->route('login');
    }

    public function UserProfileUpdate($id)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.update_profile.update_profile', compact('user'));
    }
    public function UpdateProfile(Request $request, $id)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('frontend/user_profile_image/'), $file_name);
            $data->profile_photo = $file_name;
        }
        $data->save();
        $noty = array(
            'message' => 'User Profile Updated  Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($noty);
    }
    public function UserPassword($id)
    {
        $id = Auth::user()->id;
        $password = User::find($id);
        return view('frontend.profile.password.change_password', compact('password'));
    }

    public function passwordUpdate(Request $request, $id)
    {
        $validation = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $hashedPassword = User::find($id)->password;
        if (Hash::check($request->oldPassword,  $hashedPassword)) {
            $admin = User::find($id);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $noty = array(
                'message' => 'User Password Changed  Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login')->with($noty);
        } else {

            return redirect()->back();
        }
    }
}
