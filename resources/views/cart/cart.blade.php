@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<div class="container ">
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>    
        <strong>{!! \Session::get('success') !!}</strong>
    </div>
    @endif
    <div class="row justify-content-center" style="height: 68vh; text-align: center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('My Cart') }}</div>

                <div class="card-body">
                    <div class="scroll card-body row">
                        @foreach (Auth::user()->carts as $cart)
                        <div class="col-sm-4">
                            <img class="card-img h-90 w-60 p-3" src="{{ asset('/storage/'. $cart->keyboard->image)}}" alt="">
                        </div>
                        <div class="col-sm-8 p-3 mb-5">
                            <h2>{{$cart->keyboard->name}}</h2>
                            <p>$ {{$cart->keyboard->price * $cart->qty}}</p>
                            
                            <div class="form-group row">
                                <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>
        
                                <div class="col-md-5">
                                    <input id="quantity" value="{{$cart->qty}}" type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity">
        
                                    @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    @if ($carts->count() > 0)
                        <form action="/order" method="POST">
                            @csrf
                            <div class="" style="margin-left: 40em">
                                <button type="submit" class="btn btn-primary">Checkout</button>
                            </div>
                        </form>
                    @else
                        <p style="font-size: 1.5em;">You don't have item in your cart yet...</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection