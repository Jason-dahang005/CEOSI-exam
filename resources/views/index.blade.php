<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

    @yield('content')

    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script src="{{ asset('products.js') }}"></script>
</body>
</html>