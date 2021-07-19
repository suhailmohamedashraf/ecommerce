@extends('frontend.master_layout')
@section('content')


<div class="body-content">

    <div class="container">
            <div class="row">
                    <div class="col-md-2 ">
            <br>
                    <img class="card-img-top" width="100%" height="100%" style="border-radius:50%"
                     src="{{ (!empty($user_data->profile_photo_path)) ? url('uploads/user_images/'.$user_data->profile_photo_path):url('uploads/user_images/no_image.jpg') }}"  >


                     <ul class="list-group list-group-flush">
                         <br>

                     <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                     <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                     <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                     <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>

                     </ul>

                            

                    
                    
                    </div>

                   
                    <div class="col-md-2">
                        
                    </div>
                    <div class="col-md-6">

                    <div class="card">
                         <h3 class="text-center"><span class="text-danger">Hi <strong>{{ Auth::user()->name }}</strong></span></h3>
                        <div class="card-body">
                    <form action="{{ route('update.user.profile') }}" enctype="multipart/form-data" method="post">
                        @csrf
                                        <div class="form-group">
                                            <label>Name </label>
                                            <input type="text" name="name" value="{{ $user_data->name }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address </label>
                                            <input type="email" name="email" value="{{ $user_data->email}}"  class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Phone </label>
                                            <input type="text" name="phone" value="{{ $user_data->phone}}"  class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Profile Image </label>
                                            <input type="file" name="profile_photo_path"   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary">Update Profile</button>
                                        </div>
                                        
                    </form>


                        </div>

                    </div>

                    </div>
                    </div>
            </div>

    </div>





@endsection