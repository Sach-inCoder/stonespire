@extends('frontend.layouts.app')
@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
<style>
    /* ==============================
           IMAGE SLIDER
        ============================== */

    .image-slider {
        width: 100%;
        height: 680px;
        overflow: hidden;
        position: relative;
    }

    .slide {
        position: absolute;
        inset: 0;

        opacity: 0;
        visibility: hidden;

        transition: opacity 1s ease;
    }

    .slide.active {
        opacity: 1;
        visibility: visible;
        z-index: 2;
    }

    .slide img {
        width: 100%;
        height: 100%;

        object-fit: cover;
        object-position: center;

        transform: scale(1.12);
    }

    /* Zoom Effect */
    .slide.active img {
        animation: zoomEffect 7s ease-out forwards;
    }

    @keyframes zoomEffect {

        from {
            transform: scale(1.12);
        }

        to {
            transform: scale(1);
        }

    }

    /* ==============================
           ARROWS
        ============================== */

    .slider-arrow {
        position: absolute;

        top: 50%;
        transform: translateY(-50%);

        z-index: 10;

        width: 45px;
        height: 45px;

        border: none;
        border-radius: 50%;

        background: rgba(0, 0, 0, 0.35);
        color: #fff;

        font-size: 25px;

        cursor: pointer;

        transition: .3s;
    }

    .slider-arrow:hover {
        background: rgba(184, 134, 11, .85);
    }

    .prev {
        left: 20px;
    }

    .next {
        right: 20px;
    }

    /* ==============================
           DOTS
        ============================== */

    .slider-dots {
        position: absolute;

        bottom: 20px;
        left: 50%;

        transform: translateX(-50%);

        z-index: 20;

        display: flex;
        gap: 8px;
    }

    .dot {
        width: 11px;
        height: 11px;

        padding: 0;

        border: none;
        border-radius: 50%;

        background: rgba(255, 255, 255, .6);

        cursor: pointer;

        transition: .3s;
    }

    .dot.active {
        background: #c9a227;
        transform: scale(1.3);
    }

    /* ==============================
           MOBILE
        ============================== */

    @media (max-width: 768px) {

        .image-slider {
            height: 500px;
        }

        .slide img {
            object-fit: cover;
            object-position: center;
        }

        .slider-arrow {
            width: 35px;
            height: 35px;

            font-size: 18px;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }

    }

    @media (max-width: 480px) {

        .image-slider {
            height: 420px;
        }

        .slider-dots {
            bottom: 12px;
        }

    }

    .sg-stats-section {
        background: #b8860b;
        color: #fff;
        position: relative;
        z-index: 5;
    }


    .sg-stat-item {
        min-height: 160px;

        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;

        text-align: center;

        padding: 20px;

        border-right: 1px solid rgba(255, 255, 255, .7);
    }


    .sg-stat-item:last-child {
        border-right: 0;
    }


    .sg-stat-icon {
        font-size: 25px;
        margin-bottom: 5px;
    }


    .sg-stat-item h2 {
        font-size: 38px;
        line-height: 1;

        font-weight: 700;
        color: white;

        margin: 5px 0 10px;
    }


    .sg-stat-item p {
        margin: 0;

        font-size: 13px;

        font-weight: 600;
    }
</style>
<style>
    /* =================================
   PRODUCT RANGE SECTION
================================= */

    .product-eyebrow {
        color: #176b3a;
    }

    .product-section-heading h2 {
        color: white;
    }

    .product-card {
        border-color: #e8d9a0;
    }

    .product-card:hover {
        border-color: #c9a227;
        box-shadow: 0 10px 25px rgba(201, 162, 39, 0.25);
    }

    .product-number {
        color: #c9a227;
        -webkit-text-stroke: 1px #b8860b;
    }

    .product-content h3 {
        color: #3d2f0a;
    }

    .inquiry-btn {
        background: #b8860b;
        color: #fff;
        border-color: #b8860b;
    }

    .inquiry-btn:hover {
        background: #c9a227;
        border-color: #c9a227;
        color: #fff;
    }

    /* Swiper Navigation Arrows */
    .product-prev,
    .product-next {
        background: #b8860b;
        color: #fff;
        border: none;
    }

    .product-prev:hover,
    .product-next:hover {
        background: #c9a227;
    }

    /* Swiper Pagination Dots (if used) */
    .product-range-section .swiper-pagination-bullet-active {
        background: #b8860b;
    }


    /* =================================
   CLIENT REVIEWS SECTION
================================= */

    .reviews-title h2 {
        color: #3d2f0a;
    }

    .review-box {
        border-top: 3px solid #c9a227;
    }

    .review-box h3 {
        color: #3d2f0a;
    }

    .rating i {
        color: #d4af37;
        /* classic gold star color */
    }

    /* Carousel Arrows */
    .review-arrow {
        background: #b8860b;
        color: #fff;
    }

    .carousel-control-prev:hover .review-arrow,
    .carousel-control-next:hover .review-arrow {
        background: #c9a227;
    }

    /* Carousel indicator dots, if template adds them */
    .client-reviews .carousel-indicators button {
        background-color: #d8c68a;
    }

    .client-reviews .carousel-indicators button.active {
        background-color: #c9a227;
    }
