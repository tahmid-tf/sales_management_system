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
                                Create Order
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
                        <div class="card-header">Create Order</div>


                        <div id="app" class="card-body">
                            <form action="">
                                <!-- Form Row-->
                                <div class="row">

                                    <!-- Form Group (name)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Name</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Enter Name"
                                            name="name"
                                        />

                                        <br>
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (email)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Email</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="email"
                                            placeholder="Enter Email"
                                            name="email"
                                        />

                                        <br>
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (phone)-->
                                    <div class="col-md-4">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Phone</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="email"
                                            placeholder="Enter Phone No"
                                            name="phone"
                                        />

                                        <br>
                                        @error('phone')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (Address)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Address</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="email"
                                            placeholder="Enter Address Info"
                                            name="address"
                                        />

                                        <br>
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Form Group (Order Date)-->
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Order Date</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="date"
                                            placeholder="Enter order date"
                                            name="order_date"
                                        />

                                        <br>
                                        @error('order_date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Form Group (Manager ID)-->
                                    <div class="col-md-3">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Manager Name</label
                                        >

                                        <select class="form-select" name="manager_id">

                                            @foreach($managers as $manager)

                                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>

                                            @endforeach
                                        </select>

                                        <br>
                                        @error('manager_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputFirstName"
                                        >Search Items</label
                                        >
                                        <input
                                            class="form-control"
                                            id="inputFirstName"
                                            type="text"
                                            placeholder="Items"
                                        />
                                        <br>

                                    </div>


                                    <div class="col-md-12">
                                        <table style="border: 1px solid #0d6efd; width: 100%; text-align: center">
                                            <thead>
                                            <tr>
                                                <td>
                                                    Serial
                                                </td>
                                                <td>
                                                    Item Name
                                                </td>
                                                <td>
                                                    Item Quantity
                                                </td>
                                                <td>
                                                    Item Cost
                                                </td>
                                                <td>
                                                    Remove Item
                                                </td>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Laptop</td>
                                                <td><input type="number" placeholder="quantity"></td>
                                                <td>300</td>
                                                <td>
                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                             stroke-width="2" stroke-linecap="round"
                                                             stroke-linejoin="round" class="feather feather-trash-2">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path
                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const {createApp} = Vue

        createApp({
            data() {
                return {
                    message: 'Hello Vue!'
                }
            },

            methods: {
                inventoryData() {
                    fetch('{{ route('inventory_api') }}')
                        .then(response => {
                            return response.json()
                        }).then(data => {
                        console.log(data)
                    }).catch(error => {
                        console.error('Error fetching data:', error);
                    });
                }
            },

            mounted() {
                this.inventoryData()
            }
        }).mount('#app')
    </script>

@endsection

