{{-- <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="https://assets.infyom.com/logo/blue_logo_150x150.png"
             alt="{{ config('app.name') }} Logo"
             class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @include('layouts.menu')
            </ul>
        </nav>
    </div>

</aside> --}}



<div class="left-sidenav">
    <div class="flex-shrink-0 bg-white">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 text-decoration-none border-bottom">
            <img src="./images/logo.svg" alt="Logo" style="width: 100px;">
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    <svg style="color: #1761fd; fill: rgba(23,97,253,0.12); margin-right: 8px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-self-center menu-icon">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg> Dashboard
                </button>
                <div class="collapse " id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="#"><i class="ti-control-record"></i> Vendors</a></li>
                        <li><a href="#"><i class="ti-control-record"></i> Users</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                    <svg style="color: #1761fd; fill: rgba(23,97,253,0.12); margin-right: 8px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-box align-self-center menu-icon">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>
                    Products
                </button>
                <div class="collapse" id="dashboard-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li  class=" {{ Request::is('categorys*') ? 'active' : '' }}"><a href="{{ route('categorys.index') }}" ><i class="ti-control-record"></i> Category</a></li>
                        <li class=" {{ Request::is('subcategories*') ? 'active' : '' }}"><a href="{{ route('subcategories.index') }}"><i class="ti-control-record"></i> Sub Categories</a></li>
                        <li class=" {{ Request::is('parentcategories*') ? 'active' : '' }}"><a href="{{ route('parentcategories.index') }}"><i class="ti-control-record"></i> Parent Categories</a></li>
                        <li class=" {{ Request::is('childcategories*') ? 'active' : '' }}"><a href="{{ route('childcategories.index') }}"><i class="ti-control-record"></i> Child Categories</a></li>
                        <li class="{{ Request::is('products*') ? 'active' : '' }}"><a href="{{ route('products.index') }}"><i class="ti-control-record"></i> New Products</a></li>
                        <li class=" {{ Request::is('productPartNumbers*') ? 'active' : '' }}"><a href="{{ route('productPartNumbers.index') }}"><i class="ti-control-record"></i> Product Part Number</a></li>
                    </ul>
                </div>
            </li>
            <li class="mb-1">
                <button class="btn btn-toggle" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                    <svg style="color: #1761fd; fill: rgba(23,97,253,0.12); margin-right: 8px;" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home align-self-center menu-icon">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                    </svg> Master
                </button>
                <div class="collapse" id="orders-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="{{ route('specifications.index') }}"><i class="ti-control-record"></i> Specifications</a></li>
                        <li><a href="{{ route('specificationTypes.index') }}"><i class="ti-control-record"></i> Specification Types</a></li>
                        <li><a href="#"><i class="ti-control-record"></i> Shipped</a></li>
                        <li><a href="#"><i class="ti-control-record"></i> Returned</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
