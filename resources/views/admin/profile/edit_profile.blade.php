@extends('admin.admin_master')

@section('admin')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
               <form novalidate  action="{{route('store-damin-profile',$edit_prof->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                 <div class="row">
                   <div class="col-12">	
                       <div class="row">
                           <center>

                          
                        <div class="widget-user-image">
                            <img class="rounded-circle" width="120px" height="120px" id="imageShow"  src="{{!empty($edit_prof->profile_photo)? url('/image/admin_profile_photo/'.$edit_prof->profile_photo) :url('/image/no_image.jpg')}}" alt="User Avatar">
                          </div>
                        </center>
                            <div class="form-group">
                                <h5>Admin Profile Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file"  name="profile_photo" id="image" class="form-control" required> </div>
                                    @error('profile_photo')
                                    <div class="text text-danger  ">{{$message}}</div>
                                        
                                    @enderror
                            </div>
                       
                      
                       <div class="col-md-6">
                        <div class="form-group">
                            <h5>Admin Name<span class="text-danger">*</span></h5>
                            <div class="controls">
                                <input type="text" name="name"  class="form-control" required data-validation-required-message="This field is required" value="{{$edit_prof->name}}"> </div>
                                @error('name')
                                <div class="text text-danger  ">{{$message}}</div>
                                    
                                @enderror
                        </div>

                           </div>					
                           <div class="col-md-6">
                       <div class="form-group"> 
                           <h5>Admin Email <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" value="{{$edit_prof->email}}"> </div>
                       </div>
               
                    </div>
                 
                   </div>

                   <div class="text-xs-right">
                       <button type="submit" class="btn btn-rounded btn-info btn-block">Updae Profile</button>
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