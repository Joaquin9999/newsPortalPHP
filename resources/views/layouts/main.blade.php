<!-- resources/views/layouts/main.blade.php -->
<!doctype html>
<html lang="en">
@include('partials.head') <!-- Referencia al archivo head.blade.php -->

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    @include('partials.navbar')

    <main>
        @yield('content')<!-- Aquí se insertará el contenido específico de la página -->
    </main>

    <footer>
        @include('partials.footer')
    </footer>

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    <script src="{{ asset('backend/assets plantilla news/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('backend/assets plantilla news/js/tiny-slider.js')}}"></script>

    <script src="{{ asset('backend/assets plantilla news/js/flatpickr.min.js')}}"></script>



    <script src="{{ asset('backend/assets plantilla news/js/aos.js')}}"></script>
    <script src="{{ asset('backend/assets plantilla news/js/glightbox.min.js')}}"></script>
    <script src="{{ asset('backend/assets plantilla news/js/navbar.js')}}"></script>
    <script src="{{ asset('backend/assets plantilla news/js/counter.js')}}"></script>
    <script src="{{ asset('backend/assets plantilla news/js/custom.js')}}"></script>
    <script src="{{ asset('js/comments.js') }}"></script>

</body>

</html>