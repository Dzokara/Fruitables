@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Users</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="text-center mt-3">
                <button class="btn btn-sm btn-primary px-3 py-1" style="font-size: 23px;">Add a User</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['Image','First Name','Last Name','Email','Role','Action'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-1"><img class="rounded img-fluid w-75" src="{{ asset('assets/img/'.$row->img->href) }}"/></td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->first_name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->last_name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->email }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->role->name }}</td>
                                <td class="col-4 align-middle">
                                    <button class="btn btn-sm btn-primary px-3 py-1" data-id="{{$row->id}}" style="font-size: 23px;">Edit</button>
                                    <button class="btn btn-sm btn-danger"  data-id="{{$row->id}}" style="font-size: 23px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $users->links() }}
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

@section('scripts')

@endsection
