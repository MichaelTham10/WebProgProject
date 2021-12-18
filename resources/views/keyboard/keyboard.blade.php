@extends('layouts.app')

@section('title', 'Keyboard')

@section('content')
<div class="container">
    @if(Session::has('Success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('Success') }}</strong>
        </div>
    @endif
</div>

<div class="mb-4">
    <form class="input-group d-flex justify-content-center" style="" action="/keyboards/search/{{$categoryId}}" method="GET">
        <input type="text" style="" name="search" placeholder="Search Keyboard..">
        <div class="input-group-append">
            <select name="searchOption" class="form-select">
                <option value="name">Name</option>
                <option value="price">Price</option>
            </select>
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
</div>

<div class="d-flex justify-content-center" style="height: 68vh">
    @if(count($keyboards) < 1)
        <div class="d-flex align-items-center">
            <h1><strong>Sorry! No Keyboard Found...</strong></h1>
        </div>
    @else    
        @foreach ($keyboards as $keyboard)
            <div class="card mx-2 px-3 " style="width: 18rem;">
                <img class="card-img-top pt-2 w-100 h-75" src="{{ asset('/storage/'. $keyboard->image)}}" alt="{{$keyboard->image}}">
                <div class="card-body text-center pt-1 mb-3">
                    <a href="{{ route('keyboard-detail', $keyboard->id) }}" class="card-text">{{$keyboard->name}}</a>
                    <p>US $ {{$keyboard->price}}</p>
                    <br>
                </div>
                @if (Auth::user()->is_admin)
                    <div class="d-flex justify-content-between btn-group-sm py-3">
                        <form action="{{route('delete-keyboard', $keyboard->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary">Delete Keyboard</button>
                        </form>
                        
                        <a href="{{route('update-page', $keyboard->id)}}" class="btn btn-primary">Update Keyboard</a>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
<div class="mt-5 d-flex justify-content-center">
    {{$keyboards->links()}}
</div>
@endsection