</style>
<style>
    .gold-testimonial-section {
        position: relative;
        overflow: hidden;

        padding: 75px 0 100px;

        background-image: url("assets/images/printing.png");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;

        isolation: isolate;
    }


    /* =========================================
   GOLDEN IMAGE OVERLAY
========================================= */

    .gold-image-overlay {
        position: absolute;
        inset: 0;

        z-index: -1;

        background:
            linear-gradient(180deg,
                rgba(121, 84, 8, 0.78) 0%,
                rgba(170, 121, 12, 0.82) 45%,
                rgba(112, 76, 5, 0.86) 100%);

        pointer-events: none;
    }


    /* subtle golden glow */

    .gold-testimonial-section::after {
        content: "";

        position: absolute;

        inset: 0;

        z-index: -1;

        background: linear-gradient(90deg, #222222, #000000bf 45%, #212529a6);

        pointer-events: none;
    }


    /* =========================================
   HEADING
========================================= */

    .reviews-title {
        position: relative;
        z-index: 5;

        margin-bottom: 45px;
    }


    .reviews-title h2 {
        margin: 0 0 8px;

        color: #ffffff !important;



        font-size: 52px;

        font-weight: 700;

        line-height: 1.15;
    }


    .reviews-title p {
        margin: 0;

        color: #ffffff;

        font-family: "Cookie", cursive;

        font-size: 32px;

        line-height: 1.3;
    }


    /* =========================================
   SWIPER WRAPPER
========================================= */

    .testimonial-swiper-wrapper {
        position: relative;

        padding: 0 65px;
    }


    .testimonialSwiper {
        position: relative;

        overflow: hidden;

        padding: 5px 5px 35px;
    }


    .testimonialSwiper .swiper-slide {
        height: auto;

        display: flex;
    }


    /* =========================================
   TESTIMONIAL CARD
========================================= */

    .gold-testimonial-card {
        position: relative;

        width: 100%;

        min-height: 245px;

        padding: 38px 38px 30px;

        background: rgba(255, 255, 255, 0.96);

        border: none;

        border-radius: 0;

        box-shadow:
            0 8px 25px rgba(0, 0, 0, 0.18);

        overflow: hidden;

        transition: all 0.3s ease;
    }


    .gold-testimonial-card:hover {
        transform: translateY(-5px);

        box-shadow:
            0 15px 35px rgba(0, 0, 0, 0.25);
    }


    /* =========================================
   GOLD BOTTOM BORDER
========================================= */

    .gold-testimonial-card::after {
        content: "";

        position: absolute;

        left: 0;
        bottom: 0;

        width: 100%;
        height: 4px;

        background:
            linear-gradient(90deg,
                #9c7215,
                #d4af37,
                #f5d778,
                #d4af37,
                #9c7215);
    }


    /* =========================================
   CLIENT NAME
========================================= */

    .gold-testimonial-card h3 {
        position: relative;

        margin: 0 0 14px;

        color: #333333;


        font-size: 21px;

        font-weight: 600;

        line-height: 1.3;
    }


    /* =========================================
   REVIEW TEXT
========================================= */

    .gold-testimonial-card p {
        margin: 0 0 22px;

        color: #78818b;

        font-size: 15px;

        line-height: 1.9;

        min-height: 65px;
    }


    /* =========================================
   GOLD STARS
========================================= */

    .gold-stars {
        display: flex;

        align-items: center;

        gap: 5px;

        color: #e3ad00;

        font-size: 21px;
    }


    /* =========================================
   ARROWS
========================================= */

    .testimonial-prev,
    .testimonial-next {
        position: absolute;

        top: 50%;

        z-index: 20;

        width: 48px;
        height: 48px;

        display: flex;

        align-items: center;
        justify-content: center;

        color: #d4af37;

        background: #ffffff;

        border: 1px solid #d4af37;

        border-radius: 0;

        font-size: 21px;

        cursor: pointer;

        transform: translateY(-50%);

        transition: all 0.3s ease;
    }


    .testimonial-prev {
        left: 0;
    }


    .testimonial-next {
        right: 0;
    }


    .testimonial-prev:hover,
    .testimonial-next:hover {
        color: #ffffff;

        background: #d4af37;

        border-color: #d4af37;
    }


    /* =========================================
   PAGINATION
========================================= */

    .testimonialSwiper .swiper-pagination {
        bottom: 0;
    }


    .testimonialSwiper .swiper-pagination-bullet {
        width: 9px;
        height: 9px;

        opacity: 1;

        background: transparent;

        border: 1px solid #ffffff;
    }


    .testimonialSwiper .swiper-pagination-bullet-active {
        width: 28px;

        border-radius: 10px;

        background: #d4af37;

        border-color: #d4af37;
    }


    /* =========================================
   TABLET
========================================= */

    @media (max-width: 991px) {

        .reviews-title h2 {
            font-size: 42px;
        }

        .reviews-title p {
            font-size: 27px;
        }

        .testimonial-swiper-wrapper {
            padding: 0 55px;
        }

    }


    /* =========================================
   MOBILE
========================================= */

    @media (max-width: 767px) {

        .gold-testimonial-section {
            padding: 60px 0 75px;
        }

        .reviews-title {
            margin-bottom: 30px;
        }

        .reviews-title h2 {
            font-size: 32px;
        }

        .reviews-title p {
            font-size: 23px;
        }

        .testimonial-swiper-wrapper {
            padding: 0;
        }

        .gold-testimonial-card {
            min-height: 225px;

            padding: 30px 25px;
        }

        .gold-testimonial-card h3 {
            font-size: 18px;
        }

        .gold-testimonial-card p {
            font-size: 14px;

            min-height: auto;
        }

        .testimonial-prev,
        .testimonial-next {
            display: none;
        }

    }

    /* =========================================
   IMAGE + BLACK OVERLAY
========================================= */

    .gold-testimonial-section {
        position: relative;
        overflow: hidden;

        padding: 75px 0 100px;

        background-image: url("assets/images/printing.png");
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;

        isolation: isolate;
    }


    /* BLACK OVERLAY */

    .gold-image-overlay {
        position: absolute;
        inset: 0;

        z-index: -1;

        background: rgba(0, 0, 0, 0.62);

        pointer-events: none;
    }
</style>
<style>
    .location-map {
        overflow: hidden;
        border-radius: 15px;
    }

    /* Initial state */
    .location-map img {
        width: 100%;
        display: block;
        transform: scale(0.85);
        opacity: 0.6;
        transition: transform 1.2s ease, opacity 1.2s ease;
    }

    /* Zoom when section is visible */
    .single-location-section.active .location-map img {
        transform: scale(1);
        opacity: 1;
    }
</style>
@endpush

@if (!$sliders->isEmpty())
<section class="image-slider" id="imageSlider">
    @foreach($sliders as $key => $slider)
    <div class="slide {{ $key == 0 ? 'active' : '' }}">
        <img alt="Stonespire Graphics" src="{{ $slider->image }}" />
    </div>
    @endforeach
    <button class="slider-arrow prev" id="prev">
        ❮
    </button>
    <button class="slider-arrow next" id="next">
        ❯
    </button>
    <div class="slider-dots">
    @foreach($sliders as $key => $slider)
        <button class="dot {{ $key == 0 ? 'active' : '' }}" data-slide="{{$key}}"></button>
    @endforeach
    </div>
</section>
@endif

@if (!$statistics->isEmpty())
<section class="sg-stats-section">
    <div class="container-fluid">
        <div class="row g-0">
            @foreach ($statistics as $key => $stats)
            <div class="col-lg-3 col-md-6 col-6">
                <div class="sg-stat-item">
                    <div class="sg-stat-icon">
                        <i class="{{$stats->icon}}"></i>
                    </div>
                    <h2>{{$stats->value}}</h2>
                    <p>
                        {{$stats->label}}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

</section>
@endif


<section class="about-section">
    <div class="container about-container">
        <div class="row align-items-center g-lg-5">
            <div class="col-lg-6">
                <div class="about-image-wrapper">
                    <!-- Navy Background Shape -->
                    <div class="about-blue-shape"></div>
                    <!-- Gold Line -->
                    <div class="about-gold-shape"></div>
                    <!-- Dot Pattern -->
                    <div class="about-dots"></div>
                    <!-- Circle -->
                    <div class="about-circle"></div>
                    <!-- Main Image -->
                    <img
                        src="{{ $homePage->about_image }}"
                        class="about-main-image"
                        alt="Company Building">

                    <!-- Play Button -->
                    <a href="javascript:void(0)"
                        class="about-play-btn"
                        aria-label="Watch Company Video">
                        <i class="fa-solid fa-play"></i>

                    </a>

                </div>

            </div>


            <!-- =========================
                 RIGHT CONTENT
            ========================== -->

            <div class="col-lg-6">

                <div class="about-content">

                    <div class="about-small-title">
                        {{ $homePage->about_label }}
                    </div>


                    <div class="experience-title">
                        {{$homePage->about_experience}}
                    </div>


                    <h2 class="about-title">
                        {{$homePage->about_title}}
                    </h2>


                    <p class="about-text">
                        {{$homePage->about_description}}
                    </p>
                    <p class="about-text">
                        {{$homePage->about_description_2}}
                    </p>


                    <a href="{{ $homePage->about_button_url }}" class="about-btn">

                        {{$homePage->about_button_text}}

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>
<section class="quote-wrapper">

    <div class="container">

        <div class="quote-box">

            <h3 class="quote-title">
                {!!$homePage->quote_title!!}
            </h3>


            <a href="{{$homePage->quote_title_url}}" class="quote-btn">

                {!!$homePage->quote_button_text!!}

                <i class="fa-solid fa-circle-arrow-right"></i>

            </a>

        </div>

    </div>

</section>

@if (!$services->isEmpty())
<section class="printing-solutions">
    <div class="container">
        <!-- Section Heading -->
        <div class="solutions-heading text-center">
            <h3>
                {{$homePage->solutions_subtitle}}
            </h3>
            <h2>
                {{$homePage->solutions_title}}
            </h2>
        </div>


        <!-- Solutions Grid -->
        <div class="row g-3 solutions-grid">

            @foreach ($services as $key => $service)
            <div class="col-lg-4 col-md-6">
                <a href="services/{{$service->slug}}" class="solution-card">
                    <span class="solution-icon">
                        <i class="{{$service->icon}}"></i>
                    </span>
                    <span>{{$service->name}}</span>
                </a>
            </div> 
            @endforeach
        </div>

    </div>

</section>
@endif

@if (!$products->isEmpty())
<section class="product-range-section">
    <div class="container-fluid px-lg-4">

        <!-- Section Heading -->
        <div class="product-section-heading text-center">

            <span class="product-eyebrow">
                {{$homePage->products_label}}
            </span>

            <h2>
                {{$homePage->products_title}}
            </h2>

            <p>
                {!! $homePage->products_description !!}
            </p>

        </div>


        <!-- ================================
             SWIPER
        ================================= -->

        <div class="swiper productSwiper">

            <div class="swiper-wrapper">
                @foreach ($products as $key => $product)
                <div class="swiper-slide">
                    <div class="product-card">
                        <div class="product-image-box">
                            <img src="{{$product->image}}"
                                alt="{{$product->name}}">
                        </div>
                        <div class="product-content">
                            <span class="product-number">
                                {{ sprintf('%02d', $key + 1) }}
                            </span>
                            <h3>
                                {{$product->name}}
                            </h3>
                            <a href="https://wa.me/91{{setting('whatsapp')}}?text={{$product->whatsapp_message}}"
                                target="_blank"
                                class="inquiry-btn">
                                Know more
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Navigation -->
            <div class="product-prev">
                <i class="fa-solid fa-arrow-left"></i>
            </div>
            <div class="product-next">
                <i class="fa-solid fa-arrow-right"></i>
            </div>
            <!-- Pagination -->
        </div>
    </div>
</section>
@endif

<section class="single-location-section">
    <div class="container">
        <!-- Heading -->
        <div class="location-heading text-center">
            <h2>
                {{$homePage->location_title}}
            </h2>
            <p>
                {!! $homePage->location_description !!}
            </p>
        </div>
        <div class="row align-items-center justify-content-center">
            <!-- LEFT : SINGLE LOCATION -->
            <div class="col-lg-4 col-md-5">
                <div class="location-info">
                    <div class="location-icon">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="location-text">
                        <span>{{$homePage->location_label}}</span>
                        <h3>
                            {{$homePage->location_name}}
                        </h3>
                    </div>
                </div>
            </div>
            <!-- RIGHT : MAP -->
            <div class="col-lg-7 col-md-7">
                <div class="location-map">
                    <!-- Map Image -->
                    <img src="{{$homePage->location_map}}"
                        alt="Our Location Map">
                </div>
            </div>
        </div>
    </div>
</section>

@if (!$testimonials->isEmpty())
<section class="gold-testimonial-section">
    <div class="gold-bg-circle gold-bg-circle-1"></div>
    <div class="gold-bg-circle gold-bg-circle-2"></div>
    <div class="container">
        <!-- Heading -->
        <div class="reviews-title text-center">
            <h2 style="color: white;">{{$homePage->testimonials_title}}</h2>
            <p>{{$homePage->testimonials_description}}</p>
        </div>
        <div class="testimonial-swiper-wrapper">
            <div class="swiper testimonialSwiper">
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $key => $testimonial)
                    <div class="swiper-slide">
                        <div class="gold-testimonial-card">
                            <div class="gold-quote">
                                <i class="bi bi-quote"></i>
                            </div>
                            <h3>
                                {{$testimonial->name}}
                            </h3>
                            <p>
                                {{$testimonial->message}}
                            </p>
                            <div class="gold-stars">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i> 
                                    @else
                                        <i class="far fa-star"></i> 
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                    @endforeach   
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            <!-- Previous -->
            <div class="testimonial-prev">
                <i class="bi bi-arrow-left"></i>
            </div>
            <!-- Next -->
            <div class="testimonial-next">
                <i class="bi bi-arrow-right"></i>
            </div>
        </div>
    </div>
</section>
@endif

@if (!$clients->isEmpty())
<section class="clients-section">
    <div class="container">
        <div class="clients-heading text-center">
            <span class="clients-subtitle">{{$homePage->client_label}}</span>
            <h2>{{$homePage->client_title}}</h2>
            <div class="heading-line"></div>
        </div>
        <div class="row g-3 g-lg-4">
            <!-- Client 01 -->
            @foreach ($clients as $key => $client)
            <div class="col-6 col-md-4 col-lg-3 client-item">
                <div class="client-card">
                    <img src="{{$client->logo}}" alt="{{$client->name}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if (!$facilities->isEmpty())
<section class="quality-lab-section">
    <div class="container-fluid">
        <!-- Section Heading -->
        <div class="lab-heading text-center">
            <h2>{{$homePage->quality_title}}</h2>
            <h3>{{$homePage->quality_subtitle}}</h3>
        </div>
        <div class="row lab-content align-items-start">
            <!-- LEFT SIDE IMAGE -->
            <div class="col-lg-6 col-md-12">
                <div class="lab-main-image">
                    <img src="{{$homePage->quality_image}}"
                        alt="Quality Laboratory"
                        class="img-fluid">
                </div>
            </div>
            <!-- RIGHT SIDE EQUIPMENT -->
            <div class="col-lg-6 col-md-12">
                <div class="equipment-list">
                    @foreach ($facilities as $key=>$quality)
                    <div class="equipment-card">
                        <div class="equipment-image">
                            <img src="{{$quality->image}}"
                                alt="{{$quality->name}}">
                        </div>
                        <div class="equipment-name">
                            {{$quality->name}}
                        </div>
                    </div>
                
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const productSwiper = new Swiper(".productSwiper", {

            slidesPerView: 3,
            spaceBetween: 20,

            loop: true,

            speed: 700,

            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },

            navigation: {
                nextEl: ".product-next",
                prevEl: ".product-prev"
            },

            pagination: {
                el: ".product-pagination",
                clickable: true
            },

            breakpoints: {

                /* Mobile */
                0: {
                    slidesPerView: 1,
                    spaceBetween: 15
                },

                /* Small Tablet */
                576: {
                    slidesPerView: 2,
                    spaceBetween: 18
                },

                /* Desktop - 3 Cards */
                992: {
                    slidesPerView: 3,
                    spaceBetween: 22
                }

            }

        });

    });
