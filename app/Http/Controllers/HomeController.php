<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    //dashboard page based on the usertype
    public function index(){
        $usertype = Auth()->user()->usertype;
        if($usertype == 'user'){
            return view('dashboard');
        }else if($usertype == 'admin'){
            return view('admin.adminhome');
        }else if($usertype == 'agent'){
            return view('agent.agenthome');
        }else{
            return redirect()->back();
        }

    }//end menthod

    //admin logout
    public function Adminlogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }//end method

    //admin login
    public function Adminlogin(){
        return view('admin.admin_login');
    }

    //admin profile view
    public function Adminprofile(){
        $id = Auth::user()->id; //which user has login we can identify using id
        $profileData = User::find($id); // using the find method we can get the profile data from the user model
        return view('admin.admin_profile_view', compact('profileData'));
    }
    
    ///admin profile update

    public function AdminprofileUpdate(Request $request){
        $id = Auth::user()->id; //which user has login we can identify using id
        $data = User::find($id);
        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('images/admin_images/'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        $notification = array(
            'message'=> 'Admin profile updated successfully',
            'alert-type'=> 'success'
        );
        return redirect()->back()->with($notification);

    }
    

}



