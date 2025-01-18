@extends('panel.master.master')

@section('content')

    <main>
        <header
                class="page-header page-header-compact page-header-light border-bottom bg-white mb-4"
        >
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div
                            class="row align-items-center justify-content-between pt-3"
                    >
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="user"></i>
                                </div>
                                Category Settings
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Warehouse Settings</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <form action="" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">
                                    <!-- Form Group (phone)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Warehouse Name</label
                                        >
                                        <input
                                                class="form-control"
                                                id="inputFirstName"
                                                type="text"
                                                placeholder="Enter Warehouse Name"
                                                name="name"
                                                value="{{ old('name') }}"
                                        />

                                        <br>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <!-- Form Group (Card ID Info)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Warehouse Location</label
                                        >
                                        <input
                                                class="form-control"
                                                id="inputLastName"
                                                type="text"
                                                placeholder="Enter Warehouse Location"
                                                name="location"
                                                value="{{ old('location') }}"
                                        />

                                        <br>
                                        @error('location')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">
                                    Save changes
                                </button>
                            </form>

                            {{-- ------------- Store profile form ------------- --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl px-4 mt-2">
            <!-- Account page navigation-->
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">View Categories</div>


                        {{-- --------------------------- table --------------------------- --}}

                        <div class="card-body">


                            @if(session('update'))
                                <div class="alert alert-info">{{ session('update') }}</div>
                            @endif

                            @if(session('delete'))
                                <div class="alert alert-danger">{{ session('delete') }}</div>
                            @endif

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($warehouses as $warehouse)

                                    <tr>
                                        <td>{{ $warehouse->name ?? '' }}</td>
                                        <td>{{ $warehouse->location ?? '' }}</td>
                                        <td>{{ $warehouse->created_at ?? '' }}</td>

                                        <td>
                                            <button
                                                    class="btn btn-info update-btn"
                                                    data-id="{{ $warehouse->id }}"
                                                    data-name="{{ $warehouse->name }}"
                                                    data-location="{{ $warehouse->location }}"
                                                    data-toggle="modal"
                                                    data-target="#exampleModal">
                                                Update
                                            </button>
                                        </td>

                                        <td>
                                            <button
                                                    class="btn btn-danger delete-btn"
                                                    data-id="{{ $warehouse->id }}"
                                                    data-name="{{ $warehouse->name }}"
                                                    data-toggle="modal"
                                                    data-target="#deleteModal">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>

                                @endforeach

                                </tbody>


                            </table>
                        </div>

                        {{--  -------------------------------------------- Category Update -------------------------------------------- --}}

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Category Update</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="update-form" method="post">
                                            {{ csrf_field() }}
                                            @method('put')
                                            <input type="hidden" name="id" id="category-id">
                                            <div class="form-group">
                                                <label for="category-name">Name</label>
                                                <input type="text" name="name" id="category-name" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="category-description">Location</label>
                                                <input type="text" name="location" id="category-location"
                                                       class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ----------------------------------- jQuery Script for dynamic modal [Update] ---------------------------------------- -->

                        <script>
                            $(document).on('click', '.update-btn', function () {
                                // Get data attributes from the clicked button
                                const id = $(this).data('id');
                                const name = $(this).data('name');
                                const location = $(this).data('location');

                                // Populate the modal fields
                                $('#category-id').val(id);
                                $('#category-name').val(name);
                                $('#category-location').val(location);

                                // Update the form's action URL dynamically
                                $('#update-form').attr('action', '/admin/warehouses/' + id);
                            });
                        </script>

                        {{--  -------------------------------------------- Category Update -------------------------------------------- --}}

                        {{--  -------------------------------------------- Category Delete -------------------------------------------- --}}

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                             aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete the category <strong
                                                    id="delete-warehouse-name"></strong>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        {{--                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel--}}
                                        {{--                                        </button>--}}
                                        <form id="delete-form" method="post">
                                            {{ csrf_field() }}
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).on('click', '.delete-btn', function () {
                                // Get data attributes from the clicked button
                                const id = $(this).data('id');
                                const name = $(this).data('name');

                                // Populate the modal with the category name
                                $('#delete-warehouse-name').text(name);

                                // Update the form's action URL dynamically
                                $('#delete-form').attr('action', '/admin/warehouses/' + id);
                            });
                        </script>


                        {{--  -------------------------------------------- Category Delete -------------------------------------------- --}}


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

