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
                                Granting permission to staffs
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
                        <div class="card-header">Granting permission to staffs</div>


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
                                    <th>Permission</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($warehouse_assign_to_staffs as $staff)
                                    <tr>
                                        <td>{{ \App\Models\User::where('id', $staff->staff_id)->first()->name ?? "Name not found" }}</td>
                                        <td>{{ \App\Models\User::where('id', $staff->staff_id)->first()->email ?? "Email not found" }}</td>
                                        <td>{{ \App\Models\UserProfile::where('user_id', $staff->staff_id)->first()->phone ?? "Profile not created"  }}</td>
                                        <td>{{ \App\Models\Inventory\Warehouse::withTrashed()->where('id',$staff->warehouse_id)->first()->name ?? "Warehouse not found" }}</td>
                                        <td>{{ ucfirst($staff->status) ?? "Status not found" }}</td>
                                        <td>
                                            <form action="{{ route('staff_permission.update', $staff->staff_id) }}"
                                                  method="post">
                                                {{ csrf_field() }}
                                                @method('put')
                                                <input type="submit"
                                                       class="btn {{ $staff->status == 'inactive' ? 'btn-success' : 'btn-danger' }}"
                                                       value="{{ $staff->status == 'inactive' ?  'Active' : 'Inactive' }}">
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

