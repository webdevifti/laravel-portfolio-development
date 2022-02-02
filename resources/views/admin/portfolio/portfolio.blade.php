@extends('admin.layout')

@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Portfolioes </h1>
        <a href="{{ route('portfolio.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New Portfolio</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Portfolio Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Category</th>
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
                            <th>Category</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $sl = 0
                        @endphp
                        @foreach($portfolioes as $portfolio)
                        @php 
                        $sl++
                        @endphp
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $portfolio->sub_title }}</td>
                            <td>{{ $portfolio->title }}</td>
                            <td>{!! $portfolio->description !!}</td>
                            <td><img width="100" src={{ asset('uploads/portfolioes/'.$portfolio->portfolio_image) }} /></td>
                            <td>
                                @if($portfolio->status == 1)
                                    <a href="/portfolio/status/{{ $portfolio->id }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                    <a href="/portfolio/status/{{ $portfolio->id }}" class="btn btn-warning btn-sm">Deactive</a>
                                @endif
                            </td>
                            <td>
                                <a href="/portfolio/{{ $portfolio->id }}/edit" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                                <form action="/portfolio/{{ $portfolio->id }}" method="POST">  
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $portfolio->id }}"/> 
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