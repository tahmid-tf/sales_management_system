<!-- Sidenav Heading (UI Toolkit)-->
<div class="sidenav-menu-heading">Category & Products</div>

{{-- ---------------------------------------------------- Categories ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseCategories"
    aria-expanded="false"
    aria-controls="collapseCategories"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Categories
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseCategories"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('categories.index') }}">Add & view Categories</a>
    </nav>
</div>


{{-- ---------------------------------------------------- Products ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseUtilities"
    aria-expanded="false"
    aria-controls="collapseUtilities"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Products
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseUtilities"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('products.index') }}">Add & View Products</a>
    </nav>
</div>

{{-- ---------------------------------------------------- Account Settings ---------------------------------------------------- --}}

<!-- Sidenav Heading (UI Toolkit)-->
<div class="sidenav-menu-heading">Inventory Management</div>

{{-- ---------------------------------------------------- Supplier ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseSupplier"
    aria-expanded="false"
    aria-controls="collapseSupplier"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Suppliers
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseSupplier"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('suppliers.index') }}">Add & view Suppliers</a>
    </nav>
</div>

{{-- ---------------------------------------------------- Warehouse ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseWarehouse"
    aria-expanded="false"
    aria-controls="collapseWarehouse"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Warehouse
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseWarehouse"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('warehouses.index') }}">Add & view Warehouses</a>
    </nav>
</div>


{{-- ---------------------------------------------------- Inventory ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseInventory"
    aria-expanded="false"
    aria-controls="collapseInventory"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Inventory
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseInventory"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('inventories.index') }}">Add & view Inventory</a>
    </nav>
</div>


{{-- ---------------------------------------------------- Staff Management ---------------------------------------------------- --}}

<!-- Sidenav Heading (UI Toolkit)-->
<div class="sidenav-menu-heading">Staff Management</div>

{{-- ---------------------------------------------------- View and verify staffs ---------------------------------------------------- --}}

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseViewAndVerifyStaffs"
    aria-expanded="false"
    aria-controls="collapseViewAndVerifyStaffs"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Staffs
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseViewAndVerifyStaffs"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="">Staff Permission Setup</a>
    </nav>
</div>


<div class="sidenav-menu-heading">Profile</div>
<!-- Sidenav Link (Charts)-->
<a class="nav-link" href="{{ route('view_profile') }}">
    <div class="nav-link-icon">
        <i data-feather="bar-chart"></i>
    </div>
    Account Settings
</a>
