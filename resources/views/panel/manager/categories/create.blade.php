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
{{--                                    <th>Delete</th>--}}

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)

                                    <tr>
                                        <td>{{ $category->name ?? '' }}</td>
                                        <td>{{ $category->description ?? '' }}</td>
                                        <td>{{ $category->created_at ?? '' }}</td>

                                        <td>
                                            <button
                                                class="btn btn-info update-btn"
                                                data-id="{{ $category->id }}"
                                                data-name="{{ $category->name }}"
                                                data-description="{{ $category->description }}"
                                                data-toggle="modal"
                                                data-target="#exampleModal">
                                                Update
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
                                                <label for="category-description">Description</label>
                                                <input type="text" name="description" id="category-description"
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
                                const description = $(this).data('description');

                                // Populate the modal fields
                                $('#category-id').val(id);
                                $('#category-name').val(name);
                                $('#category-description').val(description);

                                // Update the form's action URL dynamically
                                $('#update-form').attr('action', '/manager/categories/' + id);
                            });
                        </script>

                        {{--  -------------------------------------------- Category Update -------------------------------------------- --}}

                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

