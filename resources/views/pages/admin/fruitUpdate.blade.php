@extends('layouts.layout')
@section('title') Edit @endsection
@section('description') Edit fruit @endsection
@section('keywords') edit, shop, online, home, best, sellers @endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Edit</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Admin</a></li>
            <li class="breadcrumb-item active text-white">Edit</li>
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
            <h1 class="mb-4 text-center">Edit the fruit</h1>
            <form action="{{route('admin.fruits.update.post',$fruit->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row g-5 d-block">
                    <div class="col-md-12 col-lg-6 col-xl-7 mx-auto">
                        <div class="form-item">
                            <label class="form-label my-3">Name <sup>*</sup></label>
                            <input type="text" name="name" value="{{$fruit->name}}" class="form-control" placeholder="Name of the fruit">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Category <sup>*</sup></label>
                            <select class="form-control" name="category" >
                                @foreach($categories as $c)
                                    @if($c->id == $fruit->id_category)
                                    <option value="{{$c->id}}" selected>{{$c->name}}</option>
                                    @else
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('category')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Price <sup>*</sup></label>
                            <input type="text" name="price" value="{{$fruit->prices->sortByDesc('date_from')->first()->price}}" class="form-control" placeholder="Price of the product">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Image <sup>*</sup></label>
                            <input type="file" name="image"  class="form-control">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                            <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" value="Update" name="btnOrder"/>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
