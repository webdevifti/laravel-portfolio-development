@extends('admin.layout')
@section('title','Admin | Site Information Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Site Information</h1>
    </div>
    @if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger mb-2">{{ $error }}</div>
    @endforeach
    @endif

    @if(session()->has('success'))
        <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-6 col-sm-12 col-md-12">
            
            <div class="card shadow">
                <div class="card-header">
                    <h3>Site Information</h3>
                </div>
                <div class="card-body">
                    <form action="/site/information/{{ $info->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="subtitle">Site Description</label>
                                    <textarea cols="30" rows="6" name="site_description" class="form-control">{{ $info->site_description }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="title">Site Keywords</label>
                                    <textarea cols="30" rows="6" name="site_keyword" class="form-control">{{ $info->site_keyword }}</textarea>
                                </div>
                            </div>
                        </div>
                       
                        <div class="mt-2">
                            <label for="opa">Copyright Text</label>
                            <input type="text" value="{{ $info->copyright_text }}" class="form-control" name="copyright_text" id="opa">
                        </div>
                       
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
       <div class="log-lg-3 col-sm-3 col-md-3">
           <div class="card shadow">
               <div class="card-header">
                   <h3>Site Logo</h3>
               </div>
               <div class="card-body">
                   <form action="/site/logo/{{$info->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                       <div class="mb-2">
                            <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="logo">
                            <img width="100" src="uploads/logo/{{ $info->logo }}" id="pic" alt="">
                       </div>
                       <div class="mt-2">
                           <button type="submit" class="btn btn-info">Upload New One</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
       <div class="log-lg-3 col-sm-3 col-md-3">
        <div class="card shadow">
            <div class="card-header">
                <h3>Site Icon</h3>
            </div>
            <div class="card-body">
                <form action="/site/icon/{{$info->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-2">
                         <input type="file" id="bi" oninput="pic.src=window.URL.createObjectURL(this.files[0])" class="form-control" name="site_icon">
                         <img width="100" src="uploads/logo/{{ $info->site_icon }}" id="pic" alt="">
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-info">Upload New One</button>
                    </div>
                </form>
            </div>
        </div>
       </div>
    </div>


@endsection