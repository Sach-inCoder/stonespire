@extends('frontend.layouts.app')
@section('title',$product->name)
@section('content')
@include('frontend.partials.pageHeader',['title'=>$product->name])
@push('styles')
<style>
    .product-image-box-2,
    .product-image-box {
        width: 100%;
        height: 280px;
        background: #fff;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
        box-sizing: border-box;
    }

    .product-image-box-2 img,
    .product-image-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        /* Image cut nahi hogi */
        object-position: center;
        display: block;
    }
</style>
@endpush
<section class="st-products-section" id="products">

    <div class="container">

        <div class="st-products-heading">

            <div class="st-section-label">
                <span></span>
                OUR PRODUCT RANGE
                <span></span>
            </div>

            <h2>
                Solutions Built for
                <strong>Performance &amp; Precision</strong>
            </h2>

            <p>
                {{$product->short_description}}
            </p>

        </div>
        <div class="row g-4">
            @foreach ($product->galleries as $img)
            <div class="col-lg-3 col-md-6">
                <div class="product-image-box-2">
                    <img src="{{ asset($img->image) }}" alt="Product 1">
                </div>
            </div>
        
            @endforeach

        </div>
    </div>
</section>
<section class="st-applications">

    <div class="container">

        <div class="st-app-heading text-center">

            <div class="st-section-label light">
                <span></span>
                APPLICATIONS
                <span></span>
            </div>

            <h2>
                Products Designed for
                <strong>Multiple Industries</strong>
            </h2>

            <p>
                Our products support a wide range of industrial, electrical,
                automotive, consumer and commercial applications.
            </p>

        </div>


        <div class="st-industry-grid">

            <div class="st-industry">
                <i class="fa-solid fa-snowflake"></i>
                <span>Air Conditioners</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-shirt"></i>
                <span>Washing Machines</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-bolt"></i>
                <span>Inverters &amp; UPS</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-droplet"></i>
                <span>Water Purifiers</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-temperature-half"></i>
                <span>Water Heaters</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-wind"></i>
                <span>Air Coolers</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-tv"></i>
                <span>Remote Controls</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-heart-pulse"></i>
                <span>Medical Devices</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-plug"></i>
                <span>Electrical Panels</span>
            </div>

            <div class="st-industry">
                <i class="fa-solid fa-car"></i>
                <span>Automotive</span>
            </div>

        </div>

    </div>

</section>
<section class="barcode-content-section aluminium-content">

    <div class="container">

        <div class="barcode-content-wrap">

            <div class="st-section-label text-uppercase">
                <span></span>
                {{$product->name}}
                <span></span>
            </div>

            <h2>
                Premium {{$product->name}}
                <strong>Built to Last</strong>
            </h2>

            <div class="product_description">
                {!! $product->description !!}
            </div>


            <!-- ==================================
                 WHAT MAKES US DIFFERENT
            ================================== -->

            <div class="barcode-sub-block">

                <h3>
                    What Makes Our {{$product->name}} Stand Out
                </h3>

                <p>
                    We don't just manufacture {{$product->name}} — we create identification
                    solutions designed for demanding applications.
                </p>


                <div class="aluminium-feature-grid">

                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-temperature-high"></i>
                        </div>

                        <div>
                            <h4>Heat &amp; Weather Resistant</h4>

                            <p>
                                Designed to perform in extreme temperatures,
                                rain, UV exposure and outdoor environments
                                without compromising readability.
                            </p>
                        </div>

                    </div>


                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-sliders"></i>
                        </div>

                        <div>
                            <h4>Fully Customisable</h4>

                            <p>
                                Custom sizes, shapes, matte, gloss or brushed
                                finishes, printing methods and adhesive options.
                            </p>
                        </div>

                    </div>


                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>

                        <div>
                            <h4>Tamper-Evident Options</h4>

                            <p>
                                Void and tamper-proof label options are
                                available for security-sensitive applications
                                and warranty management.
                            </p>

                        </div>

                    </div>


                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-print"></i>
                        </div>

                        <div>
                            <h4>Sharp, Lasting Print</h4>

                            <p>
                                Screen printing, digital printing and embossing
                                techniques help maintain crisp text and graphics.
                            </p>

                        </div>

                    </div>


                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>

                        <div>
                            <h4>Chemical Resistant</h4>

                            <p>
                                Suitable for environments exposed to oils,
                                solvents, cleaning agents and industrial
                                chemicals.
                            </p>

                        </div>

                    </div>


                    <div class="aluminium-feature">

                        <div class="al-feature-icon">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>

                        <div>
                            <h4>Bulk &amp; Custom Orders</h4>

                            <p>
                                Flexible production for small batches as well
                                as large-scale manufacturing requirements.
                            </p>

                        </div>

                    </div>

                </div>

            </div>


     

            <!-- ==================================
                 WHY CHOOSE US
            ================================== -->

            <div class="barcode-why">

                <div class="st-section-label">
                    <span></span>
                    WHY STONESPIRE
                    <span></span>
                </div>

                <h3>
                    Why Choose Stonespire for {{$product->name}}?
                </h3>


                <div class="why-barcode-grid">

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Experienced Manufacturing Team</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>In-House Production</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>ISO-Aligned Quality Processes</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Custom Sizes &amp; Finishes</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Competitive Pricing</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Fast Pan-India Delivery</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Small &amp; Bulk Orders</span>
                    </div>

                    <div>
                        <i class="fa-solid fa-circle-check"></i>
                        <span>Dedicated Customer Support</span>
                    </div>

                </div>

            </div>


            <!-- ==================================
                 FINAL CONTENT
            ================================== -->

            <div class="barcode-final-text mt-5">
                {!! $product->final_content !!}

            </div>


            <!-- ==================================
                 CTA
            ================================== -->

         

        </div>

    </div>

</section>




<section class="st-product-cta">

    <div class="container">

        <div class="st-product-cta-inner">

            <div>

                <div class="st-cta-small">
                    HAVE A SPECIFIC REQUIREMENT?
                </div>

                <h2>
                    Need a Customized Printing Solution?
                </h2>

                <p>
                    Share your requirement with our team and get the right
                    product solution for your application.
                </p>

            </div>

            <a href="/contact">
                Request a Quote
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>
@endsection