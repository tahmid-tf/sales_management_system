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
                                Assigning Staffs to warehouse
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
                        <div class="card-header">Assigning Staffs to warehouse</div>

                        {{-- ------------- Store profile form ------------- --}}

                        <div class="card-body">


                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning">{{ session('warning') }}</div>
                            @endif

                            <form action="{{ route('assign_staff.store') }}" method="post"
                                  enctype="multipart/form-data">

                                {{ csrf_field() }}

                                <!-- Form Row-->
                                <div class="row">

                                    <!-- Form Group (Staff Info)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Staff Name</label
                                        >

                                        <select class="form-select" name="staff_id">

                                            @foreach($staffs as $staff)
                                                <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                            @endforeach

                                        </select>

                                        <br>
                                        @error('staff_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (Assigning to Warehouse)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Assigning to Warehouse</label
                                        >

                                        <select class="form-select" name="warehouse_id">

                                            @foreach($warehouses as $warehouse)
                                                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                            @endforeach

                                        </select>

                                        <br>
                                        @error('warehouse_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (Manager ID)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Assigned by Manager</label
                                        >

                                        <select class="form-select" name="manager_id">
                                            <option value="{{ auth()->id() }}">{{ auth()->user()->name ?? '' }}</option>
                                        </select>

                                        <br>
                                        @error('manager_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (Admin ID)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Permitted By Admin</label
                                        >

                                        <select class="form-select" name="admin_id">

                                            @foreach($admins as $admin)
                                                <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                            @endforeach
                                        </select>

                                        <br>
                                        @error('admin_id')
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
                        <div class="card-header">View All Staffs</div>


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
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Assigned Warehouse</th>
                                    <th>Status</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->name ?? '' }}</td>
                                        <td>{{ $staff->email ?? '' }}</td>
                                        <td>{{ \App\Models\UserProfile::where('user_id', $staff->id)->first()->phone ?? 'Not Found' }}</td>
                                        <td>{{ \App\Models\Sales\Warehouse_assign_to_staff::assigned_warehouse($staff->id) ?? 'Not Found' }}</td>
                                        <td>{{ \App\Models\Sales\Warehouse_assign_to_staff::staff_status($staff->id) ?? 'Not Found' }}</td>
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

