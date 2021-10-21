@extends('layouts.app')

@section('title', 'History')

@section('content')
    <div class="container">
        @foreach ($orders as $order)
            <button>Transaction History {{$order->created_at}}</button>
        @endforeach
    </div>
@endsection