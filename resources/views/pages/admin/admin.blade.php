@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4 my-5">Admin Dashboard</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center p-3">
                    <h3>Registered Users</h3>
                    <p>{{$users}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center p-3">
                    <h3>Total Fruits</h3>
                    <p>{{$fruits}}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-primary text-white text-center p-3">
                    <h3>Total Orders</h3>
                    <p>{{$orders}}</p>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">This week's profit</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Profit: ${{$profit}}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">This week's reviews</h5>
                        <ul class="list-group">
                            <li class="list-group-item">Total: {{$recentReviews}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Recent Messages</h5>
                        <div class="list-group">
                            @foreach($messages as $m)
                                <div class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h6 class="mb-1">From: {{$m->name}}</h6>
                                        <small>{{ $m->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">Content: {{$m->message}}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')

@endsection
