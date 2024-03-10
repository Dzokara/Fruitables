@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Ratings</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['User','Fruit','Value','Description','Published at','Action'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($ratings as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->user->email }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->fruit->name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->value}}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->description }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->published_at }}</td>
                                <td class="col-4 align-middle">
                                    <button class="btn btn-sm btn-danger"  data-id="{{$row->id}}" style="font-size: 23px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $ratings->links() }}
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
