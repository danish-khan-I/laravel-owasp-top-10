<x-admin>

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Upload Map</h6>

            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required placeholder="title" value="{{$map->title ?? ''}}">
                    </div>
                    @csrf
                    <input type="hidden" name="id" value="{{$map->id ?? ''}}">
                    <div class="form-group">
                        <label for="url">Map Url</label>
                        <input type="url" required class="form-control" id="url" name="url" placeholder="Enter map url" value="{{$map->src ?? ''}}">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">  @if($map->id ?? false) Update  @else Submit @endif </button>
                    </div>
                </form>
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>





</x-admin>
