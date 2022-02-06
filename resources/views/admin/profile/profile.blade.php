@extends('admin.layout')
@section('title','Admin | Profile')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
        <button class="btn btn-info">My role is {{ $get_user->user_type }}</button>
    </div>
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger mb-2">{{ $error }}</div>
    @endforeach
    @endif

    @if(session()->has('profile_update_success'))
        <div class="alert alert-success mb-2">{{ session()->get('profile_update_success') }}</div>
    @endif
    @if(session()->has('profile_update_error'))
        <div class="alert alert-danger mb-2">{{ session()->get('profile_update_error') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12">
            
            <div class="card shadow">
                <div class="card-header">
                    <h3>My Information</h3>
                    
                </div>
                <div class="card-body">
                    <form action="/profile/{{ $get_user->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="subtitle">Full Name</label>
                            <input type="text" value="{{ $get_user->name }}" placeholder="Enter Full Name" class="form-control" name="username" id="subtitle">
                        </div>
                        <div class="mt-2">
                            <label for="e">Email</label>
                            <input type="email" id="e" value="{{ $get_user->email }}" placeholder="Enter Email" class="form-control" name="email">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Bio</label>
                            <textarea name="bio" class="form-control" id="desc" cols="30" rows="6" placeholder="Write Short Bio">{{ $get_user->user_bio }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="bi">Photo</label>
                            <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="user_image">
                            <img width="100" src="{{ asset('uploads/users/'.$get_user->user_photo) }}" id="pic" alt="">
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
        <div class="col-lg-6 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Change Password</h3>
                </div>
                <div class="card-body">
                    <form action="/profile/changepass/{{ $get_user->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <label for="">Current Password</label>
                            <input type="password" placeholder="Your current password" name="current_password" class="form-control">
                        </div>
                        <div class="mt-3">
                            <label for="">New Password</label>
                            <input type="password" placeholder="Enter New password" name="new_password" class="form-control">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-info">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection