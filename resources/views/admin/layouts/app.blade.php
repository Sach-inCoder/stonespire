<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Admin Panel') - Stone Graphics
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Favicon --}}
    @if(setting_asset('favicon'))

    <link
        rel="icon"
        type="image/png"
        href="{{ setting_asset('favicon') }}">

    @endif
    <link rel="stylesheet" href="{{ asset('assets/css/admin/style.css') }}">
	<script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
</head>

<body>

<div class="admin-wrapper">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">

        <div class="admin-logo">
            <a href="/admin">
                @if(setting_asset('logo'))
                    <img class="img-fluid"
                        src="{{ setting_asset('logo') }}"
                        alt="{{ setting('website_name', 'Stonespire Graphics') }}"
                    >
                @else
                    <img class="img-fluid"
                        src="{{ asset('assets/images/logo-new.png') }}"
                        alt="Stonespire Graphics"
                    >
                @endif
            </a>
        </div>

        <nav class="mt-3">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.settings') }}"
               class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                Settings
            </a>
            <a href="{{ route('admin.home') }}"
               class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                Home
            </a>
            <a href="{{ route('admin.about.edit') }}"
               class="nav-link {{ request()->routeIs('admin.about.edit') ? 'active' : '' }}">
                About
            </a>

            <a href="{{route('admin.sliders.index')}}" class="nav-link {{ request()->is('admin/sliders') ? 'active' : '' }}">
                Sliders
            </a>
            <a href="{{route('admin.services.index')}}" class="nav-link {{ request()->is('admin/services') ? 'active' : '' }}">
                Services
            </a>
            <a href="{{route('admin.products.index')}}" class="nav-link {{ request()->is('admin/products') ? 'active' : '' }}">
                Products
            </a>
            <a href="{{route('admin.blogs.index')}}" class="nav-link {{ request()->is('admin/blogs') ? 'active' : '' }}">
                Blogs
            </a>
            <a href="{{route('admin.galleries.index')}}" class="nav-link {{ request()->is('admin/galleries') ? 'active' : '' }}">
                Gallery
            </a>
            <a href="{{route('admin.testimonials.index')}}" class="nav-link {{ request()->is('admin/testimonials') ? 'active' : '' }}">
                Testimonials
            </a>
            <a href="{{route('admin.clients.index')}}" class="nav-link {{ request()->is('admin/clients') ? 'active' : '' }}">
                Clients
            </a>
            <a href="{{route('admin.statistics.index')}}" class="nav-link {{ request()->is('admin/statistics') ? 'active' : '' }}">
                Statistics
            </a>
            <a href="{{route('admin.quality-facilities.index')}}" class="nav-link {{ request()->is('admin/quality-facilities') ? 'active' : '' }}">
                Quality Facility
            </a>
            <a href="{{route('admin.queries')}}" class="nav-link {{ request()->is('admin/queries') ? 'active' : '' }}">
                Contact Messages
            </a>
        </nav>
    </aside>


    {{-- Main --}}
    <main class="admin-main">

        {{-- Header --}}
        <header class="admin-header">
            <div>
                <button class="btn btn-primary d-lg-none menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <strong>
                    @yield('page-title', 'Dashboard')
                </strong>
            </div>
            <div class="dropdown">
                <button
                    class="btn btn-light dropdown-toggle"
                    type="button"
                    data-bs-toggle="dropdown">
                    {{ auth()->user()->name }}
                </button>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <span class="dropdown-item-text">
                            {{ auth()->user()->email }}
                        </span>
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>

                        <form
                            method="POST"
                            action="{{ route('admin.logout') }}">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item">

                                Logout

                            </button>

                        </form>

                    </li>

                </ul>

            </div>

        </header>


        {{-- Page Content --}}
        <div class="admin-content">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @if(session('error'))

                <div class="alert alert-danger alert-dismissible fade show">

                    {{ session('error') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                    </button>

                </div>

            @endif


            @yield('content')

        </div>

    </main>

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('script')
    <script>
        $('.menuToggle').on('click',function () {
            $('aside').toggleClass('show');
            $('main').toggleClass('show');
        })
    </script>
</body>

</html>