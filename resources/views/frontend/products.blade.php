@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>'Our Products'])
@push('styles')
<style>
    /* ==============================
   PRODUCTS SECTION
============================== */

    .products-section {
        padding: 75px 0 100px;
        background: #fff;
    }

    .products-heading {
        text-align: center;
        margin-bottom: 48px;
    }

    .products-heading h2 {
        font-size: 48px;
        font-weight: 700;
        color: #050505;
        margin-bottom: 15px;
    }

    .products-heading h2 span {
        color: var(--red);
    }

    .heading-line {
        width: 145px;
        height: 6px;
        background: var(--red);
        margin: 0 auto;
    }


    /* ==============================
   PRODUCT CARD
============================== */

    .product-card {
        height: 100%;
        background: #fff;
        border-radius: 17px;
        overflow: hidden;
        border: 1px solid #e7e9ec;
        box-shadow: 0 8px 25px rgba(9, 30, 50, .09);
        transition: .4s ease;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 18px 45px rgba(9, 30, 50, .16);
    }

    .product-img {
        height: 230px;
        overflow: hidden;
        background: #eef1f3;
    }

    .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: .6s ease;
    }

    .product-card:hover .product-img img {
        transform: scale(1.06);
    }

    .product-info {
        padding: 22px 28px 25px;
    }

    .product-info h3 {
        font-size: 21px;
        color: var(--navy);
        font-weight: 700;
        margin-bottom: 12px;
    }

    .product-line {
        width: 38px;
        height: 3px;
        background: var(--red);
        margin-bottom: 13px;
    }

    .product-info p {
        font-size: 14px;
        line-height: 1.75;
        color: #384656;
        min-height: 73px;
        margin-bottom: 18px;
    }

    .know-more {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #071d59;
        font-size: 14px;
        font-weight: 700;
        transition: .3s;
    }

    .know-more i {
        width: 27px;
        height: 27px;
        border: 1.5px solid #071d59;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        transition: .3s;
    }

    .know-more:hover {
        color: var(--red);
    }

    .know-more:hover i {
        background: var(--red);
        border-color: var(--red);
        color: #fff;
        transform: translateX(4px);
    }


    /* ==============================
   BOTTOM CTA
============================== */

    .product-bottom-cta {
        padding: 75px 0;
        background:
            linear-gradient(135deg, #061624, #0c2942);
        text-align: center;
    }

    .product-bottom-cta h2 {
        color: #fff;
        font-size: 38px;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .product-bottom-cta p {
        max-width: 650px;
        margin: 0 auto 28px;
        color: rgba(255, 255, 255, .7);
        font-size: 14px;
        line-height: 1.8;
    }

    .cta-whatsapp {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 14px 25px;
        background: var(--red);
        color: #fff;
        border-radius: 5px;
        font-size: 14px;
        font-weight: 600;
        transition: .3s;
    }

    .cta-whatsapp:hover {
        background: #fff;
        color: var(--navy);
    }


    /* ==============================
   FLOATING WHATSAPP
============================== */

    .whatsapp-float {
        position: fixed;
        right: 24px;
        bottom: 25px;
        width: 58px;
        height: 58px;
        border-radius: 50%;
        background: #25d366;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        z-index: 999;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .2);
    }

    .whatsapp-float:hover {
        color: #fff;
        transform: scale(1.08);
    }


    /* ==============================
   MOBILE MENU
============================== */

    .mobile-toggle {
        display: none;
        color: #fff;
        font-size: 25px;
        cursor: pointer;
    }

    @media(max-width:991px) {

        .st-nav {
            display: none;
        }

        .mobile-toggle {
            display: block;
        }

        .product-hero h1 {
            font-size: 42px;
        }

        .products-heading h2 {
            font-size: 38px;
        }

    }


    /* ==============================
   MOBILE
============================== */

    @media(max-width:767px) {

        .st-header {
            height: 70px;
        }

        .st-logo-text strong {
            font-size: 17px;
        }

        .st-logo-text span {
            font-size: 7px;
            letter-spacing: 4px;
        }

        .product-hero {
            min-height: 220px;
        }

        .product-hero h1 {
            font-size: 36px;
        }

        .products-section {
            padding: 55px 0 70px;
        }

        .products-heading {
            margin-bottom: 35px;
        }

        .products-heading h2 {
            font-size: 32px;
        }

        .product-img {
            height: 215px;
        }

        .product-info {
            padding: 20px 22px 24px;
        }

        .product-info h3 {
            font-size: 19px;
        }

        .product-info p {
            min-height: auto;
        }

        .product-bottom-cta {
            padding: 60px 20px;
        }

        .product-bottom-cta h2 {
            font-size: 28px;
        }

    }
</style>
@endpush

<section class="products-section">
    <div class="container">
        <div class="products-heading">
            <h2>
                Product <span>Categories</span>
            </h2>
            <div class="heading-line"></div>
        </div>
        <div class="row g-4">
            @foreach ($products as $key=>$product)
            <div class="col-lg-3 col-md-6">
                <div class="product-card">
                    <div class="product-img">
                        <img src="{{$product->image}}"
                            alt="{{$product->name}}">
                    </div>
                    <div class="product-info">
                        <h3>
                            {{$product->name}}
                        </h3>
                        <div class="product-line"></div>
                        <p>
                            {!!$product->short_description!!}
                        </p>
                        <a href="products/{{$product->slug}}"
                            class="know-more">
                            Know more
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-links my-3">
            {{ $products->links() }}
        </div>
    </div>
</section>
<section class="product-bottom-cta">
    <div class="container">
        <h2>
            Looking for Custom Printing Solutions?
        </h2>
        <p>
            Get in touch with Stonespire Graphics for
            customized labels, logos, panel overlays and
            professional printing solutions.
        </p>
        <a href="https://wa.me/91{{setting('whatsapp')}}?text=Hello%20Stonespire%20Graphics%2C%20I%20want%20to%20discuss%20a%20product%20requirement."
            target="_blank"
            class="cta-whatsapp">
            <i class="fa-brands fa-whatsapp"></i>
            Get A Quote
        </a>
    </div>
</section>
@endsection