@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xxxl-3 col-lg-4 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-center">
                            <div class="box-icon">
                                <i class="icon-Image"></i>
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">{{ App\Models\Banner::count() }}</h2>
                                <p class="text-fade mb-0">Total Banner</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xxxl-3 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-start">
                            <div>
                                <img src="../images/food/online-order-2.png" class="w-80 mr-20" alt="" />
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">899</h2>
                                <p class="text-fade mb-0">Total Delivered</p>
                                <p class="font-size-12 mb-0 text-success"><span
                                        class="badge badge-pill badge-success-light mr-5"><i
                                            class="fa fa-arrow-up"></i></span>8% (15 Days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-3 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-start">
                            <div>
                                <img src="../images/food/online-order-3.png" class="w-80 mr-20" alt="" />
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">59</h2>
                                <p class="text-fade mb-0">Total Canceled</p>
                                <p class="font-size-12 mb-0 text-primary"><span
                                        class="badge badge-pill badge-primary-light mr-5"><i
                                            class="fa fa-arrow-down"></i></span>2% (15 Days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-3 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex align-items-start">
                            <div>
                                <img src="../images/food/online-order-4.png" class="w-80 mr-20" alt="" />
                            </div>
                            <div>
                                <h2 class="my-0 font-weight-700">$789k</h2>
                                <p class="text-fade mb-0">Total Revenue</p>
                                <p class="font-size-12 mb-0 text-primary"><span
                                        class="badge badge-pill badge-primary-light mr-5"><i
                                            class="fa fa-arrow-down"></i></span>12% (15 Days)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-7 col-xl-6 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="box-title mb-0">Daily Revenue</h4>
                                <p class="mb-0 text-mute">Lorem ipsum dolor</p>
                            </div>
                            <div class="text-right">
                                <h3 class="box-title mb-0 font-weight-700">$ 154K</h3>
                                <p class="mb-0"><span class="text-success">+ 1.5%</span> than last week</p>
                            </div>
                        </div>
                        <div id="chart" class="mt-20"></div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-5 col-xl-6 col-lg-6 col-12">
                <div class="box">
                    <div class="box-body">
                        <h4 class="box-title">Customer Flow</h4>
                        <div class="d-md-flex d-block justify-content-between">
                            <div>
                                <h3 class="mb-0 font-weight-700">$2,780k</h3>
                                <p class="mb-0 text-primary"><small>In Restaurant</small></p>
                            </div>
                            <div>
                                <h3 class="mb-0 font-weight-700">$1,410k</h3>
                                <p class="mb-0 text-danger"><small>Online Order</small></p>
                            </div>
                        </div>
                        <div id="yearly-comparison"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="box bg-transparent no-shadow">
                    <div class="box-header pt-0 px-0">
                        <h4 class="box-title">
                            Customer Review
                        </h4>
                    </div>
                    <div class="box-body px-0">
                        <div class="review-slider owl-carousel">
                            <div class="box p-0">
                                <div class="box-body">
                                    <div class="d-flex align-items-center">
                                        <div class="review-tx">
                                            <div class="d-flex mb-10">
                                                <img src="../images/avatar/1.jpg" class="w-40 h-40 mr-10 rounded100"
                                                    alt="" />
                                                <div>
                                                    <p class="mb-0">Johen Doe</p>
                                                    <p class="mb-0"><small class="text-mute">1 day ago</small></p>
                                                </div>
                                            </div>
                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.. </p>
                                            <div class="d-flex text-warning align-items-center">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                                <span class="text-fade ml-10">4.5</span>
                                            </div>
                                        </div>
                                        <img src="../images/food/dish-1.png" class="dish-img" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="box p-0">
                                <div class="box-body">
                                    <div class="d-flex align-items-center">
                                        <div class="review-tx">
                                            <div class="d-flex mb-10">
                                                <img src="../images/avatar/2.jpg" class="w-40 h-40 mr-10 rounded100"
                                                    alt="" />
                                                <div>
                                                    <p class="mb-0">Mical Doe</p>
                                                    <p class="mb-0"><small class="text-mute">2 day ago</small></p>
                                                </div>
                                            </div>
                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.. </p>
                                            <div class="d-flex text-warning align-items-center">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                                <span class="text-fade ml-10">4.5</span>
                                            </div>
                                        </div>
                                        <img src="../images/food/dish-2.png" class="dish-img" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="box p-0">
                                <div class="box-body">
                                    <div class="d-flex align-items-center">
                                        <div class="review-tx">
                                            <div class="d-flex mb-10">
                                                <img src="../images/avatar/3.jpg" class="w-40 h-40 mr-10 rounded100"
                                                    alt="" />
                                                <div>
                                                    <p class="mb-0">Stepni Doe</p>
                                                    <p class="mb-0"><small class="text-mute">3 day ago</small></p>
                                                </div>
                                            </div>
                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.. </p>
                                            <div class="d-flex text-warning align-items-center">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                                <span class="text-fade ml-10">4.5</span>
                                            </div>
                                        </div>
                                        <img src="../images/food/dish-3.png" class="dish-img" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="box p-0">
                                <div class="box-body">
                                    <div class="d-flex align-items-center">
                                        <div class="review-tx">
                                            <div class="d-flex mb-10">
                                                <img src="../images/avatar/4.jpg" class="w-40 h-40 mr-10 rounded100"
                                                    alt="" />
                                                <div>
                                                    <p class="mb-0">Rehan Doe</p>
                                                    <p class="mb-0"><small class="text-mute">4 day ago</small></p>
                                                </div>
                                            </div>
                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.. </p>
                                            <div class="d-flex text-warning align-items-center">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                                <span class="text-fade ml-10">4.5</span>
                                            </div>
                                        </div>
                                        <img src="../images/food/dish-4.png" class="dish-img" alt="" />
                                    </div>
                                </div>
                            </div>
                            <div class="box p-0">
                                <div class="box-body">
                                    <div class="d-flex align-items-center">
                                        <div class="review-tx">
                                            <div class="d-flex mb-10">
                                                <img src="../images/avatar/5.jpg" class="w-40 h-40 mr-10 rounded100"
                                                    alt="" />
                                                <div>
                                                    <p class="mb-0">Himesh Doe</p>
                                                    <p class="mb-0"><small class="text-mute">1 day ago</small></p>
                                                </div>
                                            </div>
                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                                                do eiusmod tempor incididunt ut labore et dolore magna aliqua.. </p>
                                            <div class="d-flex text-warning align-items-center">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-empty"></i>
                                                <span class="text-fade ml-10">4.5</span>
                                            </div>
                                        </div>
                                        <img src="../images/food/dish-5.png" class="dish-img" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-5 col-12">
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">
                            Trending Keyword
                            <small class="subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit</small>
                        </h4>
                    </div>
                    <div class="box-body pt-0">
                        <div>
                            <div class="progress mb-5">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-primary">#paneer</p>
                                <p class="text-mute">420 times</p>
                            </div>
                        </div>
                        <div>
                            <div class="progress mb-5">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-primary">#breakfast</p>
                                <p class="text-mute">150 times</p>
                            </div>
                        </div>
                        <div>
                            <div class="progress mb-5">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="text-primary">#tea</p>
                                <p class="text-mute">120 times</p>
                            </div>
                        </div>
                    </div>
                    <div class="box-body pt-0">
                        <h4 class="box-title d-block">
                            Others Tag
                        </h4>
                        <div class="d-inline-block">
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">#panjabifood</a>
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">#chainissfood</a>
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">#pizza</a>
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">#burgar</a>
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">#coffee</a>
                            <a href="#"
                                class="waves-effect waves-light btn btn-outline btn-rounded btn-primary mb-5">20+</a>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="box-header no-border">
                        <h4 class="box-title">
                            Today's Special
                        </h4>
                    </div>
                    <div class="box-body pt-0">
                        <div class="mb-5">
                            <img class="rounded img-fluid" src="../images/food/img1.jpg" alt="">
                        </div>
                        <div class="info-content">
                            <h5 class="my-15"><a href="ecommerce_details.html">Spicy Pizza with Extra Cheese</a></h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="mb-0 text-black">$6.53</h4>
                                <div class="d-flex align-items-center">
                                    <i class="fa fa-heart text-primary"></i>
                                    <h6 class="text-black mb-0">256k</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxxl-7 col-12">
                <div class="box">
                    <div class="box-header no-border pb-0">
                        <h4 class="box-title">Delivery Map</h4>
                    </div>
                    <div class="box-body">
                        <div id="chartdiv" class="h-400"></div>
                        <div class="pt-30">
                            <h4 class="box-title mb-20">Upcoming Shipping Schedule</h4>
                            <div class="bb-1 pb-10 mb-20 d-lg-flex d-block justify-content-between">
                                <div class="d-flex">
                                    <img src="../images/avatar/4.jpg" class="w-40 h-40 mr-10 rounded100" alt="">
                                    <div>
                                        <p class="mb-0">Stepni Doe <span class="text-primary ml-10">(3 items)</span></p>
                                        <p class="mb-0"><small class="text-mute">will be shipping on 10:12 am</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 mr-10">8817 Sand Pine Dr, Navarre, FL, 32566</p>
                                    <div class="bg-info rounded-circle w-30 h-30 l-h-30 text-center">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-1 pb-10 mb-20  d-lg-flex d-block justify-content-between">
                                <div class="d-flex">
                                    <img src="../images/avatar/5.jpg" class="w-40 h-40 mr-10 rounded100" alt="">
                                    <div>
                                        <p class="mb-0">Mical clark <span class="text-primary ml-10">(2 items)</span>
                                        </p>
                                        <p class="mb-0"><small class="text-mute">will be shipping on 12:12 am</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 mr-10">8817 Sand Pine Dr, Navarre, FL, 32566</p>
                                    <div class="bg-info rounded-circle w-30 h-30 l-h-30 text-center">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-1 pb-10  d-lg-flex d-block justify-content-between">
                                <div class="d-flex">
                                    <img src="../images/avatar/7.jpg" class="w-40 h-40 mr-10 rounded100" alt="">
                                    <div>
                                        <p class="mb-0">Steponi mohan <span class="text-primary ml-10">(7 items)</span>
                                        </p>
                                        <p class="mb-0"><small class="text-mute">will be shipping on 11:12 am</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <p class="mb-0 mr-10">8817 Sand Pine Dr, Navarre, FL, 32566</p>
                                    <div class="bg-info rounded-circle w-30 h-30 l-h-30 text-center">
                                        <i class="fa fa-location-arrow"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </section>
@endsection




@push('css')
    <style>
        p {
            color: whitesmoke;
        }
    </style>
@endpush
