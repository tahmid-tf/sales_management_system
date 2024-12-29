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
                        <div class="card-header">Create Categories</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">
                                    <!-- Form Group (phone)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Category Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter Category Name"
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
                                        >Category Description</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputLastName"
                                            type="text"
                                            placeholder="Enter description"
                                            name="description"
                                        />

                                        <br>
                                        @error('description')
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

                                @foreach($categories as $category)

                                    <tr>
                                        <td>{{ $category->name ?? '' }}</td>
                                        <td>{{ $category->description ?? '' }}</td>
                                        <td>{{ $category->created_at ?? '' }}</td>
                                        <td>
                                            <button class="btn btn-info">Update</button>
                                        </td>
                                        <td>
                                            <form action="{{ route('categories.destroy',$category->id) }}" method="post">
                                                {{ csrf_field() }}
                                                @method('delete')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
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

