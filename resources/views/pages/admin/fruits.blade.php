@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mt-5 text-gray-800">Fruit</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="text-center mt-3">
                <button class="btn btn-sm btn-primary px-3 py-1" style="font-size: 23px;">Add a Fruit</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            @foreach (['Image','Name','Category','Price','Action'] as $column)
                                <th>{{ $column }}</th>
                            @endforeach
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($fruits as $row)
                            <tr class="text-center fw-bold ">
                                <td class="col-1"><img class="rounded img-fluid w-75" src="{{ asset('assets/img/'.$row->img->href) }}"/></td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;" >{{ $row->category->name }}</td>
                                <td class="col-2 align-middle" style="font-size: 23px;">
                                    @if ($row->prices->isNotEmpty() && $row->prices->sortByDesc('date_from')->first()->price !== null)
                                        ${{ $row->prices->sortByDesc('date_from')->first()->price }}
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="col-4 align-middle">
                                    <button class="btn btn-sm btn-primary px-3 py-1 updateModal" data-id="{{$row->id}}" style="font-size: 23px;">Edit</button>
                                    <button class="btn btn-sm btn-danger deleteModal"  data-id="{{$row->id}}" style="font-size: 23px;">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        {{ $fruits->links() }}
                    </table>

                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Fruit</h5>
                        <button type="button" class="close cancelDelete" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this fruit?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary cancelDelete" data-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" action="">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="fruit_id" id="fruit_id" value="">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Edit Fruit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="updateModalContent">
                    <!-- Your update form will be loaded here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

@section('scripts')
    <script src="{{asset('assets/js/deleteModal.js')}}"></script>
    <script src="{{asset('assets/js/updateModal.js')}}"></script>
@endsection
