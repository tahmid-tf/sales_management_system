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
                                Product Settings
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
                        <div class="card-header">Create Products</div>

                        {{-- ------------- Store products form ------------- --}}

                        <div class="card-body">


                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">
                                    <!-- Form Group (name)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >Product Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter Product Name"
                                            name="name"
                                            value="{{ old('name') }}"
                                        />

                                        <br>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <!-- Form Group (sku)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >SKU</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter SKU"
                                            name="sku"
                                            value="{{ old('sku') }}"
                                        />

                                        <br>
                                        @error('sku')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <!-- Form Group (description)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >Enter Description</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter Description"
                                            name="description"
                                            value="{{ old('description') }}"
                                        />

                                        <br>
                                        @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <!-- Form Group (price)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >Enter Price</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="number"
                                            step="0.01"
                                            placeholder="Enter Price"
                                            name="price"
                                            value="{{ old('price') }}"
                                        />

                                        <br>
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <!-- Form Group (stock)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >Enter Stock</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="number"
                                            placeholder="Enter Stock"
                                            name="stock"
                                            value="{{ old('stock') }}"
                                        />

                                        <br>
                                        @error('stock')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>


                                    <!-- Form Group (stock)-->
                                    <div class="col-md-6">
                                        <label class="small" for="inputFirstName"
                                        >Enter Category</label
                                        >

                                        <select name="category_id" class="form-select">

                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>

                                        <br>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                </div>


                                <!-- Save changes button-->
                                <button class="btn btn-primary" type="submit">
                                    Save Product
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
                        <div class="card-header">View Products</div>


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
{{--                                    <th>--}}
{{--                                        <input type="checkbox" id="select-all-checkbox"/>--}}
{{--                                    </th>--}}
                                    <th>Select</th>
                                    <th>Name</th>
                                    <th>SKU</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                    <th>Delete</th>

                                </tr>
                                </thead>

                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="product-checkbox" value="{{ $product->id }}"/>
                                        </td>
                                        <td>{{ $product->name ?? '' }}</td>
                                        <td>{{ $product->sku ?? '' }}</td>
                                        <td>{{ $product->description ?? '' }}</td>
                                        <td>{{ $product->price ?? '' }}</td>
                                        <td>{{ $product->stock ?? '' }}</td>
                                        <td>{{ \App\Models\Category::find ($product->category_id)->name ?? 'No Category Found' }}</td>
                                        <td>{{ $product->created_at ?? '' }}</td>
                                        <td>
                                            <button
                                                class="btn btn-info update-product-btn"
                                                data-id="{{ $product->id }}"
                                                data-name="{{ $product->name }}"
                                                data-sku="{{ $product->sku }}"
                                                data-description="{{ $product->description }}"
                                                data-price="{{ $product->price }}"
                                                data-stock="{{ $product->stock }}"
                                                data-category="{{ $product->category_id }}"
                                                data-toggle="modal"
                                                data-target="#updateProductModal">
                                                Update
                                            </button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger delete-product-btn"
                                                    data-id="{{ $product->id }}"
                                                    data-toggle="modal"
                                                    data-target="#deleteProductModal">
                                                Delete
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>


                        {{-- ------------------------------------------------------------ Bulk delete ------------------------------------------------------------ --}}

                        <!-- Bulk Delete Button -->
                        <button id="bulk-delete-btn" class="btn btn-danger" style="display: none;" data-toggle="modal"
                                data-target="#bulkDeleteModal">
                            Delete Selected
                        </button>

                        <!-- Bulk Delete Confirmation Modal -->
                        <div class="modal fade" id="bulkDeleteModal" tabindex="-1" role="dialog"
                             aria-labelledby="bulkDeleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bulkDeleteModalLabel">Confirm Bulk Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="bulk-delete-form" method="post" action="{{ route('products.bulk-delete') }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete the selected products?</p>
                                            <input type="hidden" id="selected-ids" name="ids"/>
                                        </div>
                                        <div class="modal-footer">
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">--}}
{{--                                                Cancel--}}
{{--                                            </button>--}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <script>
                            $(document).ready(function () {
                                // Select All Checkboxes
                                $('#select-all-checkbox').on('change', function () {
                                    $('.product-checkbox').prop('checked', this.checked);
                                    toggleBulkDeleteButton();
                                });

                                // Toggle Bulk Delete Button
                                $('.product-checkbox').on('change', function () {
                                    toggleBulkDeleteButton();
                                });

                                // Show/Hide Bulk Delete Button
                                function toggleBulkDeleteButton() {
                                    const selectedCount = $('.product-checkbox:checked').length;
                                    if (selectedCount > 0) {
                                        $('#bulk-delete-btn').show();
                                    } else {
                                        $('#bulk-delete-btn').hide();
                                    }
                                }

                                // Collect IDs for Bulk Delete
                                $('#bulk-delete-btn').on('click', function () {
                                    const selectedIds = $('.product-checkbox:checked')
                                        .map(function () {
                                            return this.value;
                                        })
                                        .get()
                                        .join(',');
                                    $('#selected-ids').val(selectedIds);
                                });
                            });
                        </script>


                        {{-- ------------------------------------------------------------ Bulk delete ------------------------------------------------------------ --}}


                        {{-- ------------------------------------------------------------ Update product ------------------------------------------------------------ --}}

                        <!-- Update Product Modal -->
                        <div class="modal fade" id="updateProductModal" tabindex="-1" role="dialog"
                             aria-labelledby="updateProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateProductModalLabel">Update Product</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="update-product-form" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <!-- Product Name -->
                                            <div class="form-group">
                                                <label for="update-product-name">Product Name</label>
                                                <input type="text" class="form-control" id="update-product-name"
                                                       name="name"/>
                                            </div>
                                            <!-- SKU -->
                                            <div class="form-group">
                                                <label for="update-product-sku">SKU</label>
                                                <input type="text" class="form-control" id="update-product-sku"
                                                       name="sku"/>
                                            </div>
                                            <!-- Description -->
                                            <div class="form-group">
                                                <label for="update-product-description">Description</label>
                                                <input type="text" class="form-control" id="update-product-description"
                                                       name="description"/>
                                            </div>
                                            <!-- Price -->
                                            <div class="form-group">
                                                <label for="update-product-price">Price</label>
                                                <input type="number" step="0.01" class="form-control"
                                                       id="update-product-price" name="price"/>
                                            </div>
                                            <!-- Stock -->
                                            <div class="form-group">
                                                <label for="update-product-stock">Stock</label>
                                                <input type="number" class="form-control" id="update-product-stock"
                                                       name="stock"/>
                                            </div>
                                            <!-- Category -->
                                            <div class="form-group">
                                                <label for="update-product-category">Category</label>
                                                <select class="form-select" id="update-product-category"
                                                        name="category_id">
                                                    @foreach($categories as $category)
                                                        <option
                                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
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

                        {{-- -------- js code for updating -------- --}}

                        <script>
                            $(document).on('click', '.update-product-btn', function () {
                                // Get product details from data attributes
                                const id = $(this).data('id');
                                const name = $(this).data('name');
                                const sku = $(this).data('sku');
                                const description = $(this).data('description');
                                const price = $(this).data('price');
                                const stock = $(this).data('stock');
                                const category = $(this).data('category');

                                // Populate modal fields
                                $('#update-product-name').val(name);
                                $('#update-product-sku').val(sku);
                                $('#update-product-description').val(description);
                                $('#update-product-price').val(price);
                                $('#update-product-stock').val(stock);
                                $('#update-product-category').val(category);

                                // Update the form action URL dynamically
                                $('#update-product-form').attr('action', '/admin/products/' + id);
                            });
                        </script>

                        {{-- ------------------------------------------------------------ Update product ------------------------------------------------------------ --}}

                        {{-- ------------------------------------------------------------ delete product ------------------------------------------------------------ --}}

                        <!-- Delete Product Modal -->
                        <div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog"
                             aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteProductModalLabel">Confirm Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="delete-product-form" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-body">
                                            <p>Are you sure you want to delete this product?</p>
                                        </div>
                                        <div class="modal-footer">
                                            {{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">--}}
                                            {{--                                                Cancel--}}
                                            {{--                                            </button>--}}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- -------- js code for deleting -------- --}}

                        <script>
                            $(document).on('click', '.delete-product-btn', function () {
                                // Get the product ID from the button
                                const id = $(this).data('id');

                                // Update the form action dynamically
                                $('#delete-product-form').attr('action', '/admin/products/' + id);
                            });
                        </script>


                        {{-- ------------------------------------------------------------ delete product ------------------------------------------------------------ --}}


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

