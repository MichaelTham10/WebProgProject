@extends('layouts.app')

@section('title', 'Update-Category')

@section('content')
<div class="container" style="height: 75vh">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Update Category') }}</div>

                <div class="card-body row">
                    <div class="col-sm-4">
                        <img class="card-img h-75 w-100" src="{{ asset('/storage/'. $category->image)}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <form action="{{route("update-category", $category->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" value="{{$category->name}}" required type="text" class="form-control @error('name') is-invalid @enderror" name="name">
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
    
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file @error('desc') is-invalid @enderror" name="image">
    
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Keyboard') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
