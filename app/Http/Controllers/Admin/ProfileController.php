<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function AdminProfile()
    {
        $adminProf = Admin::find(1);
        return view('admin.profile.view_profile', compact('adminProf'));
    }

    public function ADminProfileEdit()
    {
        $edit_prof = Admin::find(1);
        return view('admin.profile.edit_profile', compact('edit_prof'));
    }
    public function StoreProfileAdmin(Request $request)
    {
        $data = Admin::find(1);

        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo')) {

            $file = $request->file('profile_photo');
            $fileName = date('YmdHi') . $file->getClientOriginalName();

            $file->move(public_path('/image/admin_profile_photo/'), $fileName);
            $data->profile_photo = $fileName;
            $data->save();
            $noty = array(
                'message' => 'Admin with Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($noty);
        } else {
            $data->name = $request->name;
            $data->email = $request->email;
            $data->save();
            $noty = array(
                'message' => 'Admin Profile without Image Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($noty);
        }
    }
    public function PasswordChange()
    {
        return view('admin.profile.password.password_change');
    }
    public function AdminPassStore(Request $request)
    {

        $validation = $request->validate([
            'oldPassword' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $hashedPassword = Admin::find(1)->password;
        if (Hash::check($request->oldPassword,  $hashedPassword)) {
            $admin = Admin::find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            $noty = array(
                'message' => 'Admin Password Changed  Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('login_form')->with($noty);
        } else {

            return redirect()->back();
        }
    }
}
