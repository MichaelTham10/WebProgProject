@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
  
<div class="container">
   
    @if(Session::has('Success'))
        
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('message') }}</strong>
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
                <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <a href="{{ route('keyboards', $category->id) }}" class="card-text">{{$category->name}}</a>
                </div>
                <img class="card-img-top" src="{{ asset('/storage/'. $category->image)}}" alt="{{$category->image}}">
              </div>
            @endforeach
            
          
        </div>
    </div>
</div>
@endsection

