@extends('panel.master.master')

@section('content')

    <main>
        <header
            class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10"
        >
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon">
                                    <i data-feather="activity"></i>
                                </div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 p-5">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div
                                        class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4"
                                    >
                                        <h1 class="text-primary">Welcome to Dashboard!</h1>
                                        <p class="text-gray-700 mb-0">

                                        </p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center">
                                    <img
                                        class="img-fluid"
                                        src="{{ asset('assets/img/illustrations/at-work.svg') }}"
                                        style="max-width: 26rem"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Recent Activity
                            <div class="dropdown no-caret">
                                <button
                                    class="btn btn-transparent-dark btn-icon dropdown-toggle"
                                    id="dropdownMenuButton"
                                    type="button"
                                    data-bs-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                >
                                    <i
                                        class="text-gray-500"
                                        data-feather="more-vertical"
                                    ></i>
                                </button>
                                <div
                                    class="dropdown-menu dropdown-menu-end animated--fade-in-up"
                                    aria-labelledby="dropdownMenuButton"
                                >
                                    <h6 class="dropdown-header">Filter Activity:</h6>
                                    <a class="dropdown-item" href="#!"
                                    ><span class="badge bg-green-soft text-green my-1"
                                        >Commerce</span
                                        ></a
                                    >
                                    <a class="dropdown-item" href="#!"
                                    ><span class="badge bg-blue-soft text-blue my-1"
                                        >Reporting</span
                                        ></a
                                    >
                                    <a class="dropdown-item" href="#!"
                                    ><span class="badge bg-yellow-soft text-yellow my-1"
                                        >Server</span
                                        ></a
                                    >
                                    <a class="dropdown-item" href="#!"
                                    ><span class="badge bg-purple-soft text-purple my-1"
                                        >Users</span
                                        ></a
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline timeline-xs">
                                <!-- Timeline Item 1-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">27 min</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-green"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        New order placed!
                                        <a class="fw-bold text-dark" href="#!">Order #2912</a>
                                        has been successfully placed.
                                    </div>
                                </div>
                                <!-- Timeline Item 2-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">58 min</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-blue"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        Your
                                        <a class="fw-bold text-dark" href="#!"
                                        >weekly report</a
                                        >
                                        has been generated and is ready to view.
                                    </div>
                                </div>
                                <!-- Timeline Item 3-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">2 hrs</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-purple"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        New user
                                        <a class="fw-bold text-dark" href="#!"
                                        >Valerie Luna</a
                                        >
                                        has registered
                                    </div>
                                </div>
                                <!-- Timeline Item 4-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">1 day</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-yellow"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        Server activity monitor alert
                                    </div>
                                </div>
                                <!-- Timeline Item 5-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">1 day</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-green"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        New order placed!
                                        <a class="fw-bold text-dark" href="#!">Order #2911</a>
                                        has been successfully placed.
                                    </div>
                                </div>
                                <!-- Timeline Item 6-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">1 day</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-purple"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        Details for
                                        <a class="fw-bold text-dark" href="#!"
                                        >Marketing and Planning Meeting</a
                                        >
                                        have been updated.
                                    </div>
                                </div>
                                <!-- Timeline Item 7-->
                                <div class="timeline-item">
                                    <div class="timeline-item-marker">
                                        <div class="timeline-item-marker-text">2 days</div>
                                        <div
                                            class="timeline-item-marker-indicator bg-green"
                                        ></div>
                                    </div>
                                    <div class="timeline-item-content">
                                        New order placed!
                                        <a class="fw-bold text-dark" href="#!">Order #2910</a>
                                        has been successfully placed.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            {{-- --------------------------------------------------- Cards --------------------------------------------------- --}}

            <div class="card mb-4">
                <div class="card-header">Products, Inventory and User Management</div>
                <div class="card-body">
                    <div class="row">

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Categories
                                            </div>
                                            <div class="text-lg fw-bold">{{ $categories_count }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex align-items-center justify-content-between small"
                                >
                                    <a class="text-white stretched-link" href="{{ route('manager.category.index') }}"
                                    >View Categories</a
                                    >
                                    <div class="text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Products
                                            </div>
                                            <div class="text-lg fw-bold">{{ $products_count }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex align-items-center justify-content-between small"
                                >
                                    <a class="text-white stretched-link" href="{{ route('manager.products.index') }}"
                                    >View Products</a
                                    >
                                    <div class="text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}


                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Inventories
                                            </div>
                                            <div class="text-lg fw-bold">{{ $inventory_count }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex align-items-center justify-content-between small"
                                >
                                    <a class="text-white stretched-link" href="{{ route('manager.inventory.index') }}"
                                    >View Inventories</a
                                    >
                                    <div class="text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}


                    </div>
                </div>
            </div>


            <div class="card mb-4">
                <div class="card-header">Sales Management</div>
                <div class="card-body">
                    <div class="row">

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Orders
                                            </div>
                                            <div class="text-lg fw-bold">{{ $order_count }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="card-footer d-flex align-items-center justify-content-between small"
                                >
                                    <a class="text-white stretched-link" href="{{ route('manager.view_order.index') }}"
                                    >View Orders</a
                                    >
                                    <div class="text-white">
                                        <i class="fas fa-angle-right"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Pending Orders Count
                                            </div>
                                            <div class="text-lg fw-bold">{{ $pending_order_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Accepted Orders Count
                                            </div>
                                            <div class="text-lg fw-bold">{{ $accepted_order_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Rejected Orders Count
                                            </div>
                                            <div class="text-lg fw-bold">{{ $rejected_order_count }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}

                        {{-- ----------- Components Block ----------- --}}

                        <div class="col-lg-6 col-xl-3 mb-4">
                            <div class="card bg-primary text-white h-100">
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <div class="me-3">
                                            <div class="text-white-75 small">
                                                Total Sold
                                            </div>
                                            <div class="text-lg fw-bold">{{ $total_sold }}/-</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- ----------- Components Block ----------- --}}


                    </div>
                </div>
            </div>

            {{-- --------------------------------------------------- Cards --------------------------------------------------- --}}


        </div>
    </main>

@endsection
