@extends('frontend.front_master')

@section('front')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<div class="body-content">
	<div class="container">
        <div class="row">
            <div class="col-md-2"><br>
                <div class="widget-user-image">
                    <img class="rounded-circle" style="border-radius: 50%" width="150px" height="150px" id="imageShow" src="{{!empty($user->profile_photo)? url('/frontend/user_profile_image/'.$user->profile_photo) :url('/image/no_image.jpg')}}"alt="User Avatar">
                  </div>
                  <br><br>

                  <ul class="list-group list-group-flush">
                    <a href="{{route('user.profile.view/')}}" class="btn  btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('uploade.user.profile',Auth::user()->id)}}" class="btn  btn-primary btn-sm btn-block">Upload Profile</a>
                    <a class="btn  btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout',Auth::user()->id)}}" class="btn  btn-danger btn-sm btn-block">Logout</a>
                  </ul>
            </div>

            <div class="col-md-2">

            </div>
            <div class="col-md-6">

<div class="card">
<h3 class="text-center">    <span class="text-danger"><strong> Update Profile</strong> </span>
  
</h3> 
</div>

<form action="{{route('store.user.profile', Auth::user()->id)}}" method="post" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label class="info-title" for="exampleInputEmail1">Name <span>*</span></label>
    <input type="text" id="text" name="name" value="{{$user->name}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
</div>
  <div class="form-group">
    <label class="info-title" for="exampleInputEmail1">Email Address <span>*</span></label>
    <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control unicase-form-control text-input" id="exampleInputEmail1" >
</div>
  <div class="form-group">
    <label class="info-title" for="exampleInputPassword1">Profile Image <span>*</span></label>
    <input type="file" id="image" name="profile_photo" class="form-control unicase-form-control text-input" id="exampleInputPassword1" >
</div>
<div class="form-group">
<button class="btn btn-danger btn-center">Update</button>
</div>
</form>
            </div>
        </div>
      
    </div>
</div>
<script>
  $(document).ready(function () {
   $('#image').change(function(e){
  let reader = new FileReader();
  reader.onload= (e) =>{
      $('#imageShow').attr('src', e.target.result);
  }
      
       reader.readAsDataURL(this.files[0]); 

   });
});
</script>

@endsection