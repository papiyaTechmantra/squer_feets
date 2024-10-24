<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SweetLime</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            {{-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="button.html" class="dropdown-item">Buttons</a>
                    <a href="typography.html" class="dropdown-item">Typography</a>
                    <a href="element.html" class="dropdown-item">Other Elements</a>
                </div>
            </div> --}}
            
            <a href="{{ route('admin.banner') }}" class="nav-item nav-link {{ request()->is('admin/banner*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Banner Management</a>
            <a href="{{ route('admin.property') }}" class="nav-item nav-link {{ request()->is('admin/property*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Property Management</a>
            <a href="{{ route('admin.locality') }}" class="nav-item nav-link {{ request()->is('admin/locality*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Locality Management</a>
            <a href="{{ route('admin.amenity') }}" class="nav-item nav-link {{ request()->is('admin/amenity*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Amenity Management</a>
            <a href="{{ route('admin.parking') }}" class="nav-item nav-link {{ request()->is('admin/parking*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Parking Management</a>
            <a href="{{ route('admin.blog') }}" class="nav-item nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Blog Management</a>
            <a href="{{ route('admin.lead') }}" class="nav-item nav-link {{ request()->is('admin/lead*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Lead Management</a>
            <a href="{{ route('admin.news') }}" class="nav-item nav-link {{ request()->is('admin/news*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>News Management</a>
            <a href="{{ route('admin.review') }}" class="nav-item nav-link {{ request()->is('admin/review*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Review Management</a>
            <a href="{{ route('admin.subscribers') }}" class="nav-item nav-link {{ request()->is('admin/subscribers*') ? 'active' : '' }}"><i class="fa fa-th me-2"></i>Subscribers Management</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->

