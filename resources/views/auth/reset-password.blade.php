@extends('frontend.master_layout')
@section('content')



<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Reset Password</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="sign-in-page">
			<div class="row">
				<!-- Sign-in -->			
<div class="col-md-6 col-sm-6 sign-in">
	<h4 class="">Reset Your Passord</h4>
	<p class="">Forgot your password? No problem. Just Reset Now</p>

	<form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input  type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		@error('email')
            <div class="alert alert-danger"> {{ $message }} </div>
        @enderror
        </div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">New Password <span>*</span></label>
		    <input  type="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		@error('password')
            <div class="alert alert-danger"> {{ $message }} </div>
        @enderror
        </div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password <span>*</span></label>
		    <input  type="password" name="password_confirmation" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		@error('password_confirmation')
            <div class="alert alert-danger"> {{ $message }} </div>
        @enderror
        </div>
	  	
		
 
               
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password Now</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
@include('frontend.includes.brands')
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
<!-- ============================================================= FOOTER ============================================================= -->


@endsection