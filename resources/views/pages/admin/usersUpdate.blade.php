@extends('layouts.layout')
@section('title') Edit @endsection
@section('description') Edit user @endsection
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
            <h1 class="mb-4 text-center">Edit the user</h1>
            <form action="{{route('admin.users.update.post',$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row g-5 d-block">
                    <div class="col-md-12 col-lg-6 col-xl-7 mx-auto">
                        <div class="form-item">
                            <label class="form-label my-3">First Name <sup>*</sup></label>
                            <input type="text" name="fname" value="{{$user->first_name}}" class="form-control mb-3">
                            @error('fname')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Last Name <sup>*</sup></label>
                            <input type="text" name="lname" value="{{$user->last_name}}" class="form-control mb-3" >
                            @error('lname')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Email <sup>*</sup></label>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control mb-3" >
                            @error('email')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Role <sup>*</sup></label>
                            <select class="form-control" name="role">
                                @foreach($roles as $r)
                                    @if($r->id == $user->id_role)
                                        <option value="{{$r->id}}" selected>{{$r->name}}</option>
                                    @else
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('role')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-item">
                            <label class="form-label my-3">Image <sup>*</sup></label>
                            <input type="file" name="image"  class="form-control mb-3">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row g-4 text-center d-block">
                            <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary mt-5" value="Update" name="btnOrder"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Page End -->
@endsection
