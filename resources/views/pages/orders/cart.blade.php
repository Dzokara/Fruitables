@extends('layouts.layout')
@section('title') Cart @endsection
@section('description') Check your cart here! @endsection
@section('keywords') cart, shop, online, home, best, sellers @endsection

@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Cart</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Cart</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <div id="notification" class="alert d-none px-4 py-4 text-center"></div>

    <!-- Cart Page Start -->
    <div id="cartSection" class="container-fluid py-5">
        @if($fruits->count()<1)

            <h1 class="text-center my-5">Your cart is empty, you can fill it up <a href="{{route('fruits')}}">here!</a></h1>

        @else
            <div class="container py-5 d-flex flex-wrap">
                <div class="table-responsive flex-grow-1 me-4">
                    <table id="cartTable" class="table">
                        <thead>
                        <tr>
                            <th scope="col">Products</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($fruits as $fruit)
                            <tr>
                                <th scope="row">
                                    <div class="d-flex align-items-center">
                                        <img src="{{asset('assets/img/'. $fruit->fruits->img->href)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                    </div>
                                </th>
                                <td>
                                    <p class="mb-0 mt-4">{{$fruit->fruits->name}}</p>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${{$fruit->fruits->prices->sortByDesc('date_from')->first()->price}}</p>
                                </td>
                                <td>
                                    <div class="input-group quantity mt-4" style="width: 100px;">
                                        <input data-id="{{$fruit->id_fruits}}" type="number" class="form-control form-control-sm text-center border-0 qtyInput" value="{{$fruit->quantity}}" min="1">
                                    </div>
                                </td>
                                <td>
                                    <p class="mb-0 mt-4">${{$fruit->fruits->prices->sortByDesc('date_from')->first()->price * $fruit->quantity}} </p>
                                </td>
                                <td>
                                    <button data-id="{{$fruit->fruits->id}}" class="btn btn-md rounded-circle bg-light border mt-4 removeCart" >
                                        <i class="fa fa-times text-danger"></i>
                                    </button>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4 mx-auto">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p id="subtotal" class="mb-0">${{$subtotal}}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping:</h5>
                                <div class="">
                                    <p class="mb-0 mt-2">Flat rate: $10.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total:</h5>
                            <p id="total" class="mb-0 pe-4">${{$subtotal+10}}</p>
                        </div>
                        <a href="{{route('checkout')}}" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</a>
                    </div>
                </div>
            </div>
            @endif
    </div>
    <!-- Cart Page End -->

@endsection

@section('scripts')
    <script src="{{asset('assets/js/cart.js')}}"></script>
@endsection
