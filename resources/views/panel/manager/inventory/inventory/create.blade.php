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
                                Inventory Settings
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
                        <div class="card-header">View Inventory</div>


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
                                    <th>Serial</th>
                                    <th>Product</th>
                                    <th>Warehouse</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($inventories as $inventory)

                                    <tr>
                                        <td>1</td>
                                        <td>{{ \App\Models\Product::withTrashed()->find($inventory->product_id)->name ?? '' }}</td>
                                        <td>{{ \App\Models\Inventory\Warehouse::withTrashed()->find($inventory->warehouse_id)->name ?? '' }}</td>
                                        <td>{{ $inventory->quantity ?? '' }}</td>
                                        <td>{{ $inventory->created_at ?? '' }}</td>

                                        <td>
                                            <button
                                                class="btn btn-info update-btn"
                                                data-id="{{ $inventory->id }}"
                                                data-product_id="{{ $inventory->product_id }}"
                                                data-warehouse_id="{{ $inventory->warehouse_id }}"
                                                data-quantity="{{ $inventory->quantity }}"
                                                data-toggle="modal"
                                                data-target="#updateModal">
                                                Update
                                            </button>
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>


                            </table>
                        </div>

                        {{--  -------------------------------------------- Inventory Update -------------------------------------------- --}}

                        <!-- Update Inventory Modal -->
                        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog"
                             aria-labelledby="updateModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel">Update Inventory</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="update-form" method="post">
                                        {{ csrf_field() }}
                                        @method('put')
                                        <div class="modal-body">
                                            <input type="hidden" name="id" id="inventory-id">

                                            <div class="form-group">
                                                <label for="product-id">Product Name</label>
                                                <select class="form-select" name="product_id" id="product-id">
                                                    @foreach($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            {{ $product->id == $inventory->product_id ? 'selected' : '' }}>
                                                            {{ $product->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="warehouse-id">Warehouse Name</label>
                                                <select class="form-select" name="warehouse_id" id="warehouse-id">
                                                    @foreach($warehouses as $warehouse)
                                                        <option value="{{ $warehouse->id }}"
                                                            {{ $warehouse->id == $inventory->warehouse_id ? 'selected' : '' }}>
                                                            {{ $warehouse->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="quantity">Quantity</label>
                                                <input type="number" class="form-control" name="quantity" id="quantity"
                                                       required>
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
                                // Get data attributes from the clicked button
                                const id = $(this).data('id');
                                const productId = $(this).data('product_id');
                                const warehouseId = $(this).data('warehouse_id');
                                const quantity = $(this).data('quantity');

                                // Populate the modal fields
                                $('#inventory-id').val(id);
                                $('#product-id').val(productId);
                                $('#warehouse-id').val(warehouseId);
                                $('#quantity').val(quantity);

                                // Update the form's action URL dynamically
                                $('#update-form').attr('action', '/manager/inventory/' + id);
                            });

                        </script>

                        {{--  -------------------------------------------- Inventory Update -------------------------------------------- --}}


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

