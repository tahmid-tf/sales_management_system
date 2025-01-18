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
                                View Invoice
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <div class="container-xl px-4 mt-2">
            <!-- Account page navigation-->
            <div class="row print_page">
                <div class="col-xl-12">
                    <div>
                        <main>
                            <!-- Main page content-->
                            <div class="container-xl px-4 mb-4">
                                <!-- Invoice-->
                                <div class="card invoice">
                                    <div
                                        class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                                                <!-- Invoice branding-->
                                                <img class="invoice-brand-img rounded-circle mb-4"
                                                     src="{{ asset('assets/img/demo/demo-logo.svg') }}" alt=""/>
                                                <div class="h2 text-white mb-0">Invoice</div>
                                                Detailed Information's
                                            </div>
                                            <div class="col-12 col-lg-auto text-center text-lg-end">
                                                <!-- Invoice details-->
                                                <div class="h3 text-white">Invoice</div>
                                                #{{ $order_data->id }}
                                                <br/>
                                                {{ $order_data->order_date }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-4 p-md-5">
                                        <!-- Invoice table-->
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="border-bottom">
                                                <tr class="small text-uppercase text-muted">
                                                    <th scope="col">Description</th>
                                                    <th class="text-end" scope="col">SKU</th>
                                                    <th class="text-end" scope="col">Quantity</th>
                                                    <th class="text-end" scope="col">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>


                                                @php
                                                    $items = json_decode($order_data->items, true); // Decode JSON into an associative array
                                                @endphp


                                                @foreach ($items as $item)
                                                    <tr class="border-bottom">
                                                        <td>
                                                            <div class="fw-bold">{{ $item['name'] }}</div>
                                                            <!-- Display item name -->
                                                        </td>
                                                        <td class="text-end fw-bold">{{ $item['sku'] }}</td>
                                                        <!-- Display item SKU -->
                                                        <td class="text-end fw-bold">{{ $item['quantity'] }}</td>
                                                        <!-- Display item quantity -->
                                                        <td class="text-end fw-bold">{{ $item['quantity'] * $item['price'] }}
                                                            /-
                                                        </td>
                                                        <!-- Display item price -->
                                                    </tr>
                                                @endforeach


                                                <!-- Invoice subtotal-->
                                                <tr>
                                                    <td class="text-end pb-0" colspan="3">
                                                        <div class="text-uppercase small fw-700 text-muted">Subtotal:
                                                        </div>
                                                    </td>
                                                    <td class="text-end pb-0">
                                                        <div class="h5 mb-0 fw-700">{{ $order_data->total_amount ?? 0 }}
                                                            /-
                                                        </div>
                                                    </td>
                                                </tr>

                                                <!-- Invoice total-->
                                                <tr>
                                                    <td class="text-end pb-0" colspan="3">
                                                        <div class="text-uppercase small fw-700 text-muted">Total Amount
                                                        </div>
                                                    </td>
                                                    <td class="text-end pb-0">
                                                        <div
                                                            class="h5 mb-0 fw-700 text-green">{{ $order_data->total_amount ?? 0 }}
                                                            /-
                                                        </div>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-footer p-4 p-lg-5 border-top-0">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                                <!-- Invoice - sent to info-->
                                                <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                                                <div class="h6 mb-1">{{ $order_data->name }}</div>
                                                <div class="small">{{ $order_data->phone }}</div>
                                                <div class="small">{{ $order_data->address }}</div>
                                            </div>
                                            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                                <!-- Invoice - sent from info-->
                                                <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                                                <div
                                                    class="h6 mb-0">{{ \App\Models\User::find($order_data->manager_id)->name ?? '' }}</div>
                                                <div class="small">Manager</div>
                                                <div class="small">Sales Management</div>
                                            </div>
                                            {{--                                            <div class="col-lg-6">--}}
                                            {{--                                                <!-- Invoice - additional notes-->--}}
                                            {{--                                                <div class="small text-muted text-uppercase fw-700 mb-2">Note</div>--}}
                                            {{--                                                <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </main>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="d-flex justify-content-between">
                    <div>
                        <button class="btn btn-success print_button">Print Invoice</button>
                    </div>


                    @if(auth()->user()->user_role == 'admin')

                        <div>
                            <a href="{{ route('admin.order_decision', [$order_data->id, 'accept']) }}"
                               class="btn btn-success">Accept</a>
                            <a href="{{ route('admin.order_decision', [$order_data->id,'reject']) }}"
                               class="btn btn-danger">Reject</a>
                        </div>

                    @elseif(auth()->user()->user_role == 'manager')
                        <div>
                            <a href="{{ route('manager.order_decision', [$order_data->id, 'accept']) }}"
                               class="btn btn-success">Accept</a>
                            <a href="{{ route('manager.order_decision', [$order_data->id,'reject']) }}"
                               class="btn btn-danger">Reject</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            $('.print_button').on('click', function () {
                // Get the HTML content of the print_page div
                var printContents = $('.print_page').html();

                // Create a new window for printing
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;

                window.print();

                // Restore original body content
                document.body.innerHTML = originalContents;
            });
        });
    </script>

@endsection

