@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Categories</h1>
        <!-- Display success message if it exists -->
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
            <div class="text-center mt-3">
                <a href="{{route('admin.categories.insert')}}"><button class="btn btn-sm btn-primary px-3 py-1" style="font-size: 23px;">Add a Category</button></a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['Name','Action'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->name }}</td>
                                <td class="col-4 align-middle">
                                    <a href="{{route('admin.categories.update',$row->id)}}"><button class="btn btn-sm btn-primary px-3 py-1" data-id="{{$row->id}}" style="font-size: 23px;">Edit</button></a>
                                    <button class="btn btn-sm btn-danger deleteModal"  data-id="{{$row->id}}" style="font-size: 23px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                        <button type="button" class="close cancelDelete" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this category?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelDelete" data-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" action="">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="category_id" id="fruit_id" value="{{route('admin.categories.delete')}}">
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
