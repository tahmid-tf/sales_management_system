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


                            @php
                                $warehouseAssignment = \App\Models\Sales\Warehouse_assign_to_staff::where('staff_id', auth()->id())->first();
                            @endphp

                            @if($warehouseAssignment && $warehouseAssignment->status == 'active')
                                <!-- Content for active warehouse assignment -->
                            @else
                                <div class="alert alert-warning">
                                    Warehouse not yet assigned or request manager for assigning
                                </div>
                            @endif


                        @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if(session('warning'))
                                <div class="alert alert-warning">{{ session('warning') }}</div>
                            @endif

                            <form action="{{ route('staff.store_order') }}" method="POST">
                                {{ csrf_field() }}
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
                                            type="text"
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
                                            type="text"
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


                                </div>


                                <div class="row">
                                    <!-- Form fields go here (name, email, phone, etc.) -->
                                    <!-- Search Input -->
                                    <div class="col-md-6">
                                        <label class="small mb-1">Search Items</label>
                                        <input
                                            class="form-control"
                                            type="text"
                                            placeholder="Items"
                                            v-model="searchQuery"
                                            @input="filterItems"
                                        />
                                        <ul v-if="filteredItems.length" class="list-group mt-2">
                                            <li
                                                class="list-group-item"
                                                v-for="item in filteredItems"
                                                :key="item.product_id"
                                                @click="addItemToTable(item)"
                                                style="cursor: pointer"
                                            >
                                                @{{ item.name }}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Items Table -->
                                    <div class="col-md-12 mt-3">
                                        <table class="table table-bordered text-center">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Item Name</th>
                                                <th>Item Quantity</th>
                                                <th>Item Cost</th>
                                                <th>Remove Item</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-for="(item, index) in selectedItems" :key="item.inventory_id">
                                                <td>@{{ index + 1 }}</td>
                                                <td>@{{ item.name }}</td>
                                                <td>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        v-model.number="item.quantity"
                                                        :max="item.maxQuantity"
                                                        @input="updateTotalPrice"
                                                        min="1"
                                                    />
                                                </td>
                                                <td>@{{ (item.price * item.quantity).toFixed(2) }}</td>
                                                <td>
                                                    <button class="btn btn-datatable btn-icon btn-transparent-dark"
                                                            @click="removeItem(index)">
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
                                            <tfoot>
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total Price:</strong></td>
                                                <td colspan="2">@{{ totalPrice }}/-</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                                <!-- Hidden Inputs for Form Submission -->
                                <input type="hidden" name="items" :value="itemsForSubmission"/>
                                <input type="hidden" name="items_ids" :value="itemIdsForSubmission"/>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>

        const {createApp} = Vue;

        createApp({
            data() {
                return {
                    inventory: [], // Holds the API response
                    searchQuery: '', // Search input value
                    filteredItems: [], // Filtered items based on search
                    selectedItems: [], // Items added to the table
                    totalPrice: 0, // Total price of selected items
                };
            },
            computed: {
                // JSON string for selected items, including dynamic cost
                itemsForSubmission() {
                    return JSON.stringify(
                        this.selectedItems.map(item => ({
                            ...item,
                            cost: (item.price * item.quantity).toFixed(2), // Add dynamic cost
                        }))
                    );
                },
                // JSON string for selected item IDs
                itemIdsForSubmission() {
                    return JSON.stringify(this.selectedItems.map(item => item.product_id));
                },
            },
            methods: {
                async inventoryData() {
                    try {
                        const response = await fetch('{{ route('inventory_api') }}');
                        const data = await response.json();
                        this.inventory = data.data;
                    } catch (error) {
                        console.error('Error fetching data:', error);
                    }
                },
                filterItems() {
                    const query = this.searchQuery.toLowerCase();
                    this.filteredItems = this.inventory.filter(item =>
                        item.name.toLowerCase().includes(query)
                    );
                },
                addItemToTable(item) {
                    if (this.selectedItems.some(selected => selected.product_id === item.product_id)) {
                        alert('Item already added!');
                        return;
                    }

                    this.selectedItems.push({
                        ...item,
                        quantity: 1, // Default quantity
                        maxQuantity: item.quantity, // Max quantity based on inventory
                    });

                    this.updateTotalPrice();

                    this.searchQuery = '';
                    this.filteredItems = [];
                },
                removeItem(index) {
                    this.selectedItems.splice(index, 1);
                    this.updateTotalPrice();
                },
                updateTotalPrice() {
                    this.totalPrice = this.selectedItems.reduce((sum, item) => {
                        return sum + item.price * item.quantity;
                    }, 0);
                },
            },
            mounted() {
                this.inventoryData();
            },
        }).mount('#app');

    </script>

@endsection

