@extends('layouts.layout')
@section('title') Author @endsection
@section('description') Author @endsection
@section('keywords') Author, shop, online, home, best, sellers @endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Author</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Author</li>
        </ol>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{asset('assets/img/author.jpg')}}" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-6">
                <h2>Đorđe Jovanović 11/21</h2>
                <p>I was born in Belgrade. I am currently a student at the ICT College. I am a front end developer that is constantly working on his craft. I mostly dable in front-end programming for now, but I'm also having tons of fun learning new stuff!</p>
            </div>
        </div>
    </div>

@endsection

<!-- Single Page Header End -->


