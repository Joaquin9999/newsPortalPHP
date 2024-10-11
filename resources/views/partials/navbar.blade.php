<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="{{ route('home')}}" class="logo m-0 float-start">CiberTrends<span class="text-primary;">.</span></a>
                    </div>
                    <div class="col-8 text-center">
                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li><a href="{{ route('home')}}" class="text-blue hover:text-gray-300">Home</a></li>
                            <li><a href="{{ route('category')}}" class="text-blue hover:text-gray-300">Cibersecurity</a></li>
                            <li><a href="{{ route('category')}}" class="text-blue hover:text-gray-300">Web</a></li>
                            <li><a href="{{ route('category')}}" class="text-blue hover:text-gray-300">Software</a></li>
                            <li><a href="{{ route('category')}}" class="text-blue hover:text-gray-300">I.A</a></li>
                        </ul>
                    </div>
                    <div class="col-2 d-flex align-items-center justify-content-end">
                        <form action="#" class="search-form me-3" style="flex: 1; max-width: 250px; margin-left: -100px;">
                            <input type="text" class="form-control" placeholder="Search..." style="width: 100%; font-size: 14px;">
                            <span class="bi-search"></span>
                        </form>
                        <div class="d-inline-block">
                            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                                @if(Auth::check())
                                    <li>
                                        <a href="#" 
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                                           class="text-blue hover:text-gray-300">Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}" class="text-blue hover:text-gray-300">Login</a></li>
                                @endif
                                <li class="mx-2 text-white">|</li>
                                <li><a href="{{ route('register') }}" class="text-blue hover:text-gray-300">Register</a></li>
                            </ul>
                        </div>
                        <a href="#" class="burger ms-auto site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
