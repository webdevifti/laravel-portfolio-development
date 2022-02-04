@extends('admin.layout')
@section('title','Admin | User Content')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users </h1>
        <a href="{{ route('user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add New User</a>
    </div>
    @if(session()->has('success'))
        <div class="alert alert-success mb-2">{{ session()->get('success') }}</div>
    @endif
    @if(session()->has('error'))
        <div class="alert alert-danger mb-2">{{ session()->get('error') }}</div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Data</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Bio</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                       
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Bio</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @php
                            $sl = 0
                        @endphp
                        @foreach($users as $user)
                        @php 
                        $sl++
                        @endphp
                        <tr>
                            <td>{{ $sl }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><img width="100" src={{ asset('uploads/users/'.$user->user_photo) }} /></td>
                            <td>{{ $user->user_bio }}</td>
                            <td>{{ $user->user_type }}</td>
                            <td>
                                @if($user->status == 1)
                                    <a href="/user/status/{{ $user->id }}" class="btn btn-success btn-sm">Active</a>
                                @else
                                    <a href="/user/status/{{ $user->id }}" class="btn btn-warning btn-sm">Deactive</a>
                                @endif
                            </td>
                            <td>
                                
                                <form action="/user/{{ $user->id }}" method="POST">  
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}"/> 
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