</script>
<script>
    const testimonialSwiper =
        new Swiper(".testimonialSwiper", {

            /* --------------------------------
               BASIC
            -------------------------------- */

            loop: true,

            speed: 700,

            spaceBetween: 25,


            /* --------------------------------
               AUTOPLAY
            -------------------------------- */

            autoplay: {

                delay: 3500,

                disableOnInteraction: false,

                pauseOnMouseEnter: true

            },


            /* --------------------------------
               DESKTOP
            -------------------------------- */

            slidesPerView: 3,


            /* --------------------------------
               RESPONSIVE
            -------------------------------- */

            breakpoints: {

                0: {

                    slidesPerView: 1,

                    spaceBetween: 15

                },

                576: {

                    slidesPerView: 1,

                    spaceBetween: 20

                },

                768: {

                    slidesPerView: 2,

                    spaceBetween: 20

                },

                992: {

                    slidesPerView: 3,

                    spaceBetween: 25

                }

            },


            /* --------------------------------
               ARROWS
            -------------------------------- */

            navigation: {

                nextEl: ".testimonial-next",

                prevEl: ".testimonial-prev"

            },


            /* --------------------------------
               DOTS
            -------------------------------- */

            pagination: {

                el: ".testimonialSwiper .swiper-pagination",

                clickable: true

            }

        });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const section = document.querySelector(".single-location-section");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    section.classList.add("active");
                }
            });
        }, {
            threshold: 0.25
        });

        if (section) {
            observer.observe(section);
        }

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {

        const section = document.querySelector(".single-location-section");

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    section.classList.add("active");
                }
            });
        }, {
            threshold: 0.25
        });

        if (section) {
            observer.observe(section);
        }

    });
