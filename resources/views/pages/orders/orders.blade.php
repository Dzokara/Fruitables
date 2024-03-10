@extends('layouts.layout')
@section('title') Cart @endsection
@section('description') Check your cart here! @endsection
@section('keywords') cart, shop, online, home, best, sellers @endsection

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Orders</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Orders</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <div id="notification" class="alert d-none px-4 py-4 text-center"></div>

    <div class="container">
        @if($orders->count() < 1)
            <h1 class="text-center my-5 py-5">Your haven't placed any orders yet, you can start shopping <a href="{{route('fruits')}}">here!</a></h1>
        @else
            <h1 class="text-center mt-5 mb-4">Your orders</h1>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>Total</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Your note</th>
                    <th>Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>${{ $order->total }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->message ?? '[No note]' }}</td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

    </div>

@endsection

