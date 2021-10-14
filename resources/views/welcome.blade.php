@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
@if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('success') }}</p>
@endif
<div class="container">
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
                  <p class="card-text">{{$category->name}}</p>
                </div>
                <img class="card-img-top" src="{{ asset('/storage/'. $category->image)}}" alt="{{$category->image}}">
              </div>
            @endforeach
            
          
        </div>
    </div>
</div>
@endsection

