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
                        <form method="POST" action="{{ route('user.password.store') }}">
                        @csrf
                        

<div class="form-group">
<h5>Current Password <span class="text-danger">*</span></h5>
<div class="controls">
<input type="text" id="current_password" name="oldpassword" type="password" class="form-control"  required>
</div>
</div>




<div class="form-group">
<h5>New Password<span class="text-danger">*</span></h5>
<div class="controls">
<input id="password" type="password" name="password" class="form-control" required></div>
</div>
    




<div class="form-group">
<h5>Confirm Password<span class="text-danger">*</span></h5>
<div class="controls">
<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required></div>
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