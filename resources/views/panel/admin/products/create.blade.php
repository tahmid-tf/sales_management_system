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
                                        <td>{{ $product->name ?? '' }}</td>
                                        <td>{{ $product->sku ?? '' }}</td>
                                        <td>{{ $product->description ?? '' }}</td>
                                        <td>{{ $product->price ?? '' }}</td>
                                        <td>{{ $product->stock ?? '' }}</td>
                                        <td>{{ \App\Models\Category::find ($product->category_id)->name ?? 'No Category Found' }}</td>
                                        <td>{{ $product->created_at ?? '' }}</td>
                                        <td>
                                            <button class="btn btn-info">Update</button>
                                        </td>
                                        <td>
                                            <button class="btn btn-danger">Delete</button>
                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>


                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

