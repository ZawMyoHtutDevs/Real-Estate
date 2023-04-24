@extends('frontend.layouts.app')
@section('style')
<style>
    .pagination li .page-link
{
    position: relative;
    display: inline-block;
    font-size: 15px;
    height: 50px;
    width: 50px;
    line-height: 30px;
    font-weight: 500;
    border: 1px solid #e5e7ec;
    background: #ffffff;
    text-align: center;
    color: #2d2929;
    border-radius: 5px;
    z-index: 1;
    transition: all 500ms ease;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #2dbe6c !important;
    border-color: #2dbe6c !important;
}
.filter_active a{
    color:#2dbe6c !important;
}
.filter_active a:before{
    border-color: #2dbe6c !important;
}
.filter_active a:after{
    background:  #2dbe6c !important;
}
.price_filter a{
    color: gray;
}
.price_filter a:hover{
    color:#2dbe6c !important;
}

</style>
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
                <li>Listings</li>
            </ul>
        </div>
    </div>
</section>
<!--End Page Title-->
@endsection
@section('content')
<!-- property-page-section -->
<section class="property-page-section property-grid">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="default-sidebar property-sidebar">
                    
                    <div class="category-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Type Of Property</h5>
                        </div>
                        <ul class="category-list clearfix">

                            @foreach ($types as $data)
                                <li class="
                                @if (request()->get('type','') == $data->id)
                                filter_active
                                @endif
                                "><a href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => $data->id, 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => request()->get('min_price',''), 'max_price' => request()->get('max_price',''), 'status' => request()->get('status','')])}}">{{$data->name}} </a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="category-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Category Of Property</h5>
                        </div>
                        <ul class="category-list clearfix">

                            @foreach ($categories as $data)
                                <li class="
                                @if (request()->get('category','') == $data->id)
                                filter_active
                                @endif
                                "><a href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => $data->id, 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => request()->get('min_price',''), 'max_price' => request()->get('max_price',''), 'status' => request()->get('status','')])}}">{{$data->name}} </a></li>
                            @endforeach

                        </ul>
                    </div>
                    
                    
                    <div class="filter-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Price Filter</h5>
                        </div>
                        <div class="list-group price_filter">
                            <a @if (request()->get('min_price','') == '100' && request()->get('max_price','500'))  style="color:#2dbe6c" @endif
                            href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '100', 'max_price' => '500', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action">
                                100 -> 500 Lakhs
                            </a>
                            <a  @if (request()->get('min_price','') == '500' && request()->get('max_price','1000'))  style="color:#2dbe6c" @endif
                            href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '500', 'max_price' => '1000', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action ">
                                500 -> 1000 Lakhs
                            </a>
                            <a @if (request()->get('min_price','') == '1000' && request()->get('max_price','2000'))  style="color:#2dbe6c" @endif
                             href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '1000', 'max_price' => '2000', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action ">
                                1000 -> 2000 Lakhs
                            </a>
                            <a @if (request()->get('min_price','') == '2000' && request()->get('max_price','5000'))  style="color:#2dbe6c" @endif href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '2000', 'max_price' => '5000', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action ">
                                2000 -> 5000 Lakhs
                            </a>
                            <a @if (request()->get('min_price','') == '5000' && request()->get('max_price','10000'))  style="color:#2dbe6c" @endif href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '5000', 'max_price' => '10000', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action ">
                                5000 -> 10000 Lakhs
                            </a>
                            <a @if (request()->get('min_price','') == '10000' && request()->get('max_price','9999999999')) style="color:#2dbe6c" @endif href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => '10000', 'max_price' => '9999999999', 'status' => request()->get('status','')])}}" class="list-group-item list-group-item-action ">
                                10000 -> Above
                            </a>
                        </div>

                    </div>
                    <div class="category-widget sidebar-widget">
                        <div class="widget-title">
                            <h5>Status Of Property</h5>
                        </div>
                        <ul class="category-list clearfix">
                            <li class="
                            @if (request()->get('status','') == 1)
                            filter_active
                            @endif
                            "><a href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => request()->get('min_price',''), 'max_price' => request()->get('max_price',''), 'status' => '1'])}}">Active </a></li>

                            <li class="
                            @if (request()->get('status','') == 0)
                            filter_active
                            @endif
                            "><a href="{{route('frontend.listings.index',['name' => request()->get('name',''), 'type' => request()->get('type',''), 'category' => request()->get('category',''), 'region' => request()->get('region',''), 'city' => request()->get('city',''), 'min_price' => request()->get('min_price',''), 'max_price' => request()->get('max_price',''), 'status' => '0'])}}">Inactive </a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="property-content-side">
                    <div class="item-shorting clearfix">
                        <div class="left-column pull-left">
                            <h5>Total: <span>{{$listings->count()}} Listings</span></h5>
                        </div>
                        <div class="right-column pull-right clearfix">
                            {{-- <div class="short-box clearfix">
                                <div class="select-box">
                                    <select class="wide">
                                       <option data-display="Sort by: Newest">Sort by: Newest</option>
                                       <option value="1">New Arrival</option>
                                       <option value="2">Top Rated</option>
                                       <option value="3">Offer Place</option>
                                       <option value="4">Most Place</option>
                                    </select>
                                </div>
                            </div> --}}
                            <div class="short-menu clearfix">
                                <button class="grid-view on"><i class="icon-36"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="wrapper grid">
                        
                        <div class="deals-grid-content grid-item">
                            <div class="row clearfix">
                                @foreach ($listings as $data)
                                <div class="col-lg-6 col-md-6 col-sm-12 feature-block">
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
                        </div>
                    </div>
                    <div class="pagination-wrapper">
                        {!! $listings->appends(array("name" => request()->get('name',''),"type" => request()->get('type',''),"category" => request()->get('category',''),"city" => request()->get('city',''), "status" => request()->get('status','') ))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- property-page-section end -->
@endsection

@section('script')
<script src="{{asset('/assets/js/product-filter.js')}}"></script>
@endsection