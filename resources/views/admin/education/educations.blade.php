@extends('admin.layout')
@section('title','Admin | Education Content')
@section('MainContainer')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Educations Content </h1>
    <a href="{{ route('education.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus fa-sm text-white-50"></i> Add New Education</a>
</div>
@if(session()->has('success'))
    <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
@endif
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Education Content</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Passing Year</th>
                        <th>Certificate</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                   
                    <tr>
                        <th>SL</th>
                        <th>Passing Year</th>
                        <th>Certificate</th>
                        <th>Result</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php 
                    $sl = 0
                    @endphp
                    @foreach($educations as $education)
                    @php 
                    $sl++
                    @endphp
                    <tr>
                        <td>{{ $sl }}</td>
                       
                        <td>{{ $education->passing_year }}</td>
                        <td>{{ $education->certification }}</td>
                        <td>{{ $education->result_gpa }}%</td>
                        <td>
                            @if($education->status == 1)
                                <a href="/education/status/{{ $education->id }}" class="btn btn-success btn-sm">Active</a>
                            @else
                                <a href="/education/status/{{ $education->id }}" class="btn btn-warning btn-sm">Deactive</a>
                            @endif
                        </td>
                        <td>
                            <a href="/education/{{ $education->id }}/edit" class="btn btn-info btn-sm"><i class="fa fa-pen"></i></a>
                            <form action="/education/{{ $education->id }}" method="POST">  
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $education->id }}"/> 
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