@extends('layouts.app')
@section('content')
    <!-- Banner Section -->
    <section class="banner-section banner-one">

        <div class="banner-carousel owl-theme owl-carousel owl-loaded owl-drag">
           
            <div class="owl-stage-outer">
                <div class="owl-stage"
                    style="transform: translate3d(-4228px, 0px, 0px); transition: all 0s ease 0s; width: 14798px;">
                    @foreach ($banners as $item)
                    <div class="owl-item cloned" style="width: 2114px;">
                        <div class="slide-item">
                            <div class="image-layer" style="background-image: url({{ asset($item->image) }});">
                            </div>
                            <div class="auto-container">
                                <div class="content-box">
                                    <div class="content">
                                        {!! $item->description !!}
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                 
                   
                </div>
            </div>
            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><span
                        class="icon fa fa-angle-left"></span>
                    <p>Prev</p>
                </button><button type="button" role="presentation" class="owl-next">
                    <p>Next</p><span class="icon fa fa-angle-right"></span>
                </button></div>
            <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                    role="button" class="owl-dot"><span></span></button><button role="button"
                    class="owl-dot"><span></span></button></div>
        </div>
    </section>
    <!--End Banner Section -->



    <section class="about_one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="about1_img">
                        <div class="about1_shape_1"></div>
                        <img src="{{ asset('images/about-1-img-1.jpg') }} " alt="About-Img">
                        <div class="about1_icon-box">
                            <div class="circle">
                                <span class="icon-focus"></span>
                            </div>
                        </div>
                        <div class="about_img_2">
                            <img src="{{ asset('images/about-1-img-2.jpg') }} " alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="block-title text-left">
                        <p>About agriculture</p>
                        <h3>We’re leader in agriculture market</h3>
                        <div class="leaf">
                            <img src="{{ asset('images/leaf.png') }} " alt="">
                        </div>
                    </div>
                    <div class="about_content">
                        <div class="text">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which
                                don't look even slightly believable.</p>
                        </div>
                        <div class="about1_icon_wrap">
                            <div class="about1_icon_single">
                                <div class="about1_icon">
                                    <span class="icon-harvest"></span>
                                </div>
                                <p>Growing Fruits and Vegetables</p>
                            </div>
                            <div class="about1_icon_single">
                                <div class="about1_icon">
                                    <span class="icon-temperature"></span>
                                </div>
                                <p>Tips for Ripening your Fruits</p>
                            </div>
                        </div>
                        <div class="bottom_text">
                            <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything embarrassing hidden in the middle of text.</p>
                        </div>
                        <div class="about1__button-block">
                            <a href="about.html" class="thm-btn about_one__btn">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service_one">
        <div class="container">
            <div class="block-title text-center">
                <p>What we do</p>
                <h3>Services We Offer</h3>
                <div class="leaf">
                    <img src="{{ asset('images/leaf.png') }} " alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="service_1_single wow fadeInUp" style="visibility: hidden; animation-name: none;">
                        <div class="content">
                            <h3>Fresh<br>vegetables</h3>
                            <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                        </div>
                        <div class="service_1_img">
                            <img src="{{ asset('images/service-1-img-1.jpg') }} " alt="Service Image">
                            <div class="hover_box">
                                <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="service_1_single wow fadeInUp" data-wow-delay="300ms"
                        style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                        <div class="content">
                            <h3>Fresh<br>vegetables</h3>
                            <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                        </div>
                        <div class="service_1_img">
                            <img src="{{ asset('images/service-1-img-2.jpg') }} " alt="Service Image">
                            <div class="hover_box">
                                <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="service_1_single wow fadeInUp" data-wow-delay="600ms"
                        style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                        <div class="content">
                            <h3>Fresh<br>vegetables</h3>
                            <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                        </div>
                        <div class="service_1_img">
                            <img src="{{ asset('images/service-1-img-3.jpg') }} " alt="Service Image">
                            <div class="hover_box">
                                <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                    <div class="service_1_single wow fadeInUp" data-wow-delay="900ms"
                        style="visibility: hidden; animation-delay: 900ms; animation-name: none;">
                        <div class="content">
                            <h3>Fresh<br>vegetables</h3>
                            <p>Lorem ipsum is simply are many variations of pass of majority.</p>
                        </div>
                        <div class="service_1_img">
                            <img src="{{ asset('images/service-1-img-4.jpg') }} " alt="Service Image">
                            <div class="hover_box">
                                <a href="service-detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="brand-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="brand-one-carousel owl-carousel owl-loaded owl-drag">
                        <div class="owl-stage-outer">
                            <div class="owl-stage"
                                style="transform: translate3d(-2106px, 0px, 0px); transition: all 0.8s ease 0s; width: 4680px;">
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-1.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-2.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-3.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-4.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-5.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-1.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-2.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-3.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-4.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-5.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-1.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-2.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-3.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item active" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-4.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-5.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-1.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-2.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-3.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-4.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                                <div class="owl-item cloned" style="width: 234px;">
                                    <div class="single_brand_item">
                                        <a href="#"><img src="{{ asset('images/brand-1-5.png') }} "
                                                alt="brand"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                                    aria-label="Previous">‹</span></button><button type="button" role="presentation"
                                class="owl-next"><span aria-label="Next">›</span></button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="featured-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 wow slideInLeft" data-wow-delay="100ms"
                    style="visibility: hidden; animation-delay: 100ms; animation-name: none;">
                    <div class="single_featured_box">
                        <img src="{{ asset('images/featured-leaf.png') }} " alt=""><span>We Sale Best Agriculture
                            Products</span><img src="{{ asset('images/featured-leaf.png') }} " alt="">
                    </div>
                </div>
                <div class="col-xl-6 wow slideInRight" data-wow-delay="100ms"
                    style="visibility: hidden; animation-delay: 100ms; animation-name: none;">
                    <div class="single_featured_box">
                        <img src="{{ asset('images/featured-leaf.png') }} " alt=""><span>We’ve 40 years
                            experience
                            in field</span><img src="{{ asset('images/featured-leaf.png') }} " alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-one" style="background-image:url({{ asset("images/video-bg-1.jpg") }});">
        <div class="container text-center">
            <a href="https://www.youtube.com/watch?v=i9E_Blai8vk" class="video-one__btn video-popup"><i
                    class="fa fa-play"></i></a>
            <p>Modern agriculture types</p>
            <h3>Agriculture matters to the<br>future of development</h3>
        </div>
    </section>

    <section class="testimonials-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonials_one_left">
                        <div class="block-title text-left">
                            <p>testimonails</p>
                            <h3>What our customers are<br>talking about</h3>
                            <div class="leaf">
                                <img src="{{ asset('images/leaf.png') }} " alt="">
                            </div>
                        </div>
                        <div class="testimonials_one_text">
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                suffered alteration in some form, by injected humour, or randomised words which
                                don't look even slightly believable.</p>
                        </div>
                        <div class="project_counted wow fadeInUp" data-wow-delay="300ms"
                            style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                            <div class="icon_box">
                                <span class="icon-farmer"></span>
                            </div>
                            <div class="project-content">
                                <h3 class="counter">4,850000</h3>
                                <p>Agriculture projects are completed</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="testimonials_one_content">
                        <div class="testimonials_one_carousel owl-theme owl-carousel owl-loaded owl-drag">



                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-1760px, 0px, 0px); transition: all 0.5s ease 0s; width: 3080px;">
                                    <div class="owl-item cloned" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/servicetestimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item active" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-item cloned" style="width: 410px; margin-right: 30px;">
                                        <div class="testimonials_one_single_item">
                                            <div class="text">
                                                <p>This is due to their excellent service, and augue homero
                                                    consectetuer in nam.
                                                    Eu quo laoreet propriae, malis exerci habemus has vocent persius
                                                    eum ea.</p>
                                            </div>
                                            <div class="client_thumbnail">
                                                <div class="client_img">
                                                    <img src="{{ asset('images/testimonial-1-img-1.png') }} "
                                                        alt="testimonial1-img">
                                                </div>
                                                <div class="client_title">
                                                    <h4>Kevin Hardson</h4>
                                                    <p>Customer</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                    class="owl-prev"><span class="fa fa-angle-left"></span></button><button
                                    type="button" role="presentation" class="owl-next"><span
                                        class="fa fa-angle-right"></span></button></div>
                            <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button
                                    role="button" class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot active"><span></span></button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="recent-project">
        <div class="container">
            <div class="block-title text-center">
                <p>explore projects</p>
                <h3>our Recent projects</h3>
                <div class="leaf">
                    <img src="{{ asset('images/leaf.png') }} " alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="recent_project_single wow fadeInUp" data-wow-delay="300ms"
                        style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                        <div class="project_img_box">
                            <img src="{{ asset('images/recent-pro-img-1.jpg') }} " alt="Recent Project Img">
                            <div class="project_content">
                                <h3>organic<br>solutions</h3>
                            </div>
                            <div class="hover_box">
                                <a href="projects_detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="recent_project_single wow fadeInUp" data-wow-delay="600ms"
                        style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                        <div class="project_img_box">
                            <img src="{{ asset('images/recent-pro-img-2.jpg') }} " alt="Recent Project Img">
                            <div class="project_content">
                                <h3>Harvest<br>Innovations</h3>
                            </div>
                            <div class="hover_box">
                                <a href="projects_detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="900ms"
                    style="visibility: hidden; animation-delay: 900ms; animation-name: none;">
                    <div class="recent_project_single">
                        <div class="project_img_box">
                            <img src="{{ asset('images/recent-pro-img-3.jpg') }} " alt="Recent Project Img">
                            <div class="project_content">
                                <h3>Agriculture<br>farming</h3>
                            </div>
                            <div class="hover_box">
                                <a href="projects_detail.html"><span class="icon-left-arrow"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="benefits">
        <div class="benefits_bg" style="background-image: url({{ asset("images/benifits_bg.png") }})"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-4">
                    <div class="block-title text-left">
                        <p>Our benefits</p>
                        <h3>Agriculture &amp; Eco<br>Farming</h3>
                        <div class="leaf">
                            <img src="{{ asset('images/leaf.png') }} " alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 d-flex">
                    <div class="my-auto">
                        <div class="benefits_text">
                            <p>There are many variations of passages of available but the majority have suffered
                                alteration in some form, by injected humou or randomised words which don't look even
                                slightly believable. There are many variations of passages of available but the
                                majority have suffered alteration in some form, by injected humou or randomised
                                words which don't look even slightly believable.</p>
                        </div>
                    </div><!-- /.my-auto -->
                </div>
            </div>
            <div class="benefits_bottom_part">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="benefits_single wow fadeInUp" data-wow-delay="300ms"
                            style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                            <div class="icon-box">
                                <span class="icon-tractor"></span>
                            </div>
                            <h3>We Use New technology</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="benefits_single wow fadeInUp" data-wow-delay="600ms"
                            style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                            <div class="icon-box">
                                <span class="icon-cart"></span>
                            </div>
                            <h3>professional farmers</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="benefits_single wow fadeInUp" data-wow-delay="900ms"
                            style="visibility: hidden; animation-delay: 900ms; animation-name: none;">
                            <div class="icon-box">
                                <span class="icon-watering-can"></span>
                            </div>
                            <h3>We’re certified company</h3>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="benefits_single wow fadeInUp" data-wow-delay="1200ms"
                            style="visibility: hidden; animation-delay: 1200ms; animation-name: none;">
                            <div class="icon-box">
                                <span class="icon-log"></span>
                            </div>
                            <h3>We deliver everywhere</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="product_img">
                        <img src="{{ asset('images/product-1-img-1.jpg') }} " alt="Product One Img">
                        <div class="experience_box">
                            <h2>40 Year</h2>
                            <p>Of Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="growing_product">
                        <div class="block-title text-left">
                            <p>fresh products</p>
                            <h3>Growing products</h3>
                            <div class="leaf">
                                <img src="{{ asset('images/leaf.png') }} " alt="">
                            </div>
                        </div>
                        <div class="growing_product_text">
                            <p>Lorem ipsum dolor sit amet nsectetur cing elit. Suspe ndisse suscipit sagittis leo
                                sit met entum estibu dignissim posuere cubilia durae. Leo sit met entum cubilia crae
                                onec.</p>
                        </div>
                        <div class="progress-levels">
                            <!--Skill Box-->
                            <div class="progress-box">
                                <div class="inner count-box">
                                    <div class="text">Agriculture</div>
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="skill-percent">
                                                <span class="count-text" data-speed="3000" data-stop="68">0</span>
                                                <span class="percent">%</span>
                                            </div>
                                            <div class="bar-fill" data-percent="68"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Skill Box-->
                            <div class="progress-box">
                                <div class="inner count-box">
                                    <div class="text">Organic</div>
                                    <div class="bar">
                                        <div class="bar-innner">
                                            <div class="skill-percent">
                                                <span class="count-text" data-speed="3000" data-stop="98">0</span>
                                                <span class="percent">%</span>
                                            </div>
                                            <div class="bar-fill" data-percent="98"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="blog-one">
        <div class="container">
            <div class="block-title text-center">
                <p>from the blog</p>
                <h3>News &amp; Articles</h3>
                <div class="leaf">
                    <img src="{{ asset('images/leaf.png') }} " alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="300ms"
                        style="visibility: hidden; animation-delay: 300ms; animation-name: none;">
                        <div class="blog_one_image">
                            <div class="blog_image">
                                <img src="{{ asset('images/blog-1-img-1.jpg') }} " alt="Blog One Image">
                                <div class="blog_one_date_box">
                                    <p>30 Oct, 2019</p>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3><a href="news_detail.html">Agriculture Miracle you<br>Don't Know About</a></h3>
                                <div class="blog_one_text">
                                    <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                        suffered.</p>
                                </div>
                                <div class="read_more_btn">
                                    <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="600ms"
                        style="visibility: hidden; animation-delay: 600ms; animation-name: none;">
                        <div class="blog_one_image">
                            <div class="blog_image">
                                <img src="{{ asset('images/blog-1-img-2.jpg') }} " alt="Blog One Image">
                                <div class="blog_one_date_box">
                                    <p>30 Oct, 2019</p>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3><a href="news_detail.html">Amount of Freak Bread<br>or Other Fruits</a></h3>
                                <div class="blog_one_text">
                                    <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                        suffered.</p>
                                </div>
                                <div class="read_more_btn">
                                    <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="blog_one_single wow fadeInUp" data-wow-delay="900ms"
                        style="visibility: hidden; animation-delay: 900ms; animation-name: none;">
                        <div class="blog_one_image">
                            <div class="blog_image">
                                <img src="{{ asset('images/blog-1-img-3.jpg') }} " alt="Blog One Image">
                                <div class="blog_one_date_box">
                                    <p>30 Oct, 2019</p>
                                </div>
                            </div>
                            <div class="blog-one__content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="news_detail.html"><i class="far fa-user-circle"></i> Admin</a></li>
                                    <li><a href="news_detail.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3><a href="news_detail.html">Winter Wheat Harvest<br>Gathering Momentum</a></h3>
                                <div class="blog_one_text">
                                    <p>There are lorem ipsum is simply free many variations of ipsum the majority
                                        suffered.</p>
                                </div>
                                <div class="read_more_btn">
                                    <a href="#"><i class="fa fa-angle-right"></i>Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-one" style="background-image: url({{ asset("images/cta_one_bg-1.jpg") }})">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="cta_one_content">
                        <h1>Provide you the Highest Quality products<br>that Meets your Expectation</h1>
                        <p>Eu quo laoreet propriae, te has, vocent persius eum ea.</p>
                        <div class="cta_one__button-block">
                            <a href="" class="thm-btn cta_one__btn">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
