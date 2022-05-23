@extends('admin.admin_master')

@section('admin')
<section class="content">

    <!-- Basic Forms -->
     <div class="box">
       <div class="box-header with-border">
         <h4 class="box-title">Change Profile Password</h4>
      
       </div>
       <!-- /.box-header -->
       <div class="box-body">
         <div class="row">
           <div class="col">
               <form novalidate action="{{route('change.password.sdmin')}}" method="POST">
                @csrf
                 <div class="row">
                   <div class="col-12">						
                   
                       <div class="form-group">
                           <h5>Current Password  <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="password" name="oldPassword" class="form-control" required data-validation-required-message="This field is required"> </div>
                               @error('oldPassword')
                               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                               @enderror
                       </div>
                       <div class="form-group">
                           <h5>New Password  <span class="text-danger">*</span></h5>
                           <div class="controls">
                               <input type="password" name="password" data-validation-match-match="password"  id="password" class="form-control" required> </div>
                               @error('password')
                               <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>{{$message}}</strong> 
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                               @enderror
                       </div>
                       <div class="form-group">
                        <h5>Confirm New Password  <span class="text-danger">*</span></h5>
                        <div class="controls">
                            <input type="password" name="password_confirmation" id="password_confirmation" data-validation-match-match="password" class="form-control" required> </div>
                            @error('password_confirmation')
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             <strong>{{$message}}</strong> 
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                             </button>
                           </div>
                            @enderror
                    </div>
                    
                     
                   </div>
                   <div class="text-xs-right">
                       <button type="submit" class="btn btn-rounded btn-info">Change Password</button>
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
@endsection