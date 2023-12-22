<aside class="main-sidebar elevation-4" style="background: #fff;">
    <!-- Brand Logo -->
    <a href="{{asset('/admin')}}" class="brand-link">
        <!-- <img src="https://www.thmilk.vn/wp-content/themes/wp-th/assets/images/logo.png?>" alt="logo"> -->
        <span class="brand-text">TH True Milk</span>
    </a>
    <!-- Sidebar -->

    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('/admin') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.categories') }}" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Category</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.product.products') }}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>Products</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{ route('admin.order.orders') }}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-bag"></i>
                        <p>Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.user.users') }}" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.profile.profiles') }}" class="nav-link">
                        <i class="nav-icon  fas fa-users"></i>
                        <p>Profile</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
