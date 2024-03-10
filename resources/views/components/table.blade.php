<!-- resources/views/components/table.blade.php -->

@props(['columns', 'properties', 'data'])

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
        </thead>
        <tfoot>
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column }}</th>
            @endforeach
        </tr>
        </tfoot>
        <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($properties as $property)
                    <td>{{ $row->$property }}</td>
                @endforeach
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
