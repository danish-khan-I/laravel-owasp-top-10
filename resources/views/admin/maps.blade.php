<x-admin>

    {{-- show list of maps in a table --}}

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Maps</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Map Name</th>
                                <th style="width:10%;max-width: 10% !important"> Map Url</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($maps as $map)
                                <tr>
                                    <td> <a href="{{route('maps.view',$map->id)}}">{{ $map->title }}</a> </td>
                                    <td>{{ $map->src }}</td>
                                    <td>
                                        <a href="{{ route('maps', ['id' => $map->id, 'edit' => true]) }}"
                                            class="btn btn-primary">Edit</a>
                                        {{-- <a href="{{ route('maps.delete', $map->id) }}" class="btn btn-danger">Delete</a> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>




</x-admin>
