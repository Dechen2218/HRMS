@extends('admin.header')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">
<div class="row profile-body">
  <!-- left wrapper start -->
  <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
    <div class="card rounded">
      <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-2">
          <div>
            <img class="wd-100 rounded-circle" src="{{( !empty( $profileData->photo)) ? url('images/admin_images/'.$profileData->photo) : url('images/no_image.jpg')}}" alt="profile">
            <span class="h4 ms-3 text-white">{{$profileData->name}}</span>
          </div>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Name:</label>
          <p class="text-muted">{{$profileData->name}}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
          <p class="text-muted">{{$profileData->username}}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
          <p class="text-muted">{{$profileData->email}}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
          <p class="text-muted">{{$profileData->phone}}</p>
        </div>
        <div class="mt-3">
          <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
          <p class="text-muted">{{$profileData->address}}</p>
        </div> 
        <div class="mt-3 d-flex social-links">
          <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="github"></i>
          </a>
          <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="twitter"></i>
          </a>
          <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
            <i data-feather="instagram"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- left wrapper end -->
  <!-- middle wrapper start -->
  <div class="col-md-8 col-xl-8 middle-wrapper">
    <div class="row">
    <div class="card">
              <div class="card-body">

				<h6 class="card-title">Update Admin Profile</h6>
                    <!-- enctype is used for uploading the image -->
				<form class="forms-sample" method="POST" action="{{ route('admin.profile_update')}}" enctype="multipart/form-data">
                @csrf  
                <div class="mb-3">
				<label for="exampleInputName" class="form-label">Name</label>
				<input type="text" class="form-control" name="name" id="exampleInputName" autocomplete="off" value="{{$profileData->name}}">
				</div>
				<div class="mb-3">
				<label for="exampleInputUsername1" class="form-label">Username</label>
				<input type="text" class="form-control" name="username" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->username}}">
				</div>
				<div class="mb-3">
				<label for="exampleInputEmail1" class="form-label">Email address</label>
				<input type="email" class="form-control" name="email" id="exampleInputEmail1" value="{{$profileData->email}}">
				</div>
				<div class="mb-3">
				<label for="exampleInputPassword1" class="form-label">Password</label>
				<input type="password" class="form-control" name="password" id="exampleInputPassword1" autocomplete="off" value="{{$profileData->password}}">
				</div>
                <div class="mb-3">
				<label for="exampleInputPhone" class="form-label">Phone</label>
				<input type="text" class="form-control" name="phone" id="exampleInputPhone" autocomplete="off" value="{{$profileData->phone}}">
				</div>
                <div class="mb-3">
				<label for="exampleInputAddress" class="form-label">Address</label>
				<input type="text" class="form-control" name="address" id="exampleInputAddress" autocomplete="off" value="{{$profileData->address}}">
				</div>
                <div class="mb-3">
				<label class="form-label" for="formFile">Photo</label>
				<input class="form-control" type="file" id="image"  name="photo">
				</div>

                <div class="mb-3">
				<label class="form-label" for="formFile"></label>
				<img  id="showimage" class="wd-80 rounded-circle" src="{{( !empty( $profileData->photo)) ? url('images/admin_images/'.$profileData->photo) : url('images/no_image.jpg')}}" alt="profile">
				</div>
				<button type="submit" class="btn btn-primary me-2">Save Change</button>
				</form>
              </div>
            </div>
          </div>
         </div>
        </div>
        </div>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0'])
        })
    })
</script>
@endsection



