@extends('layouts.layout')
@section('title') Insert @endsection
@section('description') Insert category @endsection
@section('keywords') insert, shop, online, home, best, sellers @endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Insert</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
            <li class="breadcrumb-item active text-white">Insert</li>
        </ol>
    </div>
    <!-- Single Page Header End -->


    <!-- Checkout Page Start -->
    <div class="container-fluid py-5">
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container py-5">
            <h1 class="mb-4 text-center">Insert a category</h1>
            <form action="{{route('admin.categories.insert.post')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-5 d-block">
                    <div class="col-md-12 col-lg-6 col-xl-7 mx-auto">
                        <div class="form-item">
                            <label class="form-label my-3">Name <sup>*</sup></label>
                            <input type="text" name="name" value="" class="form-control mb-3" placeholder="Name of the category">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" value="Insert" name="btnOrder"/>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
