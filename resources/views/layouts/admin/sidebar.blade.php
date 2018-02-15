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

            {{-- Management User --}}
            <li class="{{ active('admin.user.*') }}">
                <a href="{{ route('admin.user.index') }}">
                    <i class="fa fa-user-circle-o"></i> <span>Management User</span>
                </a>
            </li>
        </ul>

    </section>
</aside>