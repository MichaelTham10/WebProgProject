@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  
<div class="container">
   
    @if(Session::has('Success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('Success') }}</strong>
        </div>
    @endif
    <blockquote class="blockquote text-center">
        <h1 class="mb-1" style="font-weight: bolder">Welcome to Keypedia</h1>
        <p class="font-size:16px">Best Keyboard and Keycaps Shop</p>
    </blockquote>
    
    <div class="blockquote text-center">
        <h1 class="mb-1 mt-5" style="font-weight: bolder">Categories</h1>
        <div class="d-flex justify-content-center">
            @foreach ($categories as $category)
              <div class="card mx-2 px-3" style="width: 18rem;">
                <div class="card-body">
                  <a href="{{ route('keyboards', $category->id) }}" class="card-text">{{$category->name}}</a>
                </div>
                <img class="card-img-top pt-2 w-100 h-75" src="{{ asset('/storage/'. $category->image)}}" alt="{{$category->image}}">
                <div class="d-flex justify-content-between btn-group-sm py-4">
                    <form action="{{route('delete-category', $category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete Category</button>
                      </form>
                    
                    <a href="{{route('update-category-page', $category->id)}}" class="btn btn-primary">Update Category</a>
                </div>
              </div>
            @endforeach
            
          
        </div>
    </div>
</div>
@endsection

