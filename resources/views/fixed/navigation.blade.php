<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#" class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand"><h1 class="text-primary display-6">Fruitables</h1></a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    @foreach($nav as $n)
                        @if(session('user'))
                            @if($n->href == '/login' || $n->href=='/register' || ($n->href == '/admin' && session('user')->role->id != 2))
                                <!-- Do nothing -->
                            @else
                                <a href="{{$n->href}}" class="nav-item nav-link active">{{$n->name}}</a>
                            @endif
                        @else
                            @if($n->href == '/admin' || $n->href == '/logout' || $n->href=='/cart' || $n->href=='/checkout' || $n->href=='/orders')
                                <!-- Do nothing -->
                            @else
                                <a href="{{$n->href}}" class="nav-item nav-link active">{{$n->name}}</a>
                            @endif
                        @endif
                    @endforeach

                </div>
            </div>
        </nav>
    </div>
</div>
