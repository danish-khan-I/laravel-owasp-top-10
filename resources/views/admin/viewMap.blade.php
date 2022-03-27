<x-admin>

    {{-- show list of maps in a table --}}

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->

            <!-- Card Body -->
            <div class="card-body">
                <h3>{{ $map->title }}</h3>
                <div class="container">
                    <iframe src="{{ $map->src }}" frameborder="0"></iframe>
                </div>
                <a href="{{route('admin.generatePdf',['title' => $map->title, 'id' => $map->id,'pdf' => true])}}">
                    <button class="btn btn-primary">Generate a PDF</button>
                </a>
            </div>
        </div>
    </div>




</x-admin>
