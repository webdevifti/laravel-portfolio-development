@extends('admin.layout')
@section('title','Admin | Edit User Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <a href="{{ route('user.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mb-2">{{ $error }}</div>
                @endforeach
            @endif

            @if(session()->has('update_success'))
                <div class="alert alert-success mb-2">{{ session()->get('update_success') }}</div>
            @endif
            @if(session()->has('update_error'))
                <div class="alert alert-danger mb-2">{{ session()->get('update_error') }}</div>
            @endif
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit User Form</h3>
                </div>
                <div class="card-body">
                    <form action="/user/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="subtitle">User Full Name</label>
                            <input type="text" placeholder="Enter Full Name" class="form-control" name="username" id="subtitle">
                        </div>
                        <div class="mt-2">
                            <label for="e">User Email</label>
                            <input type="email" id="e" placeholder="Enter Email" class="form-control" name="email">
                        </div>
                        <div class="mt-2">
                            <label for="ut">User Type</label>
                            <select name="user_type" id="ut" class="form-control">
                                <option value="">--Select user type</option>
                                <option value="contributor">Contributor</option>
                                <option value="author">Author</option>
                            </select>
                        </div>
                       
                        <div class="mt-2">
                            <label for="desc">Bio</label>
                            <textarea name="bio" class="form-control" id="desc" cols="30" rows="6" placeholder="Write Short Bio"></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="bi">User Photo</label>
                            <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="user_image">
                            <img width="100" id="pic" alt="">
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
    </div>


@endsection