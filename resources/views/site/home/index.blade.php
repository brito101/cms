@extends('site.master.master')

@section('title', 'Home')
@section('description', $frontSettings['Subtítulo do Site'])

@section('content')
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-md-6">
                        <div class="slider_text ">
                            <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                                {{ $frontSettings['Título do Site'] }}</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                {{ $frontSettings['Subtítulo do Site'] }}</p>
                            <div class="video_service_btn wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".1s">
                                <a href="#" class="boxed-btn3">Get Start Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-6">
                        <div class="phone_thumb wow fadeInDown" data-wow-duration="1.1s" data-wow-delay=".2s">
                            <img src="img/ilstrator/phone.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <h3>Save your time to <br>
                            using applab</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="single_service text-center wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".4s">
                        <div class="thumb">
                            <img src="img/icon/2.svg" alt="">
                        </div>
                        <h3>Manage team in <br>
                            One Place</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="single_service text-center wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                        <div class="thumb">
                            <img src="img/icon/1.svg" alt="">
                        </div>
                        <h3>All-powerful Pointing <br>
                            has no control</h3>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">

                    <div class="single_service text-center wow fadeInUp " data-wow-duration=".8s" data-wow-delay=".6s">
                        <div class="thumb">
                            <img src="img/icon/3.svg" alt="">
                        </div>
                        <h3>Establish a solid online
                            presence</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="service_area_2">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-4 col-lg-4 col-md-6 wow fadeInLeft" data-wow-duration=".4s" data-wow-delay=".5s">
                    <div class="man_thumb">
                        <img src="img/ilstrator_img/man_walk.png" alt="">
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-6 ">
                    <div class="mobile_screen wow fadeInRight" data-wow-duration=".8s" data-wow-delay=".5s">
                        <img src="img/ilstrator_img/mobile_screen.png" alt="">
                    </div>
                </div>
            </div>
            <div class="service_content_wrap">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="single_service  wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                            <span>01</span>
                            <h3>Sign Up for free</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="single_service  wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".4s">
                            <span>02</span>
                            <h3>Make your profile</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4  wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                        <div class="single_service">
                            <span>03</span>
                            <h3>Enjoy the app</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="features_area ">
        <div class="container">
            <div class="features_main_wrap">
                <div class="row  align-items-center">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="features_info2">
                            <h3>Features that give
                                you real feel</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida Risus com odo
                                viverra maecenas.</p>
                            <div class="about_btn">
                                <a class="boxed-btn4" href="#">Download Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 offset-xl-1 offset-lg-1 col-md-6 ">
                        <div class="about_draw wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s">
                            <img src="img/ilstrator_img/draw.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="features_main_wrap">
                <div class="row  align-items-center">
                    <div class="col-xl-5 col-lg-5 offset-xl-1 offset-lg-1 col-md-6">
                        <div class="about_image wow fadeInLeft" data-wow-duration=".4s" data-wow-delay=".3s">
                            <img src="img/ilstrator_img/phone.png" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="features_info">
                            <h3 class="wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">Easy setup and <br>
                                management</h3>
                            <p class="wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".4s">Lorem ipsum dolor sit
                                amet, consectetur adipiscing elit sed do eiusmod tempor incididunt.</p>
                            <ul>
                                <li class="wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".5s"> Apartments
                                    frequently or motionless. </li>
                                <li class="wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".6s"> Duis aute irure
                                    dolor in reprehenderit in voluptate. </li>
                                <li class="wow fadeInUp" data-wow-duration=".9s" data-wow-delay=".7s"> Voluptatem quia
                                    voluptas sit aspernatur.</li>
                            </ul>

                            <div class="about_btn wow fadeInUp" data-wow-duration=".10s" data-wow-delay=".8s">
                                <a class="boxed-btn4" href="#">Download Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="testmonial_area">
        <div class="container">
            <div class="col-xl-12">
                <div class="testmonial_active owl-carousel">
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                regular users</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                            tempor incididunt labore et dolore magna aliqua <br>
                            quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                regular users</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                            tempor incididunt labore et dolore magna aliqua <br>
                            quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                regular users</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                            tempor incididunt labore et dolore magna aliqua <br>
                            quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                - Robert Smile
                            </span>
                        </div>
                    </div>
                    <div class="single_testmonial text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".3s">
                        <div class="section_title">
                            <h3>Review from our <br>
                                regular users</h3>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit sed do eiusmod <br>
                            tempor incididunt labore et dolore magna aliqua <br>
                            quis ipsum suspendisse ultrices.
                        </p>
                        <div class="rating_author">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <span>
                                - Robert Smile
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="prising_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title text-center wow fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
                        <h3>Unlock full Power</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit sed do eiusmod <br> tempor incididunt.</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters align-items-center">
                <div class="col-xl-4 col-md-4">
                    <div class="single_prising text-center wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".8s">
                        <div class="prising_header d-flex justify-content-between">
                            <h3>Basic</h3>
                            <span>$06</span>
                        </div>
                        <ul>
                            <li>One User</li>
                            <li>1000 ui elements</li>
                            <li>Webmail Support</li>
                            <li>100GB Cloud Storage</li>
                        </ul>
                        <div class="prising_bottom">
                            <a href="#" class="get_now prising_btn">Get Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_prising text-center wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".6s">
                        <div class="prising_header d-flex justify-content-between pink_header">
                            <h3>Team</h3>
                            <span>$06</span>
                        </div>
                        <ul>
                            <li>One User</li>
                            <li>1000 ui elements</li>
                            <li>Webmail Support</li>
                            <li>100GB Cloud Storage</li>
                            <li>Unlimited Users Limit</li>
                        </ul>
                        <div class="prising_bottom">
                            <a href="#" class="get_now prising_btn">Get Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single_prising text-center wow fadeInUp" data-wow-duration=".7s" data-wow-delay=".8s">
                        <div class="prising_header d-flex justify-content-between green_header">
                            <h3>Business</h3>
                            <span>$06</span>
                        </div>
                        <ul>
                            <li>One User</li>
                            <li>1000 ui elements</li>
                            <li>Webmail Support</li>
                            <li>100GB Cloud Storage</li>
                        </ul>
                        <div class="prising_bottom">
                            <a href="#" class="get_now prising_btn">Get Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="productivity_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-md-12 col-lg-6">
                    <h3 class="wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">Get start from now <br>
                        and increase productivity</h3>
                </div>
                <div class="col-xl-5 col-md-12 col-lg-6">
                    <div class="app_download wow fadeInDown" data-wow-duration="1s" data-wow-delay=".1s">
                        <a href="#">
                            <img src="img/ilstrator/app.svg" alt="">
                        </a>
                        <a href="#">
                            <img src="img/ilstrator/play.svg" alt="">
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
