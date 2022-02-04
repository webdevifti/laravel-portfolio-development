@extends('admin.layout')
@section('title','Admin | Edit About Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit About Content</h1>
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

            @if(session()->has('update_success'))
                <div class="alert alert-success mb-2">{{ session()->get('update_success') }}</div>
            @endif
            @if(session()->has('update_error'))
                <div class="alert alert-danger mb-2">{{ session()->get('update_error') }}</div>
            @endif
            <div class="card shadow">
                <div class="card-header">
                    <h3>Edit About Content Form</h3>
                </div>
                <div class="card-body">
                    <form action="/about/{{ $about->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="subtitle">Sub Title</label>
                            <input type="text" value="{{ $about->sub_title }}" placeholder="Enter Banner Sub Title" class="form-control" name="sub_title" id="subtitle">
                        </div>
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" id="title" value="{{ $about->title }}" placeholder="Enter Banner Title" class="form-control" name="title">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Description</label>
                            <textarea name="description" class="form-control" id="desc" cols="30" rows="6" placeholder="Write Banner Description">{{ $about->description }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="bi">About Image</label>
                            <input type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="bi" class="form-control" name="about_image">
                            <img id="pic" height="100" width="100" src="{{ asset('uploads/abouts/'.$about->about_image) }}" alt="">
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