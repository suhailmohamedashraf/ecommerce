<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class IndexController extends Controller
{
    public function index(){

        return view('frontend.index');
    }

    public function userLogout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile(){

        $id=Auth::user()->id;
        $user_data= User::find($id);
        return view('frontend.profile.user_profile',compact('user_data'));

    }

    public function userProfileStore(Request $request){
            $id=Auth::user()->id;
            $user_data=User::find($id);
            $user_data->name=$request->name;
            $user_data->email=$request->email;
            $user_data->phone=$request->phone;

            if(!empty($request->file('profile_photo_path'))){
             $file=$request->file('profile_photo_path');
                @unlink(public_path('uploads/user_images/'.$user_data->profile_photo_path));
             $file_name=date('dmy').$file->getClientOriginalName();
             $file->move(public_path('uploads/user_images/'),$file_name);
             $user_data['profile_photo_path']= $file_name;
            }
           
            $user_data->save();

            $notification=array(
                'message' => 'Profile details updated',
                'alert-type'=>'success'


            );

            return redirect()->route('dashboard')->with($notification);


    }

    public function userChangePassword()
    {

        $userid=Auth::user()->id;
        $user_data=User::find($userid);
        return view('frontend/profile/change_password',compact('user_data'));
    
    }

    public function userPasswordStore(Request $request){

        $validateData=$request->validate(
           [
              'oldpassword' => 'required',
              'password' => 'required|confirmed'
           ]

           
        );
                   
        $id=Auth::user()->id;
        $hashedPwd=User::find($id)->password;
        if(Hash::check($request->oldpassword,$hashedPwd)){

           $user =User::find($id);
           $user->password = Hash::make($request->password);
           $user->save();
           Auth::logout();
          

           return redirect()->route('user.logout');

        }
        else{
            $notification=array(
                'message' => 'Something Went Wrong',
                'alert-type'=>'warning'
    
    
            );

           return redirect()->back()->with($notification);

        }

       }
}
