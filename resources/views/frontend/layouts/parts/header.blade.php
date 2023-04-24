<!-- main header -->
<header class="main-header">
    <!-- header-top -->
    <div class="header-top">
        <div class="top-inner clearfix">
            <div class="left-column pull-left">
                <ul class="info clearfix">
                    <li><i class="far fa-map-marker-alt"></i>Discover St, New York, NY 10012, USA</li>
                    <li><i class="far fa-clock"></i>Mon - Sat  9.00 - 18.00</li>
                    <li><i class="far fa-phone"></i><a href="tel:2512353256">+251-235-3256</a></li>
                </ul>
            </div>
            <div class="right-column pull-right">
                <ul class="social-links clearfix">
                    <li><a href="index.html"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-pinterest-p"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-google-plus-g"></i></a></li>
                    <li><a href="index.html"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
                <div class="sign-box">
                    @auth
                    <a href="{{route('admin')}}"><i class="fas fa-user"></i>Admin Area</a>
                    @else
                    <a href="{{route('login')}}"><i class="fas fa-user"></i>login</a>
                    @endauth
                    
                </div>
            </div>
        </div>
    </div>
    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img src="{{asset('/assets/images/logo.png')}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                {{-- <li class="current dropdown"><a href="index.html"><span>Home</span></a>
                                    <ul>
                                        <li><a href="index.html">Main Home</a></li>
                                        <li><a href="index-2.html">Home Modern</a></li>
                                        <li><a href="index-3.html">Home Map</a></li>
                                        <li><a href="index-4.html">Home Half Map</a></li>
                                        <li><a href="index-5.html">Home Agent</a></li>
                                        <li><a href="index-onepage.html">OnePage Home</a></li>
                                        <li><a href="index-rtl.html">RTL Home</a></li>
                                        <li class="dropdown"><a href="index.html">Header Style</a>
                                            <ul>
                                                <li><a href="index.html">Header Style 01</a></li>
                                                <li><a href="index-2.html">Header Style 02</a></li>
                                                <li><a href="index-3.html">Header Style 03</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}

                                <li><a href="/"><span>Home</span></a></li>

                                <li><a href="{{route('frontend.listings.index')}}"><span>Search Listing</span></a></li>

                                <li><a href="contact.html"><span>About Us</span></a></li>

                                <li><a href="contact.html"><span>Contact</span></a></li>
                                 
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="outer-box">
            <div class="main-box">
                <div class="logo-box">
                    <figure class="logo"><a href="/"><img src="{{asset('assets/images/logo.png')}}" alt=""></a></figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="btn-box">
                    <a href="index.html" class="theme-btn btn-one"><span>+</span>Add Listing</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

 <!-- Mobile Menu  -->
 <div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><a href="index.html"><img src="{{asset('/assets/images/logo-2.png')}}" alt="" title=""></a></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>Chicago 12, Melborne City, USA</li>
                <li><a href="tel:+8801682648101">+88 01682648101</a></li>
                <li><a href="mailto:info@example.com">info@example.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="index.html"><span class="fab fa-twitter"></span></a></li>
                <li><a href="index.html"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="index.html"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="index.html"><span class="fab fa-instagram"></span></a></li>
                <li><a href="index.html"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div><!-- End Mobile Menu -->
