@extends('admin.layout')

@section('MainContainer')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">About Content </h1>
    <a href="{{ route('about.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add New Content</a>
</div>
@if(session()->has('success'))
    <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Sub Title</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                   
                    <tr>
                        <th>SL</th>
                        <th>Sub Title</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($about_data as $about)
                    <tr>
                        <td>{{ $about->id }}</td>
                        <td>{{ $about->sub_title }}</td>
                        <td>{{ $about->title }}</td>
                        <td>{{ $about->description }}</td>
                        <td><img width="100" src={{ asset('uploads/abouts/'.$about->about_image) }} /></td>
                        <td>
                            @if($about->status == 1)
                                <a href="/about/status/{{ $about->id }}" class="btn btn-success btn-sm">Active</a>
                            @else
                                <a href="/about/status/{{ $about->id }}" class="btn btn-warning btn-sm">Deactive</a>
                            @endif
                        </td>
                        <td>
                            <a href="/about/{{ $about->id }}/edit" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                            <form action="/about/{{ $about->id }}" method="POST">  
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $about->id }}"/> 
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                              </form>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection