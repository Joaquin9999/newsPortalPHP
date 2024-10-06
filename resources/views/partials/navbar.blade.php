<!-- resources/views/partials/navbar.blade.php -->

<nav class="site-nav">
    <div class="container">
        <div class="menu-bg-wrap">
            <div class="site-navigation">
                <div class="row g-0 align-items-center">
                    <div class="col-2">
                        <a href="{{ route('home')}}" class="logo m-0 float-start">CiberTrends<span
                                class="text-primary;">.</span></a>
                    </div>
                    <div class="col-8 text-center">
                        <form action="#" class="search-form d-inline-block d-lg-none" style="width: 50%;margin-left: 100px;">
                            <input type="text" class="form-control" placeholder="Search..."
                                style="width: 100%; font-size: 14px;">
                            <span class="bi-search"></span>
                        </form>

                        <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
                            <li><a href="{{ route('home')}}">Home</a></li>
                            <li class="has-children active">
                                <a href="{{ route('category')}}">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('search-result')}}">Search Result</a></li>
                                    <li><a href="{{ route('blog')}}">Blog</a></li>
                                    <li><a href="{{ route('single')}}">Blog Single</a></li>
                                    <li><a href="{{ route('category')}}">Category</a></li>
                                    <li class="active"><a href="{{ route('about')}}">About</a></li>
                                    <li><a href="{{ route('contact')}}">Contact Us</a></li>
                                    <li><a href="#">Menu One</a></li>
                                    <li><a href="#">Menu Two</a></li>
                                    <li class="has-children">
                                        <a href="#">Dropdown</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Sub Menu One</a></li>
                                            <li><a href="#">Sub Menu Two</a></li>
                                            <li><a href="#">Sub Menu Three</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route('category')}}">Culture</a></li>
                            <li><a href="{{ route('category')}}">Business</a></li>
                            <li><a href="{{ route('category')}}">Politics</a></li>
                            <li><a href="{{ route('login')}}">Login</a></li>
                        </ul>
                    </div>
                    <div class="col-2 text-end">
                        <a href="#"
                            class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                            <span></span>
                        </a>
                        <form action="#" class="search-form d-none d-lg-inline-block">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="bi-search"></span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>