<x-admin>

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->

            <!-- Card Body -->
            <div class="card-body">
                <div class="row">
                    <form action="" class="form-inline" method="get">

                        <div class="form-group">
                            <label for="">Sort By</label>
                            <select name="sort" id="" class="form-control">
                                <option @if ($_GET['sort'] == 'created_at') selected @endif value="created_at">Date
                                    Created</option>
                                <option @if ($_GET['sort'] == 'name') selected @endif value="name">Name</option>
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Where Custom</label>
                            <input type="text" name="where" class="form-control">
                        </div> -->
                        <!--- <input name="advanced_query" value="1" /> -->
                        <div class="form-group">
                            <label for="">Sort Order</label>
                            <select name="order" id="" class="form-control">
                                <option @if ($_GET['order'] == 'desc') selected @endif value="desc">Desc</option>
                                <option @if ($_GET['order'] == 'asc') selected @endif value="asc">Asc</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary ">Filter</button>
                        </div>

                    </form>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Email</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    {{ $user->email }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <table>
            </div>
        </div>
    </div>
</x-admin>
