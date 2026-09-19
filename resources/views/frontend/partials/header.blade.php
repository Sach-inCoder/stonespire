<header class="main-header">

    {{-- Top Header --}}
    <div class="main-menu__top">

        <div class="main-menu__top-inner">

            <ul class="list-unstyled main-menu__contact-list">

                {{-- Phone --}}
                <li>

                    <div class="icon">
                        <i class="icon-phone-call"></i>
                    </div>

                    <div class="text">
                        <p>
                            <a href="tel:{{ setting('phone') }}">
                                {{ setting('phone') }}
                            </a>
                        </p>
                    </div>

                </li>


                {{-- Emails --}}
                <li>

                    <div class="icon">
                        <i class="icon-email"></i>
                    </div>

                    <div class="text">

                        @if(setting('email'))
                            <p>
                                <a href="mailto:{{ setting('email') }}">
                                    {{ setting('email') }}
                                </a>
                            </p>
                        @endif

                    </div>
                    <div class="ms-0 text">
                        @if(setting('alternate_email'))
                            <p>
                                <a href="mailto:{{ setting('alternate_email') }}">
                                    ,  {{ setting('alternate_email') }}
                                </a>
                            </p>
                        @endif
                    </div>

                </li>

            </ul>


            <p class="main-menu__top-welcome-text">
                {{ setting('welcome_text', 'Welcome to Our Office') }}
            </p>


            <div class="main-menu__top-right">

                <div class="main-menu__top-time">

                    <div class="main-menu__top-time-icon">
                        <span class="fas fa-clock"></span>
                    </div>

                    <p class="main-menu__top-text">
                        {{ setting('working_hours', 'Mon - Fri: 09:00 - 05:00') }}
                    </p>

                </div>


                {{-- Social Media --}}
                <div class="main-menu__social">

                    <a href="{{ setting('twitter','javascript:void(0)') }}" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="{{ setting('facebook','javascript:void(0)') }}" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="{{ setting('youtube','javascript:void(0)') }}" target="_blank">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="{{ setting('instagram','javascript:void(0)') }}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

            </div>

        </div>

    </div>


    {{-- Main Navigation --}}
    <nav class="main-menu">

        <div class="main-menu__wrapper">

            <div class="main-menu__wrapper-inner">

                {{-- Logo --}}
                <div class="main-menu__left">

                    <div class="main-menu__logo">

                        <a href="{{ url('/') }}">

                            @if(setting_asset('logo'))

                                <img
                                    src="{{ setting_asset('logo') }}"
                                    alt="{{ setting('website_name', 'Stonespire Graphics') }}"
                                >

                            @else

                                <img
                                    src="{{ asset('assets/images/logo-new.png') }}"
                                    alt="Stonespire Graphics"
                                >

                            @endif

                        </a>

                    </div>

                </div>


                {{-- Navigation --}}
                <div class="main-menu__main-menu-box">

                    <a href="javascript:void(0)" class="mobile-nav__toggler">
                        <i class="fa fa-bars"></i>
                    </a>

                    <ul class="main-menu__list">

                        <li class="{{ request()->is('/') ? 'current' : '' }}">
                            <a href="{{ url('/') }}">
                                Home
                            </a>
                        </li>


                        <li class="{{ request()->is('about') ? 'current' : '' }}">
                            <a href="{{ url('/about') }}">
                                About
                            </a>
                        </li>


                        <li class="{{ request()->is('services') ? 'current' : '' }}">
                            <a href="{{ url('/services') }}">
                                Services
                            </a>
                        </li>


                        {{-- Products --}}
                        <li class="dropdown {{ request()->is('products') ? 'current' : '' }}">

                            <a href="{{ url('/products') }}">
                                Products
                            </a>

                            <ul class="shadow-box">
                                
                                {{-- We'll replace this with database products later --}}
                                @foreach ($productLink as $link)
                                <li>
                                    <a href="/products/{{ $link->slug }}">
                                        {{$link->name}}
                                    </a>
                                </li>
                                @endforeach
                                <li>
                                    <a href="/products">
                                        View More
                                    </a>
                                </li>
                            </ul>

                        </li>


                        {{-- More --}}
                        <li class="dropdown">

                            <a href="javascript:void(0)">
                                More
                            </a>

                            <ul class="shadow-box">

                                <li class="">
                                    <a href="{{ url('/contact') }}">
                                        Contact us
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/gallery') }}">
                                        Gallery
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/blogs') }}">
                                        Blogs
                                    </a>
                                </li>

                            </ul>

                        </li>

                    </ul>

                </div>


                {{-- Right Side --}}
                <div class="main-menu__right">

                    <div class="main-menu__call">

                        <div class="main-menu__call-icon">
                            <i class="icon-phone-call"></i>
                        </div>

                        <div class="main-menu__call-content">

                            <p class="main-menu__call-sub-title">
                                Call Anytime
                            </p>

                            <h5 class="main-menu__call-number">

                                <a href="tel:{{ setting('phone') }}">
                                    {{ setting('phone') }}
                                </a>

                            </h5>

                        </div>

                    </div>


                    <div class="main-menu__btn-box">

                        <a
                            href="{{ url('/contact') }}"
                            class="thm-btn">

                            Enquiry

                            <span>
                                <i class="icon-right-arrow"></i>
                            </span>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </nav>

</header>


{{-- Sticky Header --}}
<div class="stricky-header stricked-menu main-menu">

    <div class="sticky-header__content"></div>

</div>