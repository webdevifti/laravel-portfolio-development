@extends('admin.layout')
@section('title','Admin | Site Contact Information')
@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Office Address</h1>
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
                    <h3>Address</h3>
                </div>
                <div class="card-body">
                    <form action="/address/{{ $address->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="subtitle">Sub Title</label>
                                    <input type="text" value="{{ $address->sub_title }}" class="form-control" name="sub_title" id="subtitle">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="title">Title</label>
                                    <input type="text" value="{{ $address->title }}"  class="form-control" name="title" id="title">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="desc">Description</label>
                            <textarea name="description" class="form-control" id="desc" cols="30" rows="6">{{ $address->description }}</textarea>
                        </div>
                        <div class="mt-2">
                            <label for="opa">Office Name</label>
                            <input type="text" value="{{ $address->office_name }}"  class="form-control" name="office_name" id="opa">
                        </div>
                        <div class="mt-2">
                            <label for="opaddress">Office Address</label>
                            <input type="text" value="{{ $address->office_physical_address }}"  class="form-control" name="office_physical_address" id="opaddress">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="ph">Contact Number</label>
                                    <input type="text" value="{{ $address->phone_number }}"  class="form-control" name="phone_number" id="ph">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-2">
                                    <label for="email">Email Address</label>
                                    <input type="email" value="{{ $address->email_address }}"  class="form-control" name="email_address" id="email">
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
        
                    </form>
                </div>
        
            </div>
        </div>
       
    </div>


@endsection