<aside class="main-sidebar">
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel"></div>

        <ul class="sidebar-menu" data-widget="tree">
           {{-- header --}}
            <li class="header">MAIN NAVIGATION</li>

            {{-- Dashboard --}}
            <li class="{{ active('admin.dashboard.index') }}">
                <a href="{{ route('admin.dashboard.index') }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            {{-- Management Brand --}}
            <li class="{{ active('admin.brand.*') }}">
                <a href="{{ route('admin.brand.index') }}">
                    <i class="fa fa-tags"></i> <span>Management Brand</span>
                </a>
            </li>

            {{-- Management Category --}}
            <li class="{{ active(['admin.category.*', 'admin.sub_category.*']) }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-list-ul"></i> <span>Management Category</span>
                </a>
            </li>

            {{-- Management Product --}}
            <li class="{{ active('admin.product.*') }}">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-shopping-bag"></i> <span>Management Product</span>
                </a>
            </li>

            {{-- Management User --}}
            <li class="{{ active('admin.user.*') }}">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user-circle-o"></i> <span>Management User</span>
                </a>
            </li>
        </ul>

    </section>
</aside>