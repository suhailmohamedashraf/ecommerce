<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;


class AdminProfileController extends Controller
{
     public function admin_profile(){

            $admin_data=Admin::find(1);
            return view('admin.admin_profile',compact('admin_data'));


        }

        public function admin_profile_edit(){

           $admin_edit= Admin::find(1);
           return view('admin.admin_profile_edit',compact('admin_edit'));



        }

        public function adminProfileStore(Request $request){

         $admin_data=Admin::find(1);
         $admin_data->name = $request->name;
         $admin_data->email = $request->email;

         if($request->file('profile_photo_path')){

             $file=$request->file('profile_photo_path');
             @unlink(public_path('uploads/admin_images/'.$admin_data->profile_photo_path));
             $filename= date("dmy").$file->getClientOriginalName();
             $file->move(public_path('uploads/admin_images'),$filename);
             $admin_data['profile_photo_path'] = $filename;
             
         }
         $admin_data->save();

         $notification = array(
            'message' => 'Admin Details Updated Successfully',
            'alert-type' => 'success',


         );
         return redirect()->route('admin.profile')->with($notification);

        }

        public function adminChangePassword(){
         return view('admin.admin_change_password');

        }

        public function adminPasswordUpdate(Request $request){

         $validateData=$request->validate(
            [
               'oldpassword' => 'required',
               'password' => 'required|confirmed'
            ]

            
         );
                    

         $hashedPwd=Admin::find(1)->password;
         if(Hash::check($request->oldpassword,$hashedPwd)){

            $admin =Admin:: find(1);
            $admin->password = Hash::make($request->password);
            $admin->save();
            Auth::logout();
            return redirect()->route('admin.logout');
         }
         else{

            return redirect()->back();

         }

        }
}


