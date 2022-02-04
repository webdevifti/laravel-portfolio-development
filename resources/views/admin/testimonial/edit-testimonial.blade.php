@extends('admin.layout')
@section('title','Admin | Edit Testimonial Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Testimonial Content</h1>
        <a href="{{ route('testimonial.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    <h3>Edit Testimonial Content Form</h3>
                </div>
                <div class="card-body">
                    <form action="/testimonial/{{ $testimonial->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <label for="subtitle">Client Name</label>
                            <input type="text" value="{{ $testimonial->client_name }}"  class="form-control" name="client_name" id="subtitle">
                        </div>
                        <div class="mt-2">
                            <label for="title">Client Designation</label>
                            <input type="text" id="title" value="{{ $testimonial->client_designation }}" class="form-control" name="client_designation">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Client Review</label>
                            <textarea name="review" class="form-control" id="desc" cols="30" rows="6" >{{ $testimonial->client_review }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="bi">Client Image</label>
                            <input type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])" id="bi" class="form-control" name="client_image">
                            <img id="pic" height="100" width="100" src="{{ asset('uploads/testimonials/'.$testimonial->client_image) }}" alt="">
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