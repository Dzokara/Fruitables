@extends('layouts.layout')
@section('title') Shop @endsection
@section('description') The main page of the shop. @endsection
@section('keywords') shop, online, home, best, sellers @endsection


@section ('content')
    <!-- Modal Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center">
                    <div class="input-group w-75 mx-auto d-flex">
                        <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                        <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Search End -->


    <!-- Single Page Header start -->
    <div class="container-fluid page-header py-5">
        <h1 class="text-center text-white display-6">Shop</h1>
        <ol class="breadcrumb justify-content-center mb-0">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active text-white">Shop</li>
        </ol>
    </div>
    <!-- Single Page Header End -->

    <div id="notification" class="alert d-none px-4 py-4 text-center"></div>
    <!-- Fruits Shop Start-->
    <div class="container-fluid fruite py-5">
        @if(!session()->get('user'))
        <h1 class="text-center my-5">You need to log in, to be able to add products to your cart!</h1>
        @endif
        <div class="container py-5">
            <h1 class="mb-4">Fresh fruits shop</h1>
            <div class="row g-4">
                <div class="col-lg-12">
                    <div class="row g-4">
                        <div class="col-xl-3">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input id="search" type="search" class="form-control p-3" placeholder="Type here..." aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-6"></div>
                        <div class="col-xl-3">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between mb-4">
                                <label for="fruits">Default Sorting:</label>
                                <select id="fruits" name="fruitlist" class="border-0 form-select-sm bg-light me-3" form="fruitform">
                                    <option value="0"> Choose </option>
                                    <option value="desc">Price - High to Low</option>
                                    <option value="asc">Price - Low to High</option>
                                    <option value="rat">Rating</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <h4>Categories</h4>
                                        <ul class="list-unstyled fruite-categorie">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input catFilter" type="radio" name="category_id" id="categoryAll" value="-1" checked="checked">
                                                    <label class="form-check-label" for="categoryAll">
                                                        <i class="fas fa-apple-alt me-2"></i>All fruit ({{$fruits->total()}})
                                                    </label>
                                                </div>
                                            </li>
                                            @foreach($categories as $category)
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input catFilter" type="radio" name="category_id" id="category{{$category->id}}" value="{{$category->id}}">
                                                        <label class="form-check-label" for="category{{$category->id}}">
                                                            <i class="fas fa-apple-alt me-2"></i>{{$category->name}} ({{$category->fruits->count()}})
                                                        </label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <h4 class="mb-3">Featured products</h4>
                                        @foreach($featured as $fruit)
                                        @if(count($fruit->prices) > 0)
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
                        <div class="col-lg-9">
                            <div id="fruits-container">
                                <div class="row g-4 justify-content-center">
                                    @foreach($fruits as $fruit)
                                        @if(count($fruit->prices) > 0)
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <a href="{{route('fruit',['id'=>$fruit->id])}}"><img src="{{asset('assets/img/'.$fruit->img->href)}}" class="img-fluid w-100 rounded-top" alt="xd"></a>
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">{{$fruit->category->name}}</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
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
                                                        @if(session()->get('user'))
                                                            <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary addCart" data-id='{{$fruit->id}}'><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                            </div>
                            </div>
                                <div id="pagination-container" class="col-12">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <ul class="pagination">
                                            @for ($i = 1; $i <= ceil($fruits->total()/8); $i++)
                                                <li class="page-item">
                                                    @if($i==1)<a class="page-link active" href="#" data-page="{{ $i }}">{{ $i }}</a>
                                                    @else <a class="page-link" href="#" data-page="{{ $i }}">{{ $i }}</a> @endif
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fruits Shop End-->

@endsection
@section('scripts')
    <script src="{{asset('assets/js/shop.js')}}"></script>
@endsection
