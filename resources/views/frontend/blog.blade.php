@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>$blog->title])
@push('styles')

@endpush
<section class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="blog-details__left">
                    <div class="blog-details__img">
                        <img src="{{asset($blog->image)}}" alt="">
                        <div class="blog-details__date">
                            <p>{{ $blog->published_at->format('d') }}<br>{{ $blog->published_at->format('M') }}</p>
                        </div>
                    </div>
                    <div class="blog-details__content">
                        <div class="blog-details__user-and-meta">
                            <div class="blog-details__user">
                                <p><span class="icon-user-1"></span>By Admin</p>
                            </div>
                            <ul class="blog-details__meta list-unstyled">
                                <li hidden>
                                    <a href="javascript:void(0)"><span class="fas fa-comments"></span>Comments (05)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"><span class="fas fa-clock"></span>{{$blog->read_time}} Min Read</a>
                                </li>
                            </ul>
                        </div>
                        <h3 class="blog-details__title">
                            {{ $blog->title }}
                        </h3>
                        <div class="blog_content">
                            {!! $blog->content !!}
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-lg-5">
                <div class="sidebar">

                    <!-- Search -->
                    <div hidden class="sidebar__single sidebar__search wow fadeInUp" data-wow-delay=".1s">
                        <form action="#" class="sidebar__search-form">
                            <input type="search" placeholder="Search Labels...">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <!-- End Search -->

                    <!-- Categories -->
                    <div hidden class="sidebar__single sidebar__category wow fadeInUp" data-wow-delay=".1s">
                        <h3 class="sidebar__title">Label Categories</h3>

                        <ul class="sidebar__category-list list-unstyled">
                            <li class="active">
                                <a href="javascript:void(0)">Self Adhesive Labels <span>(12)</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Barcode Labels <span>(08)</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Custom Labels <span>(15)</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Product Labels <span>(10)</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Packaging Labels <span>(09)</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Decorative Labels <span>(06)</span></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Categories -->

                    <!-- Recent Posts -->
                    <div class="sidebar__single sidebar__post mt-0 wow fadeInUp" data-wow-delay=".1s">
                        <h3 class="sidebar__title">Recent Posts</h3>

                        <div class="sidebar__post-box">
                            @foreach ($recentBlogs as $recent)
                            <div class="sidebar__post-single">
                                <div class="sidebar-post__img">
                                    <img src="{{asset($recent->image)}}"
                                        alt="Self Adhesive Labels">
                                </div>
                                <div class="sidebar__post-content-box">
                                    <h3>
                                        <a href="/blog/{{ $recent->slug }}">
                                            {{$recent->title}}
                                        </a>
                                    </h3>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End Recent Posts -->

                    <!-- Tags -->
                    <div class="sidebar__single sidebar__tags wow fadeInUp" data-wow-delay=".1s">
                        <h3 class="sidebar__title">Popular Tags</h3>

                        <ul class="sidebar__tags-list clearfix list-unstyled">
                            <li><a href="javascript:void(0)">Self Adhesive</a></li>
                            <li><a href="javascript:void(0)">Barcode</a></li>
                            <li><a href="javascript:void(0)">Custom Labels</a></li>
                            <li><a href="javascript:void(0)">Product Labels</a></li>
                            <li><a href="javascript:void(0)">Packaging</a></li>
                            <li><a href="javascript:void(0)">Sticker Labels</a></li>
                            <li><a href="javascript:void(0)">Branding</a></li>
                            <li><a href="javascript:void(0)">Printing</a></li>
                        </ul>
                    </div>
                    <!-- End Tags -->

                </div>
            </div>

            <!--End Sidebar-->
        </div>
    </div>
</section>
@endsection