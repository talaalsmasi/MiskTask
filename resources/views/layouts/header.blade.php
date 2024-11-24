<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="#" class="logo">
                    <img style="height: 300px;width:150px" src="{{ asset('images/logo1.png') }}" alt="IMG-LOGO">
                </a>


                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <li class="active-menu">
                            <a href="{{route('home')}}">Home</a>
                        </li>

                        <li>
                            <a href="{{route('products.index')}}">Shop</a>
                        </li>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">


                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        @if (Auth::check())
                            <!-- إذا كان المستخدم مسجل الدخول -->
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                 <i class="zmdi zmdi-arrow-right-top"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <!-- إذا لم يكن المستخدم مسجل الدخول -->
                            <a href="{{ route('Sellerregister') }}">
                                <i class="zmdi zmdi-account"></i> <!-- أيقونة تسجيل الدخول -->
                            </a>

                        @endif
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="index.html"><img style="height: 300px;width:150px" src="{{ asset('images/logo1.png') }}" alt="IMG-LOGO">
            </a>
        </div>



        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
            <span class="hamburger-box">
                <span class="hamburger-inner"></span>
            </span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">


        <ul class="main-menu-m">


            <li>
                <a href="{{route('products.index')}}">Shop</a>
            </li>

        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
