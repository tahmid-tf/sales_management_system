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
                                Supplier Settings
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
                        <div class="card-header">Supplier Settings</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <form action="{{ route('suppliers.store') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Supplier Name</label
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

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Suppliers Contact</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Suppliers Contact Info"
                                            name="contact"
                                            value="{{ old('contact') }}"
                                        />

                                        <br>
                                        @error('contact')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Suppliers Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="email"
                                            placeholder="Enter Suppliers Email Info"
                                            name="email"
                                            value="{{ old('email') }}"
                                        />

                                        <br>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Suppliers Phone</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Suppliers Phone No"
                                            name="phone"
                                            value="{{ old('phone') }}"
                                        />

                                        <br>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputLastName"
                                        >Suppliers Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter Suppliers Address"
                                            name="address"
                                            value="{{ old('address') }}"
                                        />

                                        <br>

                                        @error('address')
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
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($suppliers as $supplier)

                                    <tr>
                                        <td>{{ $supplier->name ?? '' }}</td>
                                        <td>{{ $supplier->contact ?? '' }}</td>
                                        <td>{{ $supplier->email ?? '' }}</td>
                                        <td>{{ $supplier->phone ?? '' }}</td>
                                        <td>{{ $supplier->address ?? '' }}</td>
                                        <td>{{ $supplier->created_at ?? '' }}</td>

                                        <td>
                                            <button
                                                class="btn btn-info update-btn"
                                                data-id="{{ $supplier->id }}"
                                                data-name="{{ $supplier->name }}"
                                                data-contact="{{ $supplier->contact }}"
                                                data-email="{{ $supplier->email }}"
                                                data-address="{{ $supplier->address }}"
                                                data-phone="{{ $supplier->phone }}"
                                                data-toggle="modal"
                                                data-target="#updateModal">
                                                Update
                                            </button>
                                        </td>

                                        <td>
                                            <button
                                                class="btn btn-danger delete-btn"
                                                data-id="{{ $supplier->id }}"
                                                data-name="{{ $supplier->name }}"
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

                        <!-- Update Supplier Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                             aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Supplier</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="update-form" method="post">
                                        {{ csrf_field() }}
                                        @method('put')
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="supplier-id">
                                            <div class="form-group">
                                                <label for="supplier-name">Name</label>
                                                <input type="text" name="name" id="supplier-name" class="form-control"
                                                       required>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier-contact">Contact</label>
                                                <input type="text" name="contact" id="supplier-contact"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier-email">Email</label>
                                                <input type="email" name="email" id="supplier-email"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier-address">Address</label>
                                                <input type="text" name="address" id="supplier-address"
                                                       class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="supplier-address">Phone</label>
                                                <input type="text" name="phone" id="supplier-phone"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <script>
                            $(document).on('click', '.update-btn', function () {
                                // Retrieve data attributes from the button
                                const id = $(this).data('id');
                                const name = $(this).data('name');
                                const contact = $(this).data('contact');
                                const email = $(this).data('email');
                                const address = $(this).data('address');
                                const phone = $(this).data('phone');

                                // Populate modal inputs with the retrieved data
                                $('#supplier-id').val(id);
                                $('#supplier-name').val(name);
                                $('#supplier-contact').val(contact);
                                $('#supplier-email').val(email);
                                $('#supplier-address').val(address);
                                $('#supplier-phone').val(phone);

                                // Dynamically set the action URL for the update form
                                $('#update-form').attr('action', '/admin/suppliers/' + id);
                            });

                        </script>


                        {{--  -------------------------------------------- Category Update -------------------------------------------- --}}

                        {{--  -------------------------------------------- Category Delete -------------------------------------------- --}}

                        <!-- Delete Supplier Modal -->
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
                                    <form id="delete-form" method="post">
                                        {{ csrf_field() }}
                                        @method('delete')
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this supplier?</p>
                                            <p><strong id="supplier-name-delete"></strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Cancel
                                            </button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            $(document).on('click', '.delete-btn', function () {
                                // Retrieve data attributes from the button
                                const id = $(this).data('id');
                                const name = $(this).data('name');

                                // Set the supplier name in the modal for confirmation
                                $('#supplier-name-delete').text(name);

                                // Dynamically set the action URL for the delete form
                                $('#delete-form').attr('action', '/admin/suppliers/' + id);
                            });

                        </script>


                        {{--  -------------------------------------------- Category Delete -------------------------------------------- --}}


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

