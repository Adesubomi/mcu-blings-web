<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}"/>
</head>
<body>

<noscript>
    <strong>We're sorry but mcu-blings-spa doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
</noscript>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container p-2">
        <a class="navbar-brand" href="#">{{ config('app.name') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                {{--<li class="nav-item active mr-4">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>--}}
                @if (Route::has('register'))
                <li class="nav-item px-3">
                    <a class="btn btn-outline-secondary px-4" href="{{ route('login') }}">Register</a>
                </li>
                @endif
                <li class="nav-item px-3">
                    <a class="btn btn-primary px-4" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container vh-100">
    <div class="row h-100 align-items-center">
        <div class="col-6 text-right">
            <div id="simpleLogo"></div>
        </div>
        <div class="col-6">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>

{{--

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title>mcu-blings-spa</title>
  </head>
  <body>
    <noscript>
      <strong>We're sorry but mcu-blings-spa doesn't work properly without JavaScript enabled. Please enable it to continue.</strong>
    </noscript>
    <div id="app"></div>
    <!-- built files will be auto injected -->
  </body>
</html>

--}}