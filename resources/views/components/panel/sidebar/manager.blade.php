<!-- Sidenav Heading (UI Toolkit)-->
<div class="sidenav-menu-heading">Product & Categories</div>

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
        <a class="nav-link" href="{{ route('manager.products.index') }}">View Products</a>
    </nav>
</div>


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
        <a class="nav-link" href="{{ route('manager.category.index') }}">View Categories</a>
    </nav>
</div>

<div class="sidenav-menu-heading">Product & Categories</div>


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
        <a class="nav-link" href="{{ route('manager.inventory.index') }}">Update Inventory</a>
    </nav>
</div>

{{-- ---------------------------------------------------- Staff Management ---------------------------------------------------- --}}

<div class="sidenav-menu-heading">Staff Management</div>

<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseAssignStaffToWarehouse"
    aria-expanded="false"
    aria-controls="collapseAssignStaffToWarehouse"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Assign staff to warehouse
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseAssignStaffToWarehouse"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('assign_staff.index') }}">Assign</a>
    </nav>
</div>


{{-- ---------------------------------------------------- Managers Sells Management ---------------------------------------------------- --}}

<div class="sidenav-menu-heading">Sales Management</div>


<a
    class="nav-link collapsed"
    href="javascript:void(0);"
    data-bs-toggle="collapse"
    data-bs-target="#collapseCreateOrder"
    aria-expanded="false"
    aria-controls="collapseCreateOrder"
>
    <div class="nav-link-icon"><i data-feather="tool"></i></div>
    Sales
    <div class="sidenav-collapse-arrow">
        <i class="fas fa-angle-down"></i>
    </div>
</a>
<div
    class="collapse"
    id="collapseCreateOrder"
    data-bs-parent="#accordionSidenav"
>
    <nav class="sidenav-menu-nested nav">
        <a class="nav-link" href="{{ route('manager.view_order.index') }}">Order List</a>
    </nav>
</div>

{{-- ---------------------------------------------------- Account Settings ---------------------------------------------------- --}}

<div class="sidenav-menu-heading">Profile</div>
<!-- Sidenav Link (Charts)-->
<a class="nav-link" href="{{ route('view_profile') }}">
    <div class="nav-link-icon">
        <i data-feather="bar-chart"></i>
    </div>
    Account Settings
</a>
