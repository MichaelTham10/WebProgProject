@extends('layouts.app')

@section('title', 'Detail')

@section('content')
    @php
        $total = 0;
    @endphp
    <div style="padding: 2em">
        <h1 class="mb-4">Transaction History {{$details->first()->created_at}}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Keyboard Image</th>
                    <th scope="col">Keyboard Name</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    @php
                        $subtotal = $detail->keyboard->price * $detail->qty;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td style="height: 15em; width: 15em"><img class="card-img" src="{{ asset('/storage/'. $detail->keyboard->image)}}" alt=""></td>
                        <td>{{$detail->keyboard->name}}</td>
                        <td>$ {{$subtotal}}</td>
                        <td>{{$detail->qty}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th id="total" colspan="3">Total Price :</th>
                    <td>$ {{$total}}</td>
                </tr>
            </tfoot>
        </table>   
    </div>
@endsection