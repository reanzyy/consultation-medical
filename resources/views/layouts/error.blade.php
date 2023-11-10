<!DOCTYPE html>

<html lang="en" class="light-style" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title', 'Upss error')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="stylesheet" href="{{ url('/assets/vendor/css/pages/page-misc.css') }}" />

    @include('layouts.partials.head')

</head>

<body class="bg-white">
    <!-- Content -->

    <!-- Error -->
    @yield('content')
    <!-- /Error -->

    @include('layouts.partials.footer-scripts')

</body>

</html>
