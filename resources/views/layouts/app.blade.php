<!DOCTYPE html>
<html>
<head>
    <title>Quin Info Solutions</title>

    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">

    <link href="{{ asset('assets/css/style.css') }}"
    rel="stylesheet">
</head>

<body>

@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>