@extends('layouts.app')

@section('title', 'History')

@section('content')
    <div class="container text-center scroll" style="height: 68vh">
        @foreach ($orders as $order)
            <button class="btn btn-light mb-3"><a href="/order/detail/{{$order->id}}">Transaction History {{$order->created_at}}</a></button>
            <br>
        @endforeach
    </div>
@endsection