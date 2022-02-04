@extends('admin.layout')
@section('title','Admin | Brand Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Brands </h1>
        <a href="{{ route('brand.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Banner</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Brands Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                       
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php 
                        $sl = 0
                        @endphp
                        @foreach($brands as $brand)
                        @php 
                            $sl++
                        @endphp
                        <tr>
                            <td>{{ $sl }}</td>
                            <td><img width="100" src={{ asset('uploads/brands/'.$brand->brand_image) }} /></td>
                            <td>
                                @if($brand->status == 1)
                                    <a href="/brand/status/{{ $brand->id }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                    <a href="/brand/status/{{ $brand->id }}" class="btn btn-warning btn-sm">Deactive</a>
                                @endif
                            </td>
                            <td>
                                <a href="/brand/{{ $brand->id }}/edit" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                                <form action="/brand/{{ $brand->id }}" method="POST">  
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $brand->id }}"/> 
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