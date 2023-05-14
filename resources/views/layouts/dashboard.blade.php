<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Expense Manager') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="row w-100">
            <div class="col-12 col-md-3 col-xl-2">
                <nav class="navbar navbar-expand-md navbar-light shadow-sm align-items-start dashbar">
                    <div class="container text-light flex-column">
                        <div class="profilePic mt-5 mb-3"></div>
                        <a class="nav-link text-light mb-5 text-center" href="{{route('viewEditUsers')}}">
                            {{ Auth::user()->name}} ( {{Auth::user()->role}} ) <br/> Update Password
                        </a>
                        <h3 class="dash"><a href="{{route('home')}}">{{ __('Dashboard') }}</a></h3>
                        <button class="navbar-toggler align-self-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse flex-column" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto my-2 my-md-3 flex-column fs-5">
                                @if( Auth::user()->role === 'Administrator')
                                    <li class="my-2 my-md-3">
                                        User Management <br>
                                        <ul class="my-2">
                                            <li><a href="{{ route('viewRoles') }}">Roles</a></li>
                                            <li><a href="{{ route('viewUsers') }}">Users</a></li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="my-2 my-md-3">
                                    Expense Management <br>
                                    <ul class="my-2">
                                        @if( Auth::user()->role === 'Administrator')
                                            <li><a href="{{ route('viewExpenseCatalog') }}">Expense Category</a></li>
                                        @endif
                                        <li><a href="{{ route('viewExpenses') }}">Expenses</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-10 col-md-9 mx-auto">
                <div class="text-end mb-5 py-3 welcome">
                    <span class="me-3 fs-5">Welcome to {{ config('app.name', 'Expense Manager') }}</span>
                    <a class="btn btn-outline-danger p-1" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                
                    <main class="py-4 w-100">
                        @yield('content')
                    </main>

            </div>
        </div>
    </div>
    @yield('scripts')
    @vite(['resources/js/roles.js'])
</body>
</html>
