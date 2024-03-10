@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Messages</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['Name','Email','Message'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->email }}</td>
                                <td class="col-4 align-middle" style="font-size: 23px;" >{{ $row->message }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $messages->links() }}
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
