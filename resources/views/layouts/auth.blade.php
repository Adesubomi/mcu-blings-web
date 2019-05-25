<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('dist/') }}" />
</head>
<body>
<div class="container vh-100">
    <div class="row h-100">
        <div class="col-6">
            <div id="simpleLogo"></div>
        </div>
        <div class="col-6">
            @yield('content')
        </div>
    </div>
</div>
</body>
</html>