@extends('admin.layout')

@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add About</h1>
        <a href="{{ route('about.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Go Back</a>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger mb-2">{{ $error }}</div>
                @endforeach
            @endif

            @if(session()->has('upload_success'))
                <div class="alert alert-success mb-2">{{ session()->get('upload_success') }}</div>
            @endif
            @if(session()->has('upload_error'))
                <div class="alert alert-danger mb-2">{{ session()->get('upload_error') }}</div>
            @endif
            <div class="card shadow">
                <div class="card-header">
                    <h3>Add About Form</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mt-2">
                            <label for="subtitle">Sub Title</label>
                            <input type="text" placeholder="Enter Banner Sub Title" class="form-control" name="sub_title" id="subtitle">
                        </div>
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" id="title" placeholder="Enter Banner Title" class="form-control" name="title">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Description</label>
                            <textarea name="description" class="form-control" id="desc" cols="30" rows="6" placeholder="Write Banner Description"></textarea>
                        </div>
                        <div class="mt-2">
                            <label for="bi">About Image</label>
                            <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="about_image">
                            <img width="100" id="pic" alt="">
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
    </div>


@endsection