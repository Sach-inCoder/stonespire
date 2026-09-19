@extends('frontend.layouts.app')
@section('content')
@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
@endpush
@include('frontend.partials.pageHeader',['title'=>'Gallery'])
<section class="st-gallery-page">
    <div class="container">
        <!-- Heading -->
        <div class="st-gallery-heading">
            <div class="st-section-label">
                <span></span>
                OUR GALLERY
                <span></span>
            </div>
            <h1>
                Our Work in
                <strong>Print &amp; Precision</strong>
            </h1>
            <p>
                Explore our printing solutions, labeling products,
                manufacturing capabilities and finished products.
            </p>
        </div>
        <!-- Filter -->
        <div class="st-gallery-filter">
            <button class="active" data-filter="all">
                All
            </button>
            <button data-filter="printing">
                Printing
            </button>
            <button data-filter="labels">
                Labels
            </button>
            <button data-filter="industrial">
                Industrial
            </button>
            <button data-filter="products">
                Products
            </button>
        </div>
        <!-- Gallery -->
        <div class="st-gallery-grid">
            @foreach ($galleries as $item)
            <div class="st-gallery-item printing" data-filter="{{ $item->category }}">
                <a href="{{asset($item->image)}}"
                    class="st-gallery-lightbox glightbox">
                    <img src="{{asset($item->image)}}" class=""
                        alt="{{$item->title}}">
                    <div class="st-gallery-overlay">
                        <div class="st-gallery-icon">
                            <i class="fa-solid fa-plus"></i>
                        </div>
                        <h4>{{$item->title}}</h4>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="pagination-links my-3">
            {{ $galleries->links() }}
        </div>
    </div>
</section>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox({ selector: '.glightbox' });
</script>
<script>
    $('.st-gallery-filter button').on('click', function(e) {
        $('.st-gallery-filter button').removeClass('active');
        $(this).addClass('active');
        let filter = $(this).attr('data-filter');
        if (filter === 'all') {
            $('.st-gallery-item').removeAttr('hidden');
        } else {
            $('.st-gallery-item').attr('hidden', '');
            $(`.st-gallery-item[data-filter="${filter}"]`).removeAttr('hidden');
        }
    });
</script>
@endpush
@endsection