@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

<!-- Main content -->
<section class="content">
 
<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Change Admin Password</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
       <form method="POST" action="{{ route('admin.password.update') }}">
           @csrf
             <div class="row">
               <div class="col-12">	
                   
               <div class="row">

                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>Current Password <span class="text-danger">*</span></h5>
                       <div class="controls">
                        <input type="text" id="current_password" name="oldpassword" type="password" class="form-control"  required>
                       </div>
                      </div>

                        </div>
                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>New Password<span class="text-danger">*</span></h5>
                       <div class="controls">
                        <input id="password" type="password" name="password" class="form-control" required></div>
                        </div>
                            
                        </div>

                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>Confirm Password<span class="text-danger">*</span></h5>
                       <div class="controls">
                        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required></div>
                        </div>
                            
                        </div>

               </div>

                   
                   
                  
                   
                   <div class="text-xs-right">
                   <button type="submit" value="update" class="btn btn-rounded btn-primary">Change Password</button>
               </div>
                   
                 
              
               </div>
               
           </form>

       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
<!-- /.content -->



<script type="text/javascript">

$(document).ready(function(){
  $('#image').change(function(e)
  {
  var reader=new FileReader();
  reader.onload = function(e){
      $('#showImage').attr('src',e.target.result);
  }  
  reader.readAsDataURL(e.target.files['0']);  
  });
});

</script>
</div>

@endsection