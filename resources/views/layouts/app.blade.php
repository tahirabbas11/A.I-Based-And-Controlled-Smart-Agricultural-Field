<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @include('layouts.front.css')
</head>

<body>
    <div class="preloader" style="display: none;">
        <img src="assets/images/loader.png" class="preloader__image" alt="">
    </div><!-- /.preloader -->

    <div class="page-wrapper">
        @include('layouts.front.header')

        @yield('content')

        @include('layouts.front.footer')
        @include('layouts.front.script')
    </div>
    <a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <div class="side-menu__block">
        <div class="side-menu__block-overlay custom-cursor__overlay">
            <div class="cursor" style="top: 559px; left: 401px;"></div>
            <div class="cursor-follower" style="top: 537px; left: 379px;"></div>
        </div><!-- /.side-menu__block-overlay -->
        <div class="side-menu__block-inner  mCustomScrollbar _mCS_1">
            <div id="mCSB_1" class="mCustomScrollBox mCS-dark mCSB_vertical mCSB_inside" style="max-height: none;"
                tabindex="0">
                <div id="mCSB_1_container" class="mCSB_container" style="position:relative; top:0; left:0;"
                    dir="ltr">
                    <div class="side-menu__top justify-content-end">
                        <a href="#" class="side-menu__toggler side-menu__close-btn"><img
                                src="assets/images/close-1-1.png" alt="" class="mCS_img_loaded"></a>
                    </div><!-- /.side-menu__top -->

                    <nav class="mobile-nav__container">
                        <!-- content is loading via js -->

                        <ul class=" main-nav__navigation-box">
                            <li class="dropdown current">
                                <a href="index.html">Home<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="index.html">Home 01</a></li>
                                    <li><a href="index2.html">Home 02</a></li>
                                    <li><a href="index3.html">Home 03</a></li>
                                    <li><a href="index4.html">Home 04</a></li>
                                    <li><a href="index5.html">Home 05</a></li>
                                    <li class="dropdown"><a href="#">Header Versions<button
                                                class="dropdown-btn"><i class="fa fa-angle-right"></i></button></a>
                                        <ul>
                                            <li><a href="index.html">Header 01</a></li>
                                            <li><a href="index2.html">Header 02</a></li>
                                            <li><a href="index3.html">Header 03</a></li>
                                            <li><a href="index4.html">Header 04</a></li>
                                            <li><a href="index5.html">Header 05</a></li>
                                        </ul><!-- /.sub-menu -->
                                    </li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="service.html">Services<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="service-detail.html">Services Detail</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="projects.html">Our Projects<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="projects.html">Projects</a></li>
                                    <li><a href="projects_detail.html">Projects Detail</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Shop<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="product.html">Products</a></li>
                                    <li><a href="product-detail.html">Product Detail</a></li>
                                    <li><a href="cart.html">Cart</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">Pages<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="about.html">About</a></li>
                                    <li><a href="why_choose_us.html">Why Choose Us</a></li>
                                    <li><a href="farmers.html">Farmers</a></li>
                                    <li><a href="gallery.html">Gallery</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li class="dropdown">
                                <a href="#">News<button class="dropdown-btn"><i
                                            class="fa fa-angle-right"></i></button></a>
                                <ul>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="news_detail.html">News Details</a></li>
                                </ul><!-- /.sub-menu -->
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>
                    </nav>

                    <div class="side-menu__sep"></div><!-- /.side-menu__sep -->

                    <div class="side-menu__content">
                        <p><a href="mailto:needhelp@tripo.com">needhelp@agricol.com</a> <br> <a
                                href="tel:888-999-0000">888 999
                                0000</a></p>
                        <div class="side-menu__social">
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                        </div>
                    </div>
                </div>
                <div id="mCSB_1_scrollbar_vertical"
                    class="mCSB_scrollTools mCSB_1_scrollbar mCS-dark mCSB_scrollTools_vertical"
                    style="display: block;">
                    <div class="mCSB_draggerContainer">
                        <div id="mCSB_1_dragger_vertical" class="mCSB_dragger"
                            style="position: absolute; min-height: 30px; height: 345px; top: 0px; display: block; max-height: 493px;">
                            <div class="mCSB_dragger_bar" style="line-height: 30px;"></div>
                        </div>
                        <div class="mCSB_draggerRail"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="search-popup">
        <div class="search-popup__overlay custom-cursor__overlay">
            <div class="cursor" style="top: 559px; left: 401px;"></div>
            <div class="cursor-follower" style="top: 537px; left: 379px;"></div>
        </div><!-- /.search-popup__overlay -->
        <div class="search-popup__inner">
            <form action="#" class="search-popup__form">
                <input type="text" name="search" placeholder="Type here to Search....">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>



</body>

</html>
