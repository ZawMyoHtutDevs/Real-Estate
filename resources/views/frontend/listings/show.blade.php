@extends('frontend.layouts.app')
@section('style')

@endsection

{{-- Breadcrumb Data Here --}}
@section('breadcrumb')
<!--Page Title-->
<section class="page-title-two bg-color-1 centred">
    <div class="pattern-layer">
        <div class="pattern-1" style="background-image: url({{asset('/assets/images/shape/shape-9.png')}});"></div>
        <div class="pattern-2" style="background-image: url({{asset('/assets/images/shape/shape-10.png')}});"></div>
    </div>
    <div class="auto-container">
        <div class="content-box clearfix">
            <h1>Listings</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('frontend.listings.index')}}">Listing</a></li>
                <li>{{$listing->name}}</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
@endsection
@section('content')
<!-- property-details -->



<section class="property-details property-details-one">
    <div class="auto-container">

        {{-- Success message --}}
@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    {{ Session::get('success') }}
</div>
@endif


        <div class="top-details clearfix">
            <div class="left-column pull-left clearfix">
                <h3>{{$listing->name}}</h3>
                <div class="author-info clearfix">
                    <h6>{{$listing->region->name}}</h6>
                    {{-- <div class="author-box pull-left">
                        
                        
                    </div> --}}
                </div>
            </div>
            <div class="right-column pull-right clearfix">
                <div class="price-inner clearfix">
                    <ul class="category clearfix pull-left">
                        <li><a href="property-details.html">{{$listing->category->name ?? 'null'}}</a></li>
                        <li><a href="property-details.html">{{$listing->type->name ?? 'null'}}</a></li>
                    </ul>
                    <div class="price-box pull-right">
                        <h3>{{$listing->price}} Lakhs</h3>
                    </div>
                </div>
                <ul class="other-option pull-right clearfix">
                    <li><a href="property-details.html"><i class="icon-37"></i></a></li>
                    <li><a href="property-details.html"><i class="icon-38"></i></a></li>
                    <li><a href="property-details.html"><i class="icon-13"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-details-content">
                    <div class="carousel-inner">
                        <div class="single-item-carousel owl-carousel owl-theme owl-dots-none">
                            @if ($listing->asset != '')
                            <figure class="image-box"><img src="{{asset('listing_photos/'.$listing->asset)}}" alt=""></figure>
                            @foreach ($listing->images as $data)
                            <figure class="image-box"><img src="{{asset('listing_photos/gallery/'.$data->asset)}}" alt=""></figure>
                            @endforeach
                            
                            @endif
                        </div>
                    </div>
                    <div class="discription-box content-widget">
                        <div class="title-box">
                            <h4>Property Description</h4>
                        </div>
                        <div class="text">
                            {!! $listing->description !!}
                        </div>
                    </div>
                    <div class="details-box content-widget">
                        <div class="title-box">
                            <h4>Property Details</h4>
                        </div>
                        <ul class="list clearfix">
                            @foreach ($listing->att_values as $data)
                            <li>{{$data->attribute->name}}: <span>{{$data->value}}</span></li>
                            @endforeach
                            
                        </ul>
                    </div>
                    
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="property-sidebar default-sidebar">
                    <div class="author-widget sidebar-widget">
                        <div class="author-box">
                            <figure class="author-thumb"><img src="{{asset('user_photos/'.$listing->user->asset)}}" alt=""></figure>
                            <div class="inner">
                                <h4>{{$listing->user->name}}</h4>
                                <ul class="info clearfix">
                                    {{-- <li><i class="fas fa-map-marker-alt"></i>{{$listing->user->address}}</li> --}}
                                    <li><i class="fas fa-phone"></i><a href="tel:{{$listing->user->phone}}">{{$listing->user->phone}}</a></li>
                                </ul>
                                <div class="btn-box"><a href="tel:{{$listing->user->phone}}">Call Now</a></div>
                            </div>
                        </div>
                        <div class="form-inner">
                            <form action="{{route('frontend.contact.store',$listing->id)}}" method="post" class="default-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="contact_info" placeholder="Your Contact Info eg(phone or email)" required="">
                                </div>
                                <div class="form-group">
                                    <textarea name="description" placeholder="Message"></textarea>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn btn-one">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-details end -->


@endsection

@section('script')
<script src="{{asset('/assets/js/product-filter.js')}}"></script>
@endsection