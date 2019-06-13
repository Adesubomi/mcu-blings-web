<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}"/>
    @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container p-2">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ auth()->user()->fullname }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        {{--<a class="dropdown-item" href="#">Action</a>--}}
                        <a class="dropdown-item" href="#">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="mcApp">
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <div class="stack-menu">
                    <div class="module-menu-items">
                        <a href="{{ route('students.index') }}" class="module-menu">
                            <div class="module-menu-icon">
                                <i class="ion ion-ios-people"></i>
                            </div>
                            <div class="module-menu-name">Students</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col">
                @yield('content')
            </div>
        </div>
    </div>
</div>

<div class="container">

</div>

<script src="{{ asset('dist/js/main.js') }}"></script>
@yield('scripts')
</body>
</html>