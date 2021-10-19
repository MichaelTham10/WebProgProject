@extends('layouts.app')

@section('title', 'Update')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Update Keyboard') }}</div>

                <div class="card-body row">
                    <div class="col-sm-4">
                        <img class="card-img h-75 w-100" src="{{ asset('/storage/'. $keyboard->image)}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <form action='/update/edit/{{$keyboard->id}}' method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label for="category_id" class="col-md-4 col-form-label text-md-right ">{{ __('Keyboard Category') }}</label>
    
                                <div class="col-md-6">
                                    <select name="category" class="form-control @error('category') is-invalid @enderror" required>
                                        <option value="" hidden selected disabled >Choose Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Keyboard Name') }}</label>
    
                                <div class="col-md-6">
                                    <input id="name" value="{{$keyboard->name}}" required type="text" class="form-control @error('name') is-invalid @enderror" name="name">
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Keyboard Price') }}(USD)</label>
    
                                <div class="col-md-6">
                                    <input id="price" value="{{$keyboard->price}}" required type="number" class="form-control @error('price') is-invalid @enderror" name="price">
    
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="desc" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
    
                                <div class="col-md-6">
                                    <textarea required class="form-control @error('description') is-invalid @enderror" rows="3" name="description">{{$keyboard->desc}}</textarea>
    
                                    @error('description')
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
                                        {{ __('Add Keyboard') }}
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
