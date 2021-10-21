@extends('layouts.app')

@section('title', 'Cart')

@section('content')
<div class="container ">
    @if(Session::has('Success'))
       
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('Success') }}</strong>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">{{ __('My Cart') }}</div>

                <div class="card-body row ">
                    @foreach (Auth::user()->carts as $cart)
                        <div class="col-sm-4">
                            <img class="card-img h-100 w-100 p-3" src="{{ asset('/storage/'. $cart->keyboard->image)}}" alt="">
                        </div>
                        <div class="col-sm-8 pb-3">
                            <h2>{{$cart->keyboard->name}}</h2>
                            <br>
                            <p>{{$cart->keyboard->price * $cart->qty}}</p>
                            
                           
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
        
                                <div class="col-md-6">
                                    <input id="quantity" value="{{$cart->qty}}" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity">
        
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                           
                        </div>
                    @endforeach
                    <form action="/order" method="POST">
                        @csrf
                        <div class="m-auto">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection