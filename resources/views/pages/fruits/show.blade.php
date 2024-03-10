@extends('layouts.layout')
@section('title') Single Product @endsection
@section('description') Single product page @endsection
@section('keywords') shop, online, home, best, sellers @endsection
@section('content')
    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop Detail</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Shop Detail</li>
        </ol>
    </div>
    <!-- Single Page Header End -->
    <div id="notification" class="alert d-none px-4 py-4 text-center"></div>
    <!-- Single Product Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="row g-4 mb-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="rounded">
                                <a href="#">
                                    <a href="{{route('fruit',['id'=>$fruit->id])}}"><img src="{{asset('assets/img/'.$fruit->img->href)}}" class="img-fluid w-100 rounded-top" alt="xd"></a>
                                </a>
                            </div>
                        </div>
                        <input id="fruitId" type="hidden" name="idFruit" data-id="{{$fruit->id}}">
                        <div class="col-lg-6">
                            <h4 class="fw-bold mb-3">{{$fruit->name}}</h4>
                            <p class="mb-3">Category: {{$fruit->category->name}}</p>
                            <h5 class="fw-bold mb-3">${{$fruit->prices->sortByDesc('date_from')->first()->price}}</h5>
                            <div class="d-flex my-4 fw-bold text-dark">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($fruit->getRating() >= $i)
                                        <i class="fas fa-star text-primary"></i>
                                    @elseif ($fruit->getRating() >= $i - 0.5)
                                        <i class="fas fa-star-half-alt text-primary"></i>
                                    @else
                                        <i class="far fa-star text-primary"></i>
                                    @endif
                                @endfor
                                ({{$fruit->rating->count()}})
                            </div>
                            <p class="fw-bold mt-5 col-11">You can see what other customers think about this product down below!</p>
                            <h1 class="fw-bold text-primary text-center col-11">&darr;</h1>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                    <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                            id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                            aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>

                            <div class="tab-content mb-5">
                                @if($reviews->count() > 0)
                                <div class="tab-pane active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                    @foreach($reviews as $review)
                                        <div class="d-flex align-items-start my-3">
                                            <img src="{{ asset('assets/img/' . $review->user->img->href) }}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="">
                                            <div class="flex-grow-1 ms-3">
                                                <p class="mb-2" style="font-size: 14px;">{{ $review->published_at}}</p>
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <h5>{{ $review->user->first_name }} {{ $review->user->last_name }}</h5>
                                                    <div class="d-flex my-4 fw-bold text-dark">
                                                        @for ($i = 1; $i <= 5; $i++)
                                                            @if ($review->value >= $i)
                                                                <i class="fas fa-star text-primary"></i>
                                                            @elseif ($review->value >= $i - 0.5)
                                                                <i class="fas fa-star-half-alt text-primary"></i>
                                                            @else
                                                                <i class="far fa-star text-primary"></i>
                                                            @endif
                                                        @endfor
                                                    </div>
                                                </div>
                                                <p>{{ $review->description }}</p>
                                            </div>
                                        </div>

                                    @endforeach

                                </div>
                                @else
                                    <div class="tab-pane active" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">

                                        <h3 class="mt-5 text-center">No reviews yet...</h3>

                                    </div>
                                @endif
                            </div>
                            @if(session()->get('user'))
                                <h4 class="mb-5 fw-bold">Give us your opinion!</h4>
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="border-bottom rounded my-4">
                                            <textarea name="reviewDesc" id="reviewDesc" class="form-control border-0" cols="30" rows="8" placeholder="Your Review *" spellcheck="false"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="d-flex justify-content-between py-3 mb-5">
                                            <div class="d-flex align-items-center">
                                                <p class="mb-0 me-3">Please rate:</p>
                                                <div class="d-flex align-items-center" style="font-size: 20px;">
                                                    <i class="fa fa-star rate-star"></i>
                                                    <i class="fa fa-star rate-star"></i>
                                                    <i class="fa fa-star rate-star"></i>
                                                    <i class="fa fa-star rate-star"></i>
                                                    <i class="fa fa-star rate-star"></i>
                                                </div>
                                            </div>
                                            <button id="buttonReview" class="btn border border-secondary text-primary rounded-pill px-4 py-3" disabled>Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <h4 class="mb-5 fw-bold">Log in to leave a reply. You can do so <a href="{{route('login.index')}}">here.</a></h4>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="row g-4 fruite">
                        <div class="col-lg-12">
                            <h4 class="mb-4">Featured products</h4>
                            @foreach($featured as $fruit)
                                @if(count($fruit->prices)>0)
                                <div class="d-flex align-items-center justify-content-start mb-3">
                                    <div class="rounded me-2" style="width: 100px; height: 100px;">
                                        <a href="{{route('fruit',['id'=>$fruit->id])}}"><img src="{{asset('assets/img/'.$fruit->img->href)}}" class="img-fluid w-100 rounded-top" alt="xd"></a>
                                    </div>
                                    <div>
                                        <h6 class="mb-2">{{$fruit->name}}</h6>
                                        <div class="d-flex fw-bold text-dark">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($fruit->getRating() >= $i)
                                                    <i class="fas fa-star text-primary"></i>
                                                @elseif ($fruit->getRating() >= $i - 0.5)
                                                    <i class="fas fa-star-half-alt text-primary"></i>
                                                @else
                                                    <i class="far fa-star text-primary"></i>
                                                @endif
                                            @endfor
                                        ({{$fruit->rating->count()}})
                                        </div>
                                        <div class="d-flex">
                                            <h5 class="fw-bold">${{$fruit->prices->sortByDesc('date_from')->first()->price}}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach

                            <div class="d-flex justify-content-center my-4">
                                <a href="{{route('fruits')}}" class="btn border border-secondary px-4 py-3 rounded-pill text-primary w-100">See more!</a>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="position-relative">
                                <img src="{{asset('assets/img/banner-fruits.jpg')}}" class="img-fluid w-100 rounded" alt="">
                                <div class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%);">
                                    <h3 class="text-secondary fw-bold">Fresh <br> Fruits <br> Banner</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!$related->isEmpty())
                <div class="container-fluid vesitable">
                <div class="container">
                    <h1 class="mb-0">Related products</h1>
                    <div class="owl-carousel vegetable-carousel justify-content-center">
                        @foreach($related as $fruit)
                            @if(count($fruit->prices)>0)
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="vesitable-img">
                                    <a href="{{route('fruit',['id'=>$fruit->id])}}"><img src="{{asset('assets/img/'.$fruit->img->href)}}" class="img-fluid w-100 rounded-top" alt="xd"></a>
                                </div>
                                <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">
                                    {{$fruit->category->name}}</div>
                                <div class="p-4 rounded-bottom">
                                    <h4>{{$fruit->name}}</h4>
                                    <h3 class="fs-5 fw-bold mb-3">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($fruit->getRating() >= $i)
                                                <i class="fas fa-star text-primary"></i>
                                            @elseif ($fruit->getRating() >= $i - 0.5)
                                                <i class="fas fa-star-half-alt text-primary"></i>
                                            @else
                                                <i class="far fa-star text-primary"></i>
                                            @endif
                                        @endfor
                                    ({{$fruit->rating->count()}})
                                    </h3>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">${{$fruit->prices->sortByDesc('date_from')->first()->price}} / kg</p>
                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Single Product End -->

@endsection

@section('scripts')
    <script src="{{asset('assets/js/show.js')}}"></script>
@endsection




