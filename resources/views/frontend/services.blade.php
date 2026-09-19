@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>'Services'])
@push('styles')
<style>
.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #0d498c;
    border-color: #0d498c;
}
.page-link {
    color: #0d498c;
}
.sg-services-section {
    position: relative;
    padding: 90px 0;
    background:
        radial-gradient(circle at 10% 20%, rgba(13, 74, 141, 0.12), transparent 35%),
        radial-gradient(circle at 90% 80%, rgba(0, 180, 255, 0.10), transparent 35%),
        #f5f9fc;
    overflow: hidden;
}
.sg-services-heading {
    max-width: 850px;
    margin: 0 auto 55px;
}
.sg-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 2px;
    color: #0d4a8d;
    margin-bottom: 15px;
}

.sg-eyebrow span {
    width: 35px;
    height: 2px;
    background: #0d4a8d;
}

.sg-services-heading h2 {
    font-size: 44px;
    font-weight: 800;
    color: #172b4d;
    margin-bottom: 15px;
}

.sg-services-heading h2 span {
    color: #0d4a8d;
}

.sg-services-heading p {
    color: #667085;
    font-size: 16px;
    line-height: 1.8;
}

.sg-service-box {
    position: relative;
    height: 100%;
    overflow: hidden;

    background: rgba(255, 255, 255, 0.48);
    border: 1px solid rgba(255, 255, 255, 0.75);

    border-radius: 22px;

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 15px 40px rgba(13, 74, 141, 0.10),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);

    transition: all 0.4s ease;
}
.sg-service-box::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 60%;
    height: 100%;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,0.35),
        transparent
    );

    transform: skewX(-20deg);
    transition: 0.7s ease;
    z-index: 5;
    pointer-events: none;
}

.sg-service-box:hover::before {
    left: 130%;
}
.sg-service-box:hover {
    transform: translateY(-10px);

    background: rgba(255, 255, 255, 0.65);

    border-color: rgba(13, 74, 141, 0.25);

    box-shadow:
        0 25px 60px rgba(13, 74, 141, 0.18),
        inset 0 1px 0 rgba(255,255,255,0.9);
}

.sg-service-image {
    position: relative;
    height: 245px;
    overflow: hidden;
}

.sg-service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;

    transition: transform 0.6s ease;
}

.sg-service-box:hover .sg-service-image img {
    transform: scale(1.08);
}

.sg-image-overlay {
    position: absolute;
    inset: 0;

    background: linear-gradient(
        180deg,
        rgba(13, 74, 141, 0.02),
        rgba(13, 74, 141, 0.55)
    );

    z-index: 1;
}

.sg-number {
    position: absolute;
    top: 18px;
    left: 18px;
    z-index: 3;

    width: 48px;
    height: 48px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 14px;

    background: rgba(255,255,255,0.18);
    border: 1px solid rgba(255,255,255,0.45);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    color: #fff;
    font-size: 14px;
    font-weight: 800;

    box-shadow: 0 8px 25px rgba(0,0,0,0.12);
}
.sg-icon {
    position: absolute;
    right: 18px;
    bottom: 18px;
    z-index: 3;

    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: rgba(255,255,255,0.20);
    border: 1px solid rgba(255,255,255,0.5);

    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    color: #fff;
    font-size: 21px;

    box-shadow: 0 8px 25px rgba(0,0,0,0.15);

    transition: all 0.4s ease;
}

.sg-service-box:hover .sg-icon {
    transform: rotate(-5deg) scale(1.08);
}

.sg-service-content {
    padding: 28px 26px 30px;
}

.sg-service-content h3 {
    font-size: 21px;
    font-weight: 750;
    color: #172b4d;
    margin-bottom: 12px;
}

.sg-service-content p {
    font-size: 14px;
    line-height: 1.75;
    color: #667085;
    margin-bottom: 20px;
}

.sg-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 7px;
    margin-bottom: 23px;
}

.sg-tags span {
    display: inline-flex;
    align-items: center;

    padding: 7px 11px;

    border-radius: 30px;

    background: rgba(13, 74, 141, 0.07);
    border: 1px solid rgba(13, 74, 141, 0.12);

    color: #0d4a8d;

    font-size: 10px;
    font-weight: 700;
    letter-spacing: .5px;
}

