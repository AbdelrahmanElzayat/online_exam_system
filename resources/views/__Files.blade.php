<table class="table table-striped table-bordered table-hover datatable">
    <thead>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>File</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach ($data as $key => $data)
            <tr>
                <th>{{ $key + 1 }}</th>
                <td>{{ $data->name }}</td>
                <td>{{ $data->description }}</td>
                <td>{{ $data->file }}</td>
                <td>
                    {{-- <a href="{{ route('view',$data->id) }}" class="btn btn-info">View</a> --}}
                    <a class="btn btn-info" data-toggle="modal" data-target="#myModal{{ $data->id }}">view</a>
                    <a href="{{ route('download', $data) }}" class="btn btn-success">Download</a>


                </td>

            </tr>
            <div class="modal fade" id="myModal{{ $data->id }}" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">view</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                        <div class="modal-body">
                            {{ $data->id }}
                            {{ $data->name }}
                            {{ $data->description }}
                            <iframe width="750" height="500"
                                src="public/assets/{{ $data->file . '.' . $data->extension }}"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach

    </tbody>
    <tfoot>
        <th>#</th>
        <th>Name</th>
        <th>Description</th>
        <th>File</th>
        <th>Action</th>
    </tfoot>
</table>
