@extends('frontend.master_layout')
@section('content')



<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Forgot Password</li>
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
	<h4 class="">Forgot Password</h4>
	<p class="">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

	<form method="POST" action="{{ route('password.email') }}">
    @csrf
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input  type="email" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
		@error('email')
            <div class="alert alert-danger"> {{ $message }} </div>
        @enderror
        </div>
	  	
		
 
               
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Email Password Reset Link</button>
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