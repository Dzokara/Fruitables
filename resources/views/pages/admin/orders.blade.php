@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Orders</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['User','Total','Address','Phone','Note','Ordered at'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->user->email }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >${{ $row->total }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->address }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->phone }}</td>
                                @if ($row->message !== null)
                                    <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->message }}</td>
                                @else
                                    <td class="col-2 align-middle" style="font-size: 23px;" >The user didn't leave a note.</td>
                                @endif
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $orders->links() }}
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
