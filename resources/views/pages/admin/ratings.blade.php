@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Ratings</h1>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display error message if it exists -->
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
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
                                    <button class="btn btn-sm btn-danger deleteModal"  data-id="{{$row->id}}" style="font-size: 23px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $ratings->links() }}
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Rating</h5>
                        <button type="button" class="close cancelDelete" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this rating?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelDelete" data-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" action="{{route('admin.rating.delete')}}">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="rating_id" id="fruit_id" value="{{$row->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection


    @section('scripts')<script src="{{asset('assets/js/deleteModal.js')}}"></script>
@endsection
