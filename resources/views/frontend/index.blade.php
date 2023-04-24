@extends('frontend.layouts.app')
@section('style')
<style>
    .form-control{
        height: calc(2em + 0.75rem + 5px) !important;
    }
</style>
@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<!-- banner-section -->
<section class="banner-section" style="background-image: url(assets/images/banner/banner-1.jpg);">
    <div class="auto-container">
        <div class="inner-container">
            <div class="content-box centred">
                <h2>Real Estate in Myanmar</h2>
                <p>Amet consectetur adipisicing elit sed do eiusmod.</p>
            </div>
            <div class="search-field">
                <div class="tabs-box">
                    <div class="tab-btn-box">
                        <ul class="tab-btns tab-buttons centred clearfix">
                            <li class="tab-btn active-btn" data-tab="#tab-1">Search</li>
                        </ul>
                    </div>
                    <div class="tabs-content info-group">
                        <div class="tab active-tab" id="tab-1">
                            <div class="inner-box">
                                <form action="{{route('frontend.listings.index')}}" method="get" >
                                <div class="top-search">
                                    <div class="search-form">
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-12 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>Search Property</label>
                                                    <div class="field-input">
                                                        <i class="fas fa-search"></i>
                                                        <input type="search" name="name" placeholder="Search by Property, Location or Landmark..." >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                
                                                <div class="form-group">
                                                    <label>Region</label>
                                                        <select class="form-control" id="region-dropdown" name="region">
                                                           <option value="">Select Region</option>

                                                           @foreach ($regions as $data)
                                                           <option value="{{$data->id}}">{{$data->name}}</option>
                                                           @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                    <label>City</label>
                                                        <select class="form-control" id="city-dropdown" name="city">
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="search-btn">
                                            <button type="submit"><i class="fas fa-search"></i>Search</button>
                                        </div>
                                </div>
                                </div>
                                <div class="switch_btn_one ">
                                    <button class="nav-btn nav-toggler navSidebar-button clearfix search__toggler">Advanced Search<i class="fas fa-angle-down"></i></button>
                                    <div class="advanced-search">
                                        <div class="close-btn">
                                            <a href="#" class="close-side-widget"><i class="far fa-times"></i></a>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                  <label for="">Type</label>
                                                  <select class="form-control" name="type" id="">
                                                    <option value="">Select Type</option>
                                                    @foreach ($types as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                  <label for="">Categories</label>
                                                  <select class="form-control" name="category" id="">
                                                    <option value="">Select Category</option>
                                                    @foreach ($categories as $data)
                                                    <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 col-md-6 col-sm-12 column">
                                                <div class="form-group">
                                                  <label for="">Status</label>
                                                  <select class="form-control" name="status" id="">
                                                    <option value="">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                  </select>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->
@endsection
@section('content')
<!-- category-section -->
<section class="category-section centred">
    <div class="auto-container">
        <div class="inner-container wow slideInLeft animated" data-wow-delay="00ms" data-wow-duration="1500ms">
            <ul class="category-list clearfix">
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-1"></i></div>
                            <h5>လုံးချင်အိမ်</h5>
                            
                        </div>
                    </div>
                </li>
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-2"></i></div>
                            <h5>ကွန်ဒို</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-3"></i></div>
                            <h5>တိုက်ခန်း</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-4"></i></div>
                            <h5>စက်မှုဇုန်</h5>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="category-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-5"></i></div>
                            <h5>ဟိုတယ်</h5>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="more-btn"><a href="{{route('frontend.listings.index')}}" class="theme-btn btn-one">All Categories</a></div>
        </div>
    </div>
</section>
<!-- category-section end -->


<!-- feature-section -->
<section class="feature-section sec-pad bg-color-1">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Features</h5>
            <h2>Featured Property</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            
            @foreach ($listings_lat as $data)
                                <div class="col-lg-4 col-md-6 col-sm-12 feature-block">
                                    <div class="feature-block-one">
                                        <div class="inner-box">
                                            <div class="image-box">
                                                <figure class="image">
                                                    @if ($data->asset != '')
                                                    <img src="{{asset('listing_photos/'.$data->asset)}}" alt="">
                                                    @else
                                                    <img src="{{asset('assets/demo.jpg')}}" alt="">
                                                    @endif
                                                    
                                                </figure>
                                                @if ($data->status)
                                                <span class="category">Active</span>
                                                @else
                                                <span class="category bg-danger">Inactive</span>
                                                @endif
                                            </div>
                                            <div class="lower-content">
                                                <div class="author-info clearfix">
                                                    <div class="author pull-left">
                                                        <figure class="author-thumb"><img src="{{asset('user_photos/'.$data->user->asset)}}" alt=""></figure>
                                                        <h6>{{$data->user->name ?? 'Deleted User'}}</h6>
                                                    </div>
                                                    <div class="buy-btn pull-right"><a href="property-details.html">{{$data->type->name}}</a></div>
                                                </div>
                                                <div class="title-text"><h4><a href="{{route('frontend.listings.show', $data->id)}}">{{$data->name}}</a></h4></div>
                                                <div class="price-box clearfix">
                                                    <div class="price-info pull-left">
                                                        <h6>Start From</h6>
                                                        <h4>{{$data->price}} Lakhs</h4>
                                                    </div>
                                                    <ul class="other-option pull-right clearfix">
                                                        {{-- <li><a href="property-details.html"><i class="icon-12"></i></a></li> --}}
                                                        <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="btn-box"><a href="{{route('frontend.listings.show', $data->id)}}" class="theme-btn btn-two">See Details</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
        </div>
        <div class="more-btn centred"><a href="property-list.html" class="theme-btn btn-one">View All Listing</a></div>
    </div>
</section>
<!-- feature-section end -->


{{-- <!-- testimonial-section end -->
<section class="testimonial-section bg-color-1 centred">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Testimonials</h5>
            <h2>What They Say About Us</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-1.jpg" alt=""></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Rebeka Dawson</h4>
                        <span class="designation">Instructor</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-2.jpg" alt=""></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Marc Kenneth</h4>
                        <span class="designation">Founder CEO</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-block-one">
                <div class="inner-box">
                    <figure class="thumb-box"><img src="assets/images/resource/testimonial-1.jpg" alt=""></figure>
                    <div class="text">
                        <p>Our goal each day is to ensure that our residents’ needs are not only met but exceeded. To make that happen we are committed to provid ing an environment in which residents can enjoy.</p>
                    </div>
                    <div class="author-info">
                        <h4>Owen Lester</h4>
                        <span class="designation">Manager</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- testimonial-section end --> --}}


<!-- chooseus-section -->
<section class="chooseus-section" >
    <div class="auto-container" >
        <div class="inner-container bg-color-2" style="margin-top: -70px;">
            <div class="upper-box clearfix">
                <div class="sec-title light">
                    <h5>Why Choose Us?</h5>
                    <h2>Reasons To Choose Us</h2>
                </div>
                <div class="btn-box">
                    <a href="categories.html" class="theme-btn btn-one">All Categories</a>
                </div>
            </div>
            <div class="lower-box">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-19"></i></div>
                                <h4>Excellent Reputation</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-26"></i></div>
                                <h4>Best Local Agents</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                        <div class="chooseus-block-one">
                            <div class="inner-box">
                                <div class="icon-box"><i class="icon-21"></i></div>
                                <h4>Personalized Service</h4>
                                <p>Lorem ipsum dolor sit consectetur sed eiusm tempor.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- chooseus-section end -->


<!-- place-section -->
<section class="place-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>Top Places</h5>
            <h2>Most Popular Places</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="sortable-masonry">
            <div class="items-container row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration brand marketing software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/place-1.jpg" alt=""></figure>
                            <div class="text">
                                <h4><a href="categories.html">Los Angeles</a></h4>
                                <p>10 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all brand illustration print software logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/place-2.jpg" alt=""></figure>
                            <div class="text">
                                <h4><a href="categories.html">San Francisco</a></h4>
                                <p>08 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 masonry-item small-column all illustration marketing logo">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/place-3.jpg" alt=""></figure>
                            <div class="text">
                                <h4><a href="categories.html">Las Vegas</a></h4>
                                <p>29 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12 masonry-item small-column all brand marketing print software">
                    <div class="place-block-one">
                        <div class="inner-box">
                            <figure class="image-box"><img src="assets/images/resource/place-4.jpg" alt=""></figure>
                            <div class="text">
                                <h4><a href="categories.html">New York City</a></h4>
                                <p>05 Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- place-section end -->

{{-- 
<!-- team-section -->
<section class="team-section sec-pad centred bg-color-1">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-1.png);"></div>
    <div class="auto-container">
        <div class="sec-title">
            <h5>Our Agents</h5>
            <h2>Meet Our Excellent Agents</h2>
        </div>
        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none nav-style-one">
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/team/team-1.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Merrie Lewis</a></h4>
                            <span class="designation">Senior Agent</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/team/team-2.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Parks Missie</a></h4>
                            <span class="designation">Senior Agent</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/team/team-3.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Mariana Buenos</a></h4>
                            <span class="designation">Senior Agent</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/team/team-4.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Stephen Fowler</a></h4>
                            <span class="designation">Senior Agent</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-block-one">
                <div class="inner-box">
                    <figure class="image-box"><img src="assets/images/team/team-5.jpg" alt=""></figure>
                    <div class="lower-content">
                        <div class="inner">
                            <h4><a href="agents-details.html">Daisy Phillips</a></h4>
                            <span class="designation">Senior Agent</span>
                            <ul class="social-links clearfix">
                                <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- team-section end -->


<!-- cta-section -->
<section class="cta-section bg-color-2">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-2.png);"></div>
    <div class="auto-container">
        <div class="inner-box clearfix">
            <div class="text pull-left">
                <h2>Looking to Buy a New Property or <br />Sell an Existing One?</h2>
            </div>
            <div class="btn-box pull-right">
                <a href="property-details.html" class="theme-btn btn-three">Rent Properties</a>
                <a href="index.html" class="theme-btn btn-one">Buy Properties</a>
            </div>
        </div>
    </div>
</section>
<!-- cta-section end -->


<!-- news-section -->
<section class="news-section sec-pad">
    <div class="auto-container">
        <div class="sec-title centred">
            <h5>News & Article</h5>
            <h2>Stay Update With Realshed</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing sed do eiusmod tempor incididunt <br />labore dolore magna aliqua enim.</p>
        </div>
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img src="assets/images/news/news-1.jpg" alt=""></a></figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Including Animation In Your Design System</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/news/author-1.jpg" alt=""></figure>
                                    <h5><a href="blog-details.html">Eva Green</a></h5>
                                </li>
                                <li>April 10, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img src="assets/images/news/news-2.jpg" alt=""></a></figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">Taking The Pattern Library To The Next Level</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/news/author-2.jpg" alt=""></figure>
                                    <h5><a href="blog-details.html">George Clooney</a></h5>
                                </li>
                                <li>April 09, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-one wow fadeInUp animated" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="blog-details.html"><img src="assets/images/news/news-3.jpg" alt=""></a></figure>
                            <span class="category">Featured</span>
                        </div>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">How New Font Technologies Will Improve The Web</a></h4>
                            <ul class="post-info clearfix">
                                <li class="author-box">
                                    <figure class="author-thumb"><img src="assets/images/news/author-3.jpg" alt=""></figure>
                                    <h5><a href="blog-details.html">Simon Baker</a></h5>
                                </li>
                                <li>April 28, 2020</li>
                            </ul>
                            <div class="text">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing sed.</p>
                            </div>
                            <div class="btn-box">
                                <a href="blog-details.html" class="theme-btn btn-two">See Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- news-section end --> --}}


