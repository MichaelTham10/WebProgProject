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
    <div class="d-flex justify-content-center ">
        
        @foreach ($keyboards as $keyboard)
            <div class="card mx-2 px-3 " style="width: 18rem;">
                <img class="card-img-top pt-2 w-100 h-75" src="{{ asset('/storage/'. $keyboard->image)}}" alt="{{$keyboard->image}}">
                <div class="card-body text-center pt-1 mb-3">
                    <a href="{{ route('keyboards', $keyboard->id) }}" class="card-text">{{$keyboard->name}}</a>
                    <p>US $ {{$keyboard->price}}</p>
                    <br>
                </div>
                <div class="d-flex justify-content-between btn-group-sm py-4">
                    <form action="{{route('delete-keyboard', $keyboard->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">Delete Keyboard</button>
                      </form>
                    
                    <a href="{{route('update-page', $keyboard->id)}}" class="btn btn-primary">Update Keyboard</a>
                </div>
            
            </div>
        @endforeach
        {{$keyboards->links()}}
    
    </div>
@endsection

