<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
    <script src="https://js.braintreegateway.com/web/dropin/1.42.0/js/dropin.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.87.0/js/client.min.js"></script>
    <script src="https://js.braintreegateway.com/web/3.87.0/js/data-collector.min.js"></script>

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/1ac9a063d3.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">

        {{-- <x-window-size::save-to-session /> --}}

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                     <div class="logo_laravel">
                        <img src="{{asset('img/logo_programmo_casa_grande.png')}}" width="130" alt="">
                       {{-- <svg viewBox="0 0 651 192" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 150px">
                            <g clip-path="url(#clip0)" fill="#EF3B2D">
                                <path d="M248.032 44.676h-16.466v100.23h47.394v-14.748h-30.928V44.676zM337.091 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.431 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162-.001 2.863-.479 5.584-1.432 8.161zM463.954 87.202c-2.101-3.341-5.083-5.965-8.949-7.875-3.865-1.909-7.756-2.864-11.669-2.864-5.062 0-9.69.931-13.89 2.792-4.201 1.861-7.804 4.417-10.811 7.661-3.007 3.246-5.347 6.993-7.016 11.239-1.672 4.249-2.506 8.713-2.506 13.389 0 4.774.834 9.26 2.506 13.459 1.669 4.202 4.009 7.925 7.016 11.169 3.007 3.246 6.609 5.799 10.811 7.66 4.199 1.861 8.828 2.792 13.89 2.792 3.913 0 7.804-.955 11.669-2.863 3.866-1.908 6.849-4.533 8.949-7.875v9.021h15.607V78.182h-15.607v9.02zm-1.432 32.503c-.955 2.578-2.291 4.821-4.009 6.73-1.719 1.91-3.795 3.437-6.229 4.582-2.435 1.146-5.133 1.718-8.091 1.718-2.96 0-5.633-.572-8.019-1.718-2.387-1.146-4.438-2.672-6.156-4.582-1.719-1.909-3.032-4.152-3.938-6.73-.909-2.577-1.36-5.298-1.36-8.161 0-2.864.451-5.585 1.36-8.162.905-2.577 2.219-4.819 3.938-6.729 1.718-1.908 3.77-3.437 6.156-4.582 2.386-1.146 5.059-1.718 8.019-1.718 2.958 0 5.656.572 8.091 1.718 2.434 1.146 4.51 2.674 6.229 4.582 1.718 1.91 3.054 4.152 4.009 6.729.953 2.577 1.432 5.298 1.432 8.162 0 2.863-.479 5.584-1.432 8.161zM650.772 44.676h-15.606v100.23h15.606V44.676zM365.013 144.906h15.607V93.538h26.776V78.182h-42.383v66.724zM542.133 78.182l-19.616 51.096-19.616-51.096h-15.808l25.617 66.724h19.614l25.617-66.724h-15.808zM591.98 76.466c-19.112 0-34.239 15.706-34.239 35.079 0 21.416 14.641 35.079 36.239 35.079 12.088 0 19.806-4.622 29.234-14.688l-10.544-8.158c-.006.008-7.958 10.449-19.832 10.449-13.802 0-19.612-11.127-19.612-16.884h51.777c2.72-22.043-11.772-40.877-33.023-40.877zm-18.713 29.28c.12-1.284 1.917-16.884 18.589-16.884 16.671 0 18.697 15.598 18.813 16.884h-37.402zM184.068 43.892c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002-35.648-20.524a2.971 2.971 0 00-2.964 0l-35.647 20.522-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v38.979l-29.706 17.103V24.493a3 3 0 00-.103-.776c-.024-.088-.073-.165-.104-.25-.058-.157-.108-.316-.191-.46-.056-.097-.137-.176-.203-.265-.087-.117-.161-.242-.265-.345-.085-.086-.194-.148-.29-.223-.109-.085-.206-.182-.327-.252l-.002-.001-.002-.002L40.098 1.396a2.971 2.971 0 00-2.964 0L1.487 21.919l-.002.002-.002.001c-.121.07-.219.167-.327.252-.096.075-.205.138-.29.223-.103.103-.178.228-.265.345-.066.089-.147.169-.203.265-.083.144-.133.304-.191.46-.031.085-.08.162-.104.25-.067.249-.103.51-.103.776v122.09c0 1.063.568 2.044 1.489 2.575l71.293 41.045c.156.089.324.143.49.202.078.028.15.074.23.095a2.98 2.98 0 001.524 0c.069-.018.132-.059.2-.083.176-.061.354-.119.519-.214l71.293-41.045a2.971 2.971 0 001.489-2.575v-38.979l34.158-19.666a2.971 2.971 0 001.489-2.575V44.666a3.075 3.075 0 00-.106-.774zM74.255 143.167l-29.648-16.779 31.136-17.926.001-.001 34.164-19.669 29.674 17.084-21.772 12.428-43.555 24.863zm68.329-76.259v33.841l-12.475-7.182-17.231-9.92V49.806l12.475 7.182 17.231 9.92zm2.97-39.335l29.693 17.095-29.693 17.095-29.693-17.095 29.693-17.095zM54.06 114.089l-12.475 7.182V46.733l17.231-9.92 12.475-7.182v74.537l-17.231 9.921zM38.614 7.398l29.693 17.095-29.693 17.095L8.921 24.493 38.614 7.398zM5.938 29.632l12.475 7.182 17.231 9.92v79.676l.001.005-.001.006c0 .114.032.221.045.333.017.146.021.294.059.434l.002.007c.032.117.094.222.14.334.051.124.088.255.156.371a.036.036 0 00.004.009c.061.105.149.191.222.288.081.105.149.22.244.314l.008.01c.084.083.19.142.284.215.106.083.202.178.32.247l.013.005.011.008 34.139 19.321v34.175L5.939 144.867V29.632h-.001zm136.646 115.235l-65.352 37.625V148.31l48.399-27.628 16.953-9.677v33.862zm35.646-61.22l-29.706 17.102V66.908l17.231-9.92 12.475-7.182v33.841z" />
                            </g>
                        </svg> --}}
                    </div>
                    {{-- config('app.name', 'Laravel') --}}
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/apartments') }}">{{ __('Appartamenti') }}</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/services') }}">{{ __('Servizi') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/users') }}">{{ __('Utenti') }}</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/sponsorships') }}">{{ __('Sponsorizzazioni') }}</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/dashboard') }}">{{ __('I Miei Appartamenti') }}</a>
                        </li> -->
                        @if (Auth::check())
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{url('/admin/messages') }}">{{ __('I Miei Messaggi') }}</a>
                        </li> -->
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('admin/dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('/admin/messages') }}">{{__('Messaggi')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profilo')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Esci') }}
                                    
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @yield('content')
        </main>

                <!-- Footer -->
        <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5">
            <section class="bg-body-tertiary text-center slide-image-apartment">
                <!-- Grid container -->
                <div class="container p-4">
                    <!-- Section: Images -->
                    <div class="">
                        <div class="row">
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/113.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/111.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/112.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/114.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/115.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                            <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div data-mdb-ripple-init
                                class="bg-image hover-overlay shadow-1-strong rounded"
                                data-ripple-color="light"
                            >
                                <img src="https://mdbcdn.b-cdn.net/img/new/fluid/city/116.webp" class="w-100" />
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                <!-- Section: Images -->
                </div>
            <!-- Grid container -->
            </section>
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                <span>Connettetevi con noi sui social network:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                    <div class="row mt-3 align-items-center">
                        <!-- Grid column -->
                        <div class="col-8 col-lg-4 col-xl-3 mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                <i class="fas fa-gem me-3"></i>CLASSE 121 GRUPPO 7
                            </h6>
                            <p>
                                Sito replica di Airbnb con il quale puoi affittare o mettere in affitto un appartamento.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-4 col-lg-2 col-xl-2 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                SKILL
                            </h6>
                            <p>
                                <a href="#!" class="text-reset">Laravel</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Vue.js</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">Bootstrap</a>
                            </p>
                            <p>
                                <a href="#!" class="text-reset">MySql</a>
                            </p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 flex-grow-1">
                            <div class="row">
                                <div class="col-8 col-sm-8 col-md-6 col-lg-6 mx-auto pb-5">
                                    <div class="my-card">
                                        <div class="my-card-img text-center p-2">
                                            <img src="{{ url('/img/authors/rocco.jpeg') }}" alt="" class="rounded-circle my-img-authors">
                                        </div>
                                        <div class="my-card-body">
                                            <div class="my-card-text">
                                                <div class="row my-contact contact-git align-items-center justify-content-center mb-2">
                                                    <div class="col-auto">
                                                        <img src="{{ url('/img/git2.jpg') }}" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="https://github.com/RoccoCerro">GitHub Repositories</a>
                                                    </div>
                                                </div>
                                                <div class="row my-contact contact-linkedin align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <img src="{{ url('/img/linkedin.webp') }}" alt="">
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="https://www.linkedin.com/in/rocco-cerro-crrrcc96">Rocco Cerro</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8 col-sm-8 col-md-6 col-lg-6 mx-auto pb-5">
                                    <div class="my-card">
                                        <div class="my-card-img text-center p-2">
                                            <img src="{{ url('/img/authors/Ale.png') }}" alt="" class="rounded-circle my-img-authors">
                                        </div>
                                        <div class="my-card-body">
                                            <div class="my-card-text">
                                            <div class="row my-contact contact-git align-items-center justify-content-center mb-2">
                                                    <div class="col-auto">
                                                        <img src="{{ url('/img/git2.jpg') }}" alt="">
                                                    </div>
                                                    <div class="col-7">
                                                        <a href="https://github.com/casalaspro">GitHub Repositories</a>
                                                    </div>
                                                </div>
                                                <div class="row my-contact contact-linkedin align-items-center justify-content-center">
                                                    <div class="col-auto">
                                                        <img src="{{ url('/img/linkedin.webp') }}" alt="">
                                                    </div>
                                                    <div class="col-7">
                                                        <a href="https://www.linkedin.com/in/alessandro-casalaspro-45911a315/">Alessandro Casalaspro</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Grid column -->
                        </div>
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2021 Copyright:
                <a class="text-reset fw-bold" href="https://mdbootstrap.com/">ProgrammoCasa.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
</body>

</html>
