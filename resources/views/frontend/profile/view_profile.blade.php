@extends('frontend.front_master')

@section('front')
<div class="body-content">
	<div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <div class="widget-user-image">
                    <img class="rounded-circle" style="border-radius: 50%" width="150px" height="150px" id="imageShow" src="{{!empty(Auth::user()->profile_photo)? url('/frontend/user_profile_image/'.Auth::user()->profile_photo) :url('/image/no_image.jpg')}}"alt="User Avatar">
                  </div>
                  <br><br>

                  <ul class="list-group list-group-flush">
                    <a href="{{route('user.profile.view/')}}" class="btn  btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('uploade.user.profile',Auth::user()->id)}}" class="btn  btn-primary btn-sm btn-block">Upload Profile</a>
                    <a href="{{route('chnage.user.password',Auth::user()->id)}}" class="btn  btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout',Auth::user()->id)}}" class="btn  btn-danger btn-sm btn-block">Logout</a>
                  </ul>
            </div>

            <div class="col-md-2">

            </div>
            <div class="col-md-6">
<div class="card">
<h3 class="text-center">    <span class="text-danger">Hi...</span>
    <strong>{{Auth::user()->name}}</strong>   Wellcome To Online Easy Shoping
</h3> 
</div>
            </div>
        </div>
      
    </div>
</div>


@endsection