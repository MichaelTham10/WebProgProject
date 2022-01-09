@extends('layouts.app')

@section('title', 'Detail')

@section('content')
<div class="container" style="height: 78vh">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('Detail Keyboard') }}</div>

                <div class="card-body row">
                    <div class="col-sm-4">
                        <img class="card-img h-100 w-100" src="{{ asset('/storage/'. $keyboard->image)}}" alt="">
                    </div>
                    <div class="col-sm-8">
                        <h2>{{$keyboard->name}}</h2>
                        <br>
                        <p>{{$keyboard->price}}</p>
                        <br>
                        <p>{{$keyboard->desc}}</p>
                        @if (Auth::user() != null)
                            @if (Auth::user()->is_admin)
                                
                            @else
                                <form action="/cart/{{Auth::user()->id}}/{{$keyboard->id}}" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
                
                                        <div class="col-md-6">
                                            <input id="quantity" required type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity">
                
                                            @error('quantity')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                    </div>
                                </form>
                            @endif
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection