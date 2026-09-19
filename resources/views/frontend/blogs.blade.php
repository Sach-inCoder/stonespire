@extends('frontend.layouts.app')
@section('content')
@include('frontend.partials.pageHeader',['title'=>'Blogs'])
@push('styles')

@endpush
<section class="blog-page">
    <div class="container">
        <div class="row">
            <!-- Blog 01 -->
             @foreach ($blogs as $blog)
             <div class="col-xl-4 col-lg-6 col-md-6">
                 <div class="blog-two__single">
 
                     <div class="blog-two__img">
                         <img src="{{asset($blog->image)}}"
                              alt="{{$blog->title}}">
 
                         <div class="blog-two__plus">
                             <a href="blog-details.html">
                                 <i class="icon-plus"></i>
                             </a>
                         </div>
 
                         <div class="blog-two__tag">
                             <a href="blog-details.html">
                                {{ $blog->category }}
                             </a>
                         </div>
                     </div>
 
                     <div class="blog-two__content">
 
                         <ul class="blog-two__meta list-unstyled">
                             <li>
                                 <a href="blog-details.html">
                                     <span class="fas fa-calendar-alt"></span>
                                     {{ $blog->published_at->format('M d, Y') }}
                                 </a>
                             </li>
 
                             <li>
                                 <a href="blog-details.html">
                                     <span class="fas fa-comments"></span>
                                     Comment
                                 </a>
                             </li>
                         </ul>
 
                         <h3 class="blog-two__title">
                             <a href="blog/{{ $blog->slug }}">
                                {{$blog->title}}
                             </a>
                         </h3>
 
                         <div class="blog-two__author-and-btn">
 
                             <div class="blog-two__author-info">
 
                              
 
                                 <div class="blog-two__author-content">
                                     <h5>{{$blog->author}}</h5>
                                     <p>{{ $blog->published_at->format('M d, Y') }}</p>
                                 </div>
 
                             </div>
 
                             <div class="blog-two__arrow-box">
                                 <a href="blog/{{ $blog->slug }}"
                                    class="blog-two__arrow">
                                     <span class="icon-right-arrow"></span>
                                 </a>
                             </div>
 
                         </div>
 
                     </div>
                 </div>
             </div>
             @endforeach
            <!-- Pagination -->
            <div class="pagination-links my-3">
                {{ $blogs->links() }}
            </div>
            <div class="blog-list__pagination" hidden>

                <ul class="pg-pagination list-unstyled">

                    <li class="count active">
                        <a href="#">1</a>
                    </li>

                    <li class="count">
                        <a href="#">2</a>
                    </li>

                    <li class="count">
                        <a href="#">3</a>
                    </li>

                    <li class="next">
                        <a href="#" aria-label="Next">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </div>
</section>
@endsection