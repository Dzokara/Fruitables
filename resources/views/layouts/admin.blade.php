<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Fruitables - Admin</title>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.home')}}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin Panel</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Back to Website</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Tables
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.fruits')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Fruits</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.categories')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Categories</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.ratings')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Ratings</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.orders')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Orders</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.messages')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Messages</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Users</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Statistics
        </div>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.activity')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Activity</span></a>
        </li>




    </ul>
    <!-- End of Sidebar -->


@yield('content')

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Fruitables 2024</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->



<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')

</body>

</html>



