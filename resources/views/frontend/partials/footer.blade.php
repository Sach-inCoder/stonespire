<footer class="sg-footer">

    <!-- MAIN FOOTER -->
    <div class="sg-footer-main">

        <div class="container">

            <div class="row g-5">

                <!-- ABOUT -->
                <div class="col-xl-4 col-lg-6 col-md-6">

                    <div class="sg-footer-about">

                        <a href="/" class="sg-footer-logo">
                            <img src="{{setting_asset('logo')}}"
                                alt="Stonespire Graphics">
                        </a>

                        <h3>
                            {{setting('website_name')}}
                        </h3>

                        <p>
                            Stonespire Graphics Private Limited delivers
                            precision-driven printing and graphic solutions
                            with a strong focus on quality, innovation and
                            dependable service.
                        </p>

                        <div class="sg-footer-tag">
                            <span></span>
                            PRECISION IN EVERY PRINT
                            <span></span>
                        </div>

                        <!-- SOCIAL -->
                        <div class="sg-footer-social">

                            <a href="{{setting('facebook','javascript:void(0)')}}" aria-label="Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>

                            <a href="{{setting('instagram','javascript:void(0)')}}" aria-label="Instagram">
                                <i class="fab fa-instagram"></i>
                            </a>

                            <a href="{{setting('twitter','javascript:void(0)')}}" aria-label="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a href="{{setting('youtube','javascript:void(0)')}}" aria-label="YouTube">
                                <i class="fab fa-youtube"></i>
                            </a>

                        </div>

                    </div>

                </div>


                <!-- QUICK LINKS -->
                <div class="col-xl-2 col-lg-6 col-md-6">

                    <div class="sg-footer-title">
                        <h3>Quick Links</h3>
                    </div>

                    <ul class="sg-footer-links">

                        <li>
                            <a href="/">
                                <i class="fas fa-angle-right"></i>
                                Home
                            </a>
                        </li>

                        <li>
                            <a href="{{url('about')}}">
                                <i class="fas fa-angle-right"></i>
                                About Us
                            </a>
                        </li>

                        <li>
                            <a href="{{url('services')}}">
                                <i class="fas fa-angle-right"></i>
                                Services
                            </a>
                        </li>

                        <li>
                            <a href="{{url('products')}}">
                                <i class="fas fa-angle-right"></i>
                                Products
                            </a>
                        </li>

                        <li>
                            <a href="{{url('gallery')}}">
                                <i class="fas fa-angle-right"></i>
                                Gallery
                            </a>
                        </li>

                        <li>
                            <a href="{{url('blogs')}}">
                                <i class="fas fa-angle-right"></i>
                                Blogs
                            </a>
                        </li>

                        <li>
                            <a href="{{url('contact')}}">
                                <i class="fas fa-angle-right"></i>
                                Contact
                            </a>
                        </li>

                    </ul>

                </div>


                <!-- PRODUCTS -->
                <div class="col-xl-3 col-lg-6 col-md-6">

                    <div class="sg-footer-title">
                        <h3>Our Products</h3>
                    </div>

                    <ul class="sg-footer-links">
                         @foreach ($productLink as $link)
                        <li>

                            <a href="/products/{{ $link->slug }}">
                                <i class="fas fa-angle-right"></i>
                                {{$link->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- CONTACT -->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="sg-footer-title">
                        <h3>Get In Touch</h3>
                    </div>
                    <div class="sg-contact-list">
                        <!-- ADDRESS -->
                        <div class="sg-contact-item">
                            <div class="sg-contact-icon">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div class="sg-contact-content">
                                <small>OUR LOCATION</small>
                                <p>
                                    {{setting('address')}}
                                </p>
                            </div>
                        </div>
                        <!-- PHONE -->
                        <a href="tel:+91{{setting('phone')}}"
                            class="sg-contact-item">
                            <div class="sg-contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="sg-contact-content">
                                <small>CALL US</small>
                                <p>
                                    +91 {{setting('phone')}}
                                </p>

                            </div>

                        </a>


                        <!-- EMAIL -->
                        <a href="mailto:{{setting('email')}}"
                            class="sg-contact-item">

                            <div class="sg-contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>

                            <div class="sg-contact-content">

                                <small>EMAIL US</small>

                                <p>
                                    {{setting('email')}}<br>
                                    {{setting('alternate_email')}}
                                </p>

                            </div>

                        </a>


                        <!-- WHATSAPP -->
                        <a href="https://wa.me/91{{setting('whatsapp','9821514389')}}"
                            target="_blank"
                            class="sg-contact-whatsapp">

                            <i class="fab fa-whatsapp whatsapp-icon"></i>

                            <div class="sg-contact-whatsapp-content">

                                <strong>
                                    Chat on WhatsApp
                                </strong>

                                <span>
                                    Quick response from our team
                                </span>

                            </div>

                            <i class="fas fa-arrow-right"></i>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- BOTTOM BAR -->
    <div class="sg-footer-bottom">

        <div class="container">

            <div class="sg-footer-bottom-inner">

                <p>{{ setting(
                        'copyright',
                        'Stonespire Graphics Private Limited'
                    ) }}
                </p>

                <div class="sg-footer-bottom-links">

                    <a href="privacy-policy">
                        Privacy Policy
                    </a>

                    <span></span>

                    <a href="terms">
                        Terms &amp; Conditions
                    </a>

                </div>

            </div>

        </div>

    </div>


    <!-- FLOATING WHATSAPP -->
    <a href="https://wa.me/{{setting('whatsapp','9821514389')}}"
        class="sg-floating-whatsapp"
        target="_blank">

        <span>
            Chat With Us
        </span>

        <i class="fab fa-whatsapp"></i>

    </a>

</footer>