@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container-full">

<!-- Main content -->
<section class="content">
 
<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Edit Admin Profile</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{ route('admin.profile.store') }}" enctype="multipart/form-data" method="post" >
           @csrf
             <div class="row">
               <div class="col-12">	
                   
               <div class="row">

                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>Username <span class="text-danger">*</span></h5>
                       <div class="controls">
                        <input type="text" name="name" class="form-control" value="{{ $admin_edit->name }}" required></div>
                      </div>

                        </div>
                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>Email Address <span class="text-danger">*</span></h5>
                       <div class="controls">
                        <input type="email" value="{{ $admin_edit->email }}" name="email" class="form-control" required></div>
                        </div>
                            
                        </div>

               </div>

               <div class="row">

                        <div class="col-lg-6 col-md-6">

                        <div class="form-group">
                       <h5>File Input Field <span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="file" name="profile_photo_path" class="form-control" id="image" required> </div>
                   </div>   



                        </div>

                        <div class="col-lg-6 col-md-6">

                        <img id="showImage" width="100px" height="100px" src="{{ (!empty($admin_data->profile_photo_path)) ? url('uploads/admin_images/'.$admin_data->profile_photo_path):url('uploads/admin_images/no_image.jpg') }}" 
                        alt=""> 



                        </div>

                </div>
                   
                   
                  
                   
                   <div class="text-xs-right">
                   <button type="submit" value="update" class="btn btn-rounded btn-primary">Submit</button>
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