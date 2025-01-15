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
                                View Orders
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
                        <div class="card-header">View Orders</div>


                        {{-- --------------------------- table --------------------------- --}}

                        <div class="card-body">

                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <table id="datatablesSimple">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Invoice</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>

                                            @if(auth()->user()->user_role == "staff")

                                                <a class="btn btn-primary"
                                                   href="{{ route('staff.view_invoice.index', $order->id) }}">Invoice</a>

                                            @elseif(auth()->user()->user_role == "manager")

                                                <a class="btn btn-primary"
                                                   href="{{ route('manager.view_invoice.index', $order->id) }}">Invoice</a>

                                            @elseif(auth()->user()->user_role == "admin")

                                                <a class="btn btn-primary"
                                                   href="{{ route('admin.view_invoice.index', $order->id) }}">Invoice</a>

                                            @endif
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