.sg-service-arrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    color: #0d4a8d;
    font-size: 13px;
    font-weight: 700;

    text-decoration: none;

    transition: all 0.3s ease;
}

.sg-service-arrow i {
    transition: transform 0.3s ease;
}

.sg-service-arrow:hover {
    color: #06345f;
}

.sg-service-arrow:hover i {
    transform: translateX(6px);
}

.sg-services-cta {
    margin-top: 50px;

    padding: 25px 30px;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;

    border-radius: 22px;

    background: rgba(255,255,255,0.48);

    border: 1px solid rgba(255,255,255,0.8);

    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);

    box-shadow:
        0 15px 40px rgba(13,74,141,0.10),
        inset 0 1px 0 rgba(255,255,255,0.8);
}

.sg-cta-left {
    display: flex;
    align-items: center;
    gap: 18px;
}

.sg-cta-icon {
    width: 55px;
    height: 55px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: rgba(13,74,141,0.10);
    border: 1px solid rgba(13,74,141,0.15);

    color: #0d4a8d;
    font-size: 20px;
}

.sg-cta-left h4 {
    margin: 0 0 5px;
    color: #172b4d;
    font-size: 18px;
    font-weight: 750;
}

.sg-cta-left p {
    margin: 0;
    color: #667085;
    font-size: 13px;
}

.sg-services-cta > a {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 13px 22px;

    border-radius: 12px;

    background: #0d4a8d;
    color: #fff;

    text-decoration: none;
    font-size: 13px;
    font-weight: 700;

    transition: all 0.3s ease;
}

.sg-services-cta > a:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(13,74,141,0.25);
}
@media (max-width: 767px) {

    .sg-services-section {
        padding: 65px 0;
    }

    .sg-services-heading h2 {
        font-size: 32px;
    }

    .sg-services-heading p {
        font-size: 14px;
    }

    .sg-service-image {
        height: 220px;
    }

    .sg-service-content {
        padding: 23px 20px 25px;
    }

    .sg-services-cta {
        flex-direction: column;
        align-items: flex-start;
        padding: 22px;
    }

    .sg-services-cta > a {
        width: 100%;
        justify-content: center;
    }

}
</style>
@endpush
<section class="sg-services-section">
    <div class="container">
        <!-- Heading -->
        <div class="sg-services-heading text-center">
            <div class="sg-eyebrow">
                <span></span>
                OUR SERVICES
                <span></span>
            </div>
            <h2>
                Eight Technologies.
                <span>One Partner.</span>
            </h2>
            <p>
                From precision printing to advanced labeling and industrial
                solutions, we combine technology, expertise and quality to
                deliver dependable solutions for every requirement.
            </p>
        </div>
        
        @if (!$services->isEmpty())
        <div class="row g-4">
            <!-- 01 Screen Printing -->
            @foreach ($services as $key=>$serv)
            <div class="col-xl-4 col-md-6">
                <div class="sg-service-box">
                    <div class="sg-service-image">
                        <img src="{{$serv->image}}"
                            alt="Screen Printing">
                        <div class="sg-number">{{ sprintf('%02d', $key + 1) }}</div>
                        <div class="sg-image-overlay"></div>
                        <div class="sg-icon">
                            <i class="{{$serv->icon}}"></i>
                        </div>
                    </div>
                    <div class="sg-service-content">
                        <h3>{{$serv->name}}</h3>
                        <p>
                            {!!$serv->short_description!!}
                        </p>
                        <div class="sg-tags">
                            @foreach ($serv->tags as $tag)
                            <span>{{$tag->name}}</span>
                            @endforeach
                            <!-- <span>PANEL OVERLAYS</span> -->
                            <!-- <span>DOME STICKERS</span> -->
                        </div>
                        <a href="contact" class="sg-service-arrow">
                            Explore Service
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-links my-3">
            {{ $services->links() }}
        </div>
        @else
        <div class="sg-services-heading text-center">
            <p>No results founded. Stay tuned.</p>
        </div>
        @endif
        <!-- Bottom CTA -->
        <div class="sg-services-cta">
            <div class="sg-cta-left">
                <div class="sg-cta-icon">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <div>
                    <h4>Need a Customized Solution?</h4>
                    <p>
                        Tell us your requirement and our team will help you
                        find the right printing solution.
                    </p>
                </div>
            </div>
            
            <a href="contact">
                Get In Touch
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>
@endsection