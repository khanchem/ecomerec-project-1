
@extends('frontend.front_master')

@section('front')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
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
	<h4 class="">Change Your Password</h4>


    @if(Session::has('status'))
    <div class="alert alert-primary" role="alert">
     {{Session::get('status')}}
      </div>
    @endif
	<form class="register-form outer-top-xs" role="form" method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
		<div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
		    <input type="email" id="email" name="email" :value="old('email', $request->email)"  class="form-control unicase-form-control text-input" autofocus >
            @error('email')
            <div class="text-danger">{{$message}}</div>
        @enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">New Password <span>*</span></label>
		    <input type="password" id="password" name="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
            @error('password')
                <div class="text-danger">{{$message}}</div>
            @enderror
		</div>
        <div class="form-group">
		    <label class="info-title" for="exampleInputPassword1">Confirm Password <span>*</span></label>
		    <input type="password" id="password_confirmation"  name="password_confirmation"  class="form-control unicase-form-control text-input"  >
            @error('password_confirmation')
            <div class="text-danger">{{$message}}</div>
        @enderror
		</div>
	  	<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Reset Password</button>
	</form>					
</div>
<!-- Sign-in -->

<!-- create a new account -->

<!-- create a new account -->			</div><!-- /.row -->
		</div><!-- /.sigin-in-->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
</div><!-- /.container -->
</div><!-- /.body-content -->
@endsection