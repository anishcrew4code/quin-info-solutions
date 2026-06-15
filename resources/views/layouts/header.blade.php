<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quin Info Solutions – Innovative IT Solutions</title>
    <meta name="description" content="Quin Info Solutions delivers scalable, secure and high-performance digital solutions that empower businesses to succeed in the digital world.">
    <meta name="keywords"    content="IT solutions, web development, mobile app development, cloud solutions, software solutions, Bangalore">
    <meta name="author"      content="Quin Info Solutions">

    {{-- Favicon --}}
    <link rel="icon"             type="image/png" sizes="512x512" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="icon"             type="image/png" sizes="192x192" href="{{ asset('assets/images/favicon.png') }}">
    <link rel="shortcut icon"    type="image/x-icon"              href="{{ asset('assets/images/favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180"                  href="{{ asset('assets/images/favicon.png') }}">
    <meta name="theme-color" content="#032f67">
    <meta name="msapplication-TileColor" content="#032f67">

    {{-- Preconnect for speed --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Custom CSS (component styles) --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Responsive CSS (media queries) --}}
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    {{-- Page-level style stacks --}}
    @stack('styles')

</head>
<body>

{{-- Scroll-to-top button --}}
<button id="scrollTop" aria-label="Scroll to top">
    <i class="fas fa-arrow-up"></i>
</button>

{{-- ─── NAVBAR ─── --}}
<nav class="site-navbar navbar navbar-expand-lg" id="siteNavbar">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('assets/images/logo.png') }}" alt="Quin Info Solutions" width="auto" height="55">
        </a>

        <button class="navbar-toggler border-0"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#mainMenu"
                aria-controls="mainMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home')         ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about')        ? 'active' : '' }}" href="{{ route('about') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('services')     ? 'active' : '' }}" href="{{ route('services') }}">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('technologies') ? 'active' : '' }}" href="{{ route('technologies') }}">Technologies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('portfolio')    ? 'active' : '' }}" href="{{ route('portfolio') }}">Portfolio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact')      ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a>
                </li>
            </ul>

            <a href="{{ route('contact') }}" class="btn-get-in-touch ms-lg-4 mt-2 mt-lg-0">
                Get In Touch
            </a>
        </div>

    </div>
</nav>