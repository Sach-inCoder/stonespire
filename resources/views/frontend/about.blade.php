@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>$aboutPage->banner_title])
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
                        src="{{$aboutPage->about_image}}"
                        class="about-main-image"
                        alt="Stonespire Graphics">
                    <!-- Play Button -->
                    <a href="javascript:void(0)"
                        class="about-play-btn"
                        aria-label="Watch Company Video">
                        <i class="fa-solid fa-play"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-content">
                    <div class="about-small-title">
                        {{$aboutPage->about_label}}
                    </div>
                    <div class="experience-title">
                        {{$aboutPage->about_tagline}}
                    </div>
                    <h2 class="about-title">
                        {{$aboutPage->about_title}}
                    </h2>
                    <p class="about-text">
                        {!! $aboutPage->about_description !!}
                    </p>
                    <p class="about-text">
                        {!! $aboutPage->about_description_2 !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@if (!$services->isEmpty())
<section class="about-section technology-section">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-tag justify-content-center">
                {{$aboutPage->technology_label}}
            </div>
            <h2 class="section-title">
                {{$aboutPage->technology_title}}
            </h2>
            <p class="section-text mx-auto" style="max-width:700px;">
                {{$aboutPage->technology_description}}
            </p>
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
            <div class="col-lg-4 col-md-6">
                <div class="tech-card">
                    <div class="tech-card-content">
                        <div class="tech-icon">
                            <i class="{{$service->icon}}"></i>
                        </div>
                        <h4>{{$service->name}}</h4>
                        <p>
                            {{$service->short_description}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@if (!$statistics->isEmpty())
<section class="stats-section">
    <div class="container">
        <div class="row">
            @foreach ($statistics as $stat)

            <div class="col-lg-3 col-6">
                <div class="stat-box">
                    <div class="stat-number">{{$stat->value}}</div>
                    <div class="stat-label">
                        {{$stat->label}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<section class="about-section vm-section">

    <div class="container">

        <div class="text-center mb-5">

            <div class="section-tag justify-content-center">
                {{$aboutPage->vm_label}}
            </div>

            <h2 class="section-title">
                <!-- Built on <span>Purpose & Values</span> -->
                {{$aboutPage->vm_title}}
            </h2>

        </div>


        <div class="row g-4">

            <!-- Vision -->
            <div class="col-lg-4">
                <div class="vm-card">

                    <div class="vm-number">01</div>

                    <div class="vm-icon">
                        <i class="fa-regular fa-eye"></i>
                    </div>

                    <h3>{{$aboutPage->vision_title}}</h3>

                    <p>
                        {!! $aboutPage->vision_description !!}
                    </p>

                </div>
            </div>


            <!-- Values -->
            <div class="col-lg-4">
                <div class="vm-card">

                    <div class="vm-number">02</div>

                    <div class="vm-icon">
                        <i class="fa-solid fa-handshake"></i>
                    </div>

                    <h3>{{$aboutPage->values_title}}</h3>

                    <p>
                        {!! $aboutPage->values_description !!}
                    </p>

                </div>
            </div>
            <!-- Mission -->
            <div class="col-lg-4">
                <div class="vm-card">

                    <div class="vm-number">03</div>

                    <div class="vm-icon">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>

                    <h3>{{$aboutPage->mission_title}}</h3>

                    <ul class="mission-list">
                        @foreach ($missions as $mission)
                        <li>
                            <i class="fa-solid fa-check"></i>
                            To produce world-class quality products
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section quality-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="quality-content">
                    <div class="section-tag">
                        {{$aboutPage->quality_label}}
                    </div>
                    <h2 class="section-title">
                        {{$aboutPage->quality_title}}
                    </h2>
                    <p class="section-text">
                        {!! $aboutPage->quality_description !!}
                    </p>
                    <p class="section-text">
                        {!! $aboutPage->quality_description_2 !!}
                    </p>
                    <div class="quality-point">
                        <div class="quality-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <div>
                            <h4>Research & Development</h4>
                            <p>
                                Continuous research and development of
                                new products while maintaining national
                                and international standards.
                            </p>
                        </div>
                    </div>
                    <div class="quality-point">
                        <div class="quality-icon">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div>
                            <h4>Quality Assurance</h4>
                            <p>
                                In-house testing and quality assurance
                                facilities help us maintain consistency,
                                reliability and performance.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="quality-visual">
                    <!-- Main Image -->
                    <img
                        src="{{$aboutPage->quality_image}}"
                        class="about-main-image"
                        alt="Stonespire Graphics">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-cta">
    <div class="container text-center">
        <h2>
            {{ $aboutPage->cta_title }}
        </h2>
        <p>
            {!! $aboutPage->cta_description !!}
        </p>
        <a href="contact" class="cta-btn">
            {{$aboutPage->cta_button_text}}
            <span>
                <i class="fa-solid fa-arrow-right"></i>
            </span>
        </a>
    </div>
</section>
@endsection