</script>
<script>
    const slides = document.querySelectorAll(".slide");
    const dots = document.querySelectorAll(".dot");

    const prev = document.getElementById("prev");
    const next = document.getElementById("next");

    let current = 0;
    let timer;


    function showSlide(index) {

        slides.forEach(slide => {
            slide.classList.remove("active");
        });

        dots.forEach(dot => {
            dot.classList.remove("active");
        });

        current = index;

        slides[current].classList.add("active");
        dots[current].classList.add("active");

    }


    function nextSlide() {

        let index = current + 1;

        if (index >= slides.length) {
            index = 0;
        }

        showSlide(index);

    }


    function prevSlide() {

        let index = current - 1;

        if (index < 0) {
            index = slides.length - 1;
        }

        showSlide(index);

    }


    function startSlider() {

        clearInterval(timer);

        timer = setInterval(() => {

            nextSlide();

        }, 5000);

    }


    next.addEventListener("click", () => {

        nextSlide();
        startSlider();

    });


    prev.addEventListener("click", () => {

        prevSlide();
        startSlider();

    });


    dots.forEach(dot => {

        dot.addEventListener("click", () => {

            showSlide(
                parseInt(dot.dataset.slide)
            );
            startSlider();
        });
    });

    startSlider();
    document.addEventListener("DOMContentLoaded", function() {

        new Swiper(".hero-swiper", {
            loop: true,
            speed: 1000,

            autoplay: {
                delay: 4000,
                disableOnInteraction: false
            },

            navigation: {
                nextEl: ".hero__next",
                prevEl: ".hero__prev"
            },

            pagination: {
                el: ".hero__pagination",
                clickable: true
            }
        });

    });
    $(document).ready(function() {
        $('.testimonial-two__carousel').owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplayHoverPause: true,
            smartSpeed: 900,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1200: {
                    items: 3
                }
            }
        });
    });
</script>
@endpush
@endsection