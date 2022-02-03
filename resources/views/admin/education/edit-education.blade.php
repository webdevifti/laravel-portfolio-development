@extends('admin.layout')

@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Education Content</h1>
        <a href="{{ route('education.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    <h3>Edit Education Content Form</h3>
                </div>
                <div class="card-body">
                    <form action="/education/{{ $education->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mt-2">
                            <label for="subtitle">Passing Year</label>
                            <input type="number" value="{{ $education->passing_year }}" placeholder="Passing year" class="form-control" name="passing_year">
                        </div>
                        <div class="mt-2">
                            <label for="title">Cartification Name</label>
                            <input type="text" id="title" placeholder="Certification Name" class="form-control" value="{{ $education->certification }}" name="certification">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Result In Percentage</label>
                            <input type="text" name="result" class="form-control" id="desc" placeholder="Result by Percentage" value="{{ $education->result_gpa }}" />
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