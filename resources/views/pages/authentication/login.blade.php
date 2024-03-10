@extends('layouts.layout')
@section('title') Login @endsection
@section('description') Login page @endsection
@section('keywords') login, shop, online, home, best, sellers @endsection

@section('content')

    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Log In</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Login</li>
        </ol>
    </div>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white">Login</div>
                    <div class="card-body">
                        @if($errors->has('badLogin'))
                            <div class="alert alert-danger">{{ $errors->first('badLogin') }}</div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{route('login.login')}}">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary text-white">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
