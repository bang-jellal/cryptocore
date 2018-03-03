<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
            <div class="topbar-social"></div>
            <span class="topbar-child1">
                Free shipping for standard order over $100
            </span>
            <div class="topbar-child2">
                <span class="topbar-email">
                    @guest
                        fashe@example.com
                    @else
                        {{ Auth::user()->email }}
                    @endguest
                </span>
            </div>
        </div>
        <div class="wrap_header">
            <a href="index.html" class="logo">
                <img src="{{ asset('template/fashe/images/icons/logo.png') }}" alt="IMG-LOGO">
            </a>
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        @include('layouts._menu')
                    </ul>
                </nav>
            </div>
            <div class="header-icons">
                @guest
                    <a href="{{ route('login') }}" class="header-wrapicon1 dis-block">
                        <img src="{{ asset('template/fashe/images/icons/icon-header-01.png') }}"
                             class="header-icon1" alt="ICON">
                    </a>
                @else
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{ Auth::user()->avatar }}" class="header-icon1" alt="ICON"
                             style="border-radius: 50%">
                    </a>
                @endguest

                <span class="linedivide1"></span>
                @include('layouts._header')
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <a href="index.html" class="logo-mobile">
            <img src="{{ asset('template/fashe/images/icons/logo.png') }}" alt="IMG-LOGO">
        </a>
        <div class="btn-show-menu">
            <div class="header-icons-mobile">
                @guest
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{ route('login') }}" class="header-icon1" alt="ICON">
                    </a>
                @else
                    <a href="#" class="header-wrapicon1 dis-block">
                        <img src="{{ Auth::user()->avatar }}" class="header-icon1" alt="ICON"
                             style="border-radius: 50%">
                    </a>
                @endguest

                <span class="linedivide2"></span>
                @include('layouts._header')
            </div>
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                    <span class="topbar-child1">
                        Free shipping for standard order over $100
                    </span>
                </li>
                @include('layouts._menu', ['class_mobile' => 'item-menu-mobile'])
            </ul>
        </nav>
    </div>
</header>