@extends('admin.layout')
@section('title','Admin | Edit Fun Fact Content')

@section('MainContainer')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit FunFact Content</h1>
        <a href="{{ route('funfact.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                    <h3>Edit FunFact Content Form</h3>
                </div>
                <div class="card-body">
                    <form action="/funfact/{{ $fun->id }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <div class="row" style="overflow-y: scroll;max-height: 200px">
                           @foreach ($all_font as $font)
                           <div class="col-lg-1 col-md-1">
                               <i style="cursor: pointer;border:1px solid #eee;padding: 5px;margin: 5px 0px;" class="{{ $font }} icons"><span style="display: none">{{ $font }}</span></i>
                           </div>
                           @endforeach
                            </div>
                        </div>
                        <div class="mt-2">
                            <label for="subtitle">Icon</label>
                            <input type="text" placeholder="Icon" value="{{ $fun->icon }}" class="form-control" name="icon" id="icon_input">
                        </div>
                        <div class="mt-2">
                            <label for="title">Title</label>
                            <input type="text" id="title" value="{{ $fun->title }}"  placeholder="Title" class="form-control" name="title">
                        </div>
                        <div class="mt-2">
                            <label for="desc">Counter Number</label>
                            <input type="number" name="counter_number" value="{{ $fun->counter_number }}"  class="form-control"  placeholder="Counter Number" />
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