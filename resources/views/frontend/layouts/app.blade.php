<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title', setting('website_name', 'Stonespire Graphics'))
    </title>
    {{-- Favicon --}}
    @if(setting_asset('favicon'))
    <link
        rel="icon"
        type="image/png"
        href="{{ setting_asset('favicon') }}">
    @endif
    {{-- cdn --}}
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:ital,wght@0,200..900;1,200..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- Existing Template CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jarallax.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/odometer.min.css') }}">
    {{-- Module CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/banner.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/about.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/service.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/counter.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/why-choose.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/project.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/video.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/team.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/brand.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/download-app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/testimonial.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/sliding-text.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/skill.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/process.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/module-css/faq.css') }}">


    {{-- Main CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


    @stack('styles')

</head>


<body class="custom-cursor">

    {{-- Cursor --}}
    <div class="custom-cursor__cursor"></div>
    <div class="custom-cursor__cursor-two"></div>


    {{-- Preloader --}}
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="chat-icon"><button type="button" class="chat-toggler"><i class="fa fa-comment"></i></button></div>
    <!--Chat Popup-->
    <div id="chat-popup" class="chat-popup">
        <div class="popup-inner">
            <div class="close-chat"><i class="fa fa-times"></i></div>
            <div class="chat-form">
                <p>Please fill out the form below and we will get back to you as soon as possible.</p>
                <form action="https://dreamlayout.mnsithub.com/html/tanspot/main-html/assets/inc/sendemail.php" method="POST" class="contact-form-validated">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Text" required></textarea>
                    </div>
                    <div class="form-group message-btn">
                        <button type="submit" class="thm-btn"> Submit Now
                            <span><i class="icon-right-arrow"></i></span>
                        </button>
                    </div>
                    <div class="result"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <?php
        $productLink = \App\Models\Product::select(['slug','name'])->where('status', 1)->orderBy('sort_order')->limit(8)->get();
        ?>
        @include('frontend.partials.header',$productLink)
        @yield('content')
        @include('frontend.partials.footer',$productLink)
    </div>
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/images/logo-new.png" width="140"
                        alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:stonespiregraphics@gmail.com">stonespiregraphics@gmail.com</a>
                </li>
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:businessdevelopment@stonespiregraphics.com">
                        businessdevelopment@stonespiregraphics.com
                    </a>
                </li>
                <li>
                    <i class="fas fa-phone"></i>
                    <a href="tel:9821514389">98215 14389</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <!-- Search Popup -->
    <div class="search-popup">
        <div class="color-layer"></div>
        <button class="close-search"><span class="far fa-times fa-fw"></span></button>
        <form method="post" action="https://dreamlayout.mnsithub.com/html/tanspot/main-html/blog.html">
            <div class="form-group">
                <input type="search" name="search-field" value="" placeholder="Search Here" required="">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- End Search Popup -->
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <span class="scroll-to-top__wrapper"><span class="scroll-to-top__inner"></span></span>
        <span class="scroll-to-top__text"> Go Back Top</span>
    </a>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <script src="{{ asset('assets/js/jquery-latest.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/jarallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/marquee.min.js') }}"></script>
    <script src="{{ asset('assets/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.circleType.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fittext.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.lettering.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-sidebar-content.js') }}"></script>
    <script src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
    <script src="{{ asset('assets/js/typed-2.0.11.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/gsap.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/ScrollTrigger.js') }}"></script>
    <script src="{{ asset('assets/js/gsap/SplitText.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>