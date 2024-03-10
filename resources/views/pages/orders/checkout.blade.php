@extends('layouts.layout')
@section('title') Checkout @endsection
@section('description') Confirm your orders here! @endsection
@section('keywords') checkout, shop, online, home, best, sellers @endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Checkout</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Checkout</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="mb-4">Billing details</h1>
            <form action="{{route('orderCheckout')}}" method="POST">
                @csrf
                <div class="row g-5">
                    <input type="hidden" name="total" value="{{$subtotal+10}}">
                    <div class="col-md-12 col-lg-6 col-xl-7">
                        <div class="form-item">
                            <label class="form-label my-3">Address <sup>*</sup></label>
                            <input type="text" name="address" value="{{ old('address') }}" class="form-control" placeholder="Example: Adress 123">
                            @error('address')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Mobile<sup>*</sup></label>
                            <input type="tel" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Example: 0621234567">
                            @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <hr>
                        <div class="form-item">
                            <textarea name="notes" class="form-control" spellcheck="false" cols="30" rows="11"  placeholder="Order Notes (Optional)">{{ old('notes') }}</textarea>
                            @error('notes')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" value="Place Order" name="btnOrder"/>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-5">
                        <div class="py-3 border-bottom">
                            <h4 class="mb-0 text-dark py-3 fw-bold">Total: ${{$subtotal+10}}</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Products</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fruits as $fruit)
                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center">
                                                <img src="{{asset('assets/img/'.$fruit->fruits->img->href)}}" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                            </div>
                                        </th>
                                        <td class="py-5">{{$fruit->fruits->name}}</td>
                                        <td class="py-5">${{$fruit->fruits->prices->sortByDesc('date_from')->first()->price}}</td>
                                        <td class="py-5">{{$fruit->quantity}}</td>
                                        <td class="py-5">${{$fruit->fruits->prices->sortByDesc('date_from')->first()->price * $fruit->quantity}}</td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
