@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>'Contact us'])
<section class="contact-info">
    <div class="container">
        <div class="row">
            <!-- Contact Number -->
            <div class="col-xl-4 col-lg-6 wow fadeInLeft" data-wow-delay="100ms">
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-phone-call"></span>
                    </div>
                    <p>Call Us</p>
                    <h5>
                        <a href="tel:+91{{setting('phone')}}">
                            +91 {{setting('phone')}}
                        </a>
                    </h5>
                </div>
            </div>
            <!-- Email -->
            <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="200ms">
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-email"></span>
                    </div>
                    <p>Email Us</p>
                    <h5>
                        <a href="mailto:{{setting('email')}}">
                            {{setting('email')}}
                        </a>
                    </h5>
                    <h5>
                        <a href="mailto:{{setting('alternate_email')}}">
                            {{setting('alternate_email')}}
                        </a>
                    </h5>
                </div>
            </div>
            <!-- Address -->
            <div class="col-xl-4 col-lg-6 wow fadeInRight" data-wow-delay="400ms">
                <div class="contact-info__single">
                    <div class="contact-info__icon">
                        <span class="icon-location1"></span>
                    </div>
                    <p>Our Office Location</p>
                    <h5>
                        {{setting('address')}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Contact Info End-->

<!--Contact Page Start-->
<section class="contact-page">
    <div class="container">
        <div class="contact-page__inner">
            <div class="row">
                <!-- Google Map -->
                <div class="col-xl-6">
                    <div class="contact-page__left">
                        {!! setting('google_map') !!}
                    </div>
                </div>
                <!-- Contact Form -->
                <div class="col-xl-6">
                    <div class="contact-page__right">
                        <h3 class="contact-page__form-title">
                            Get A Free Quote
                        </h3>
                        <form
                            class="contact-page__form ajax_form"
                            action="{{route('frontend.contact.query')}}"
                            method="POST">
                            @csrf
                            <div class="row">
                                <!-- Name -->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-page__input-box">
                                        <input
                                            class=""
                                            type="text"
                                            name="name"
                                            placeholder="Your Name"
                                            required>
                                        @error('name')
                                        <span class="text-danger">{{$massage}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-page__input-box">
                                        <input
                                            type="email"
                                            name="email"
                                            placeholder="Your Email"
                                            required>
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-page__input-box">
                                        <input
                                            type="tel"
                                            name="phone"
                                            placeholder="Phone Number"
                                            required>
                                    </div>
                                </div>
                                <!-- Subject -->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="contact-page__input-box">
                                        <input
                                            type="text"
                                            name="subject"
                                            placeholder="Subject"
                                            required>
                                    </div>
                                </div>
                                <!-- Message -->
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box text-message-box">
                                        <textarea
                                            name="message"
                                            placeholder="Your Message"
                                            required></textarea>
                                    </div>
                                    <div class="contact-page__btn-box">
                                        <button
                                            type="submit"
                                            class="footer-widget__newsletter-btn thm-btn">
                                            Send A Message
                                            <span>
                                                <i class="icon-right-arrow"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="result mt-5"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    $(document).on("submit", ".ajax_form", function(e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr("action");
        let method = form.attr("method") || "POST";
        let submitBtn = form.find('[type="submit"]');
        let noReset = form.hasClass("noReset");
        let formData = new FormData(this);

        form.find(".is-invalid").removeClass("is-invalid");
        form.find(".invalid-feedback").remove();
        form.find(".text-danger").removeClass('text-danger');
        form.find(".text-success").removeClass('text-success');
        form.find(".result").html('');
        submitBtn.prop("disabled", true);
        submitBtn.text("processing...");
        $.ajax({
            url: url,
            type: method,
            data: formData,
            processData: false,
            dataType:'JSON',
            contentType: false,
            success: function(response) {
                if (response.msg) {
                    $('.result').addClass('text-success');
                    $('.result').html(response.msg);
                }
                // Reset form after success
                if (!noReset) {
                    form[0].reset();
                }
            },

            error: function(xhr) {
                if (xhr.status === 500) {
                    $('.result').addClass('text-danger');
                    $('.result').html("Something went wrong. Try again later");
                }
                if (xhr.status === 422) {
                    let errors = xhr.responseJSON.errors;

                    $.each(errors, function(field, messages) {
                        let input = form.find(
                            '[name="' + field + '"], [name="' + field + '[]"]',
                        );

                        input.addClass("is-invalid");

                        input.after(
                            '<div class="invalid-feedback">' +
                            messages[0] +
                            "</div>",
                        );
                    });
                }
                else {
                    console.log(xhr);
                    $('.result').addClass('text-danger');
                    $('.result').html(xhr.statusText);
                }
            },
            complete: function() {
                submitBtn.prop("disabled", false);
                submitBtn.html(`Send A Message<span><i class="icon-right-arrow"></i></span>`);
                
            },
        });
    });
</script>
@endpush
@endsection