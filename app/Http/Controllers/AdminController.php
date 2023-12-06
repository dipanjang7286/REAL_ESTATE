<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function adminLogin(){
        return view("admin.admin_login");
    }
    public function adminDashboard(){
        // return view("admin.admin_dashboard");
        return view("admin.index");
    }

    public function adminProfile(){
        $userId = Auth::user()->id;
        $profileData = User::find($userId);
        // var_dump($profileData);
        return view("admin.admin_profile_view",compact("profileData"));
    }

    public function updateAdmin(Request $request){
        // get authenticated user id
        $userId = Auth::user()->id;
        $data = User::find($userId);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        if($request->file("profile_image")){
            $file = $request->file("profile_image");
            if(public_path("upload/admin_image/" . $data->profile_image)){
                @unlink(public_path("upload/admin_image/" . $data->profile_image));
            }
            $fileName = date("YmdHi") . $file->getClientOriginalName();
            $file->move(public_path("upload/admin_image"), $fileName);
            $data->profile_image = $fileName;
        }
        $data->save();
        $notification = [
            "message"=> "Admin Profile Updated",
            "alert-type"=> "success"
        ];
        return redirect()->back()->with($notification);
        
    }
    public function chnageAdminPassword(){
        $userId = Auth::user()->id;
        $profileData = User::find($userId);
        return view("admin.change_password",compact("profileData"));
    }
    public function updateAdminPassword(Request $request){
        // validation
        $request->validate(
            [
                "old_password"=>"required",
                "new_password"=>"required|confirmed",
            ],
            [   // custom message
                "new_password.confirmed"=>"Confirmed new password does not match with new password !!"
            ]
        );

        // password checking
        if(!Hash::check($request->old_password, Auth::user()->password)){
            $notification = [
                "message"=> "Old password does not match",
                "alert-type"=>"error"
            ];
            return back()->with($notification);
        }

        // update password
        User::whereId(Auth::user()->id)->update([
            "password"=> Hash::make($request->new_password)
        ]);

        $notification = [
            "message"=> "Password Change Successful",
            "alert-type"=>"success"
        ];
        return back()->with($notification);

    }
    public function adminLogout(Request $request): RedirectResponse  
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