<!-- download-section -->
<section class="download-section bg-color-3">
    <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-3.png);"></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                <div class="image-box">
                    <figure class="image image-1 wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms"><img src="assets/images/resource/download-1.png" alt=""></figure>
                    <figure class="image image-2 wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms"><img src="assets/images/resource/download-2.png" alt=""></figure>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                <div class="content_block_1">
                    <div class="content-box">
                        <span>Download</span>
                        <h2>Download Our Android and IOS App for Experience</h2>
                        <div class="download-btn">
                            <a href="index.html" class="app-store">
                                <i class="fab fa-apple"></i>
                                <p>Download on</p>
                                <h4>App Store</h4>
                            </a>
                            <a href="index.html" class="google-play">
                                <i class="fab fa-google-play"></i>
                                <p>Get It On</p>
                                <h4>Google Play</h4>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- download-section end -->

@endsection

@section('script')
<script>
     $(document).ready(function () {
        $('#region-dropdown').on('change', function () {
                var idRegion = this.value;
                $("#city-dropdown").html('hi');
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
                    },
                    url: "{{route('api.cities')}}",
                    type: "POST",
                    data: {
                        region_id: idRegion,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (res) {
                        $('#city-dropdown').html('<option value="">-- Select City --</option>');
                        $.each(res.cities, function (key, value) {
                            $("#city-dropdown").append('<option value="' + value
                                .id + '">' + value.name + '</option>');
                        });
                    }
                });
            });

     });
</script>
@endsection