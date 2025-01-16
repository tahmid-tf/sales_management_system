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
                                User Management
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
                        <div class="card-header">User Management</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif

                            <form action="{{ route('user_management.store') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter Category Name"
                                            name="name"
                                        />

                                        <br>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="email_form_id"
                                            type="email"
                                            placeholder="Enter email"
                                            name="email"
                                        />

                                        <br>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >Password</label
                                        >
                                        <input
                                            class="form-control"
                                            id="password_form_id"
                                            type="password"
                                            placeholder="Enter password"
                                            name="password"
                                            value=""
                                        />

                                        <br>
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputLastName"
                                        >User Role</label
                                        >

                                        <select class="form-select" name="user_role">
                                            <option value="manager">Manager</option>
                                            <option value="staff">Staff</option>
                                        </select>

                                        <br>
                                        @error('user_role')
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
                        <div class="card-header">View Users</div>


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
                                    <th>User ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Role</th>
                                    <th>Account Status</th>
                                    <th>Freeze / Unfreeze Account</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)

                                    <tr>
                                        <td>#{{ $user->id }}</td>
                                        <td>{{ $user->name ?? '' }}</td>
                                        <td>{{ $user->email ?? '' }}</td>
                                        <td>{{ $user->user_role ?? '' }}</td>
                                        <td>{{ ucfirst($user->account_status) ?? '' }}</td>
                                        <td>
                                            <form action="{{ route('user_management.update', $user->id) }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                @method('put')
                                                <input type="submit"
                                                       class="btn {{ $user->account_status == 'active' ? 'btn-danger' : 'btn-success' }} delete-btn"
                                                       value="{{ $user->account_status == 'inactive' ? 'Active' : 'Inactive' }}">
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

