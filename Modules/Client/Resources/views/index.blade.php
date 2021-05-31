<!DOCTYPE html>
<html lang="en">

<head>
    <title>VAS SOLUTION</title>
    <style>
        .card {
            box-shadow: 2px 6px 7px 2px red;
            margin: 10px;
        }
    </style>
</head>

<body data-theme="light">
    @extends('cinema::layouts.master')

    @extends('client::layouts.app')
    <!-- hero area -->
    <div
        class="bg-default-3 pt-21 pt-sm-24 pt-md-25 pt-lg-28 pb-lg-0 pb-md-15 pb-11 position-relative z-index-1 overflow-hidden">
        <div class="container">
            <div class="row position-relative justify-content-center">
                <!-- Hero Right Image -->
                <div class="col-xl-7 col-lg-6 col-sm-9" data-aos="fade-right" data-aos-duration="800"
                    data-aos-once="true">
                    <div class="mt-xl-n3 mt-lg-12 pr-xl-17 mt-0">
                        <img src="{{ asset('/img/Vaslogo.png') }}" alt="" class="w-100">
                    </div>
                </div>
                <!-- ./Hero Right Image -->
                <!-- hero area content start -->
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-9 pt-lg-20 pt-15" data-aos="fade-left"
                    data-aos-duration="800" data-aos-once="true">
                    <!-- hero area section title start -->
                    <h2
                        class="font-size-18 text-mineshaft letter-spacing-n5 line-height-1p02 pr-xl-0 pr-md-9 pr-sm-6 mb-8">
                        Solutions Limited</h2>
                    <p class="font-size-9 font-family-3 text-ebonyclay letter-spacing-np3 pr-xl-15 pr-md-15 pr-0 mb-11">
                        .</p>
                    <!-- hero area section title end -->
                    <div class="apps-btn">
                        <a href="#" class="app-store mr-5 mb-lg-0 mb-6"><img src="image/l3/png/app-store.png"
                                alt=""></a>
                        <a href="#" class="app-store"><img src="image/l3/png/google-play.png" alt=""></a>
                    </div>
                </div>
                <!-- hero area content end -->
            </div>
        </div>
        <div class="bg-shape-2"></div>
    </div>
    <!-- content-1 section start -->
    <div class="bg-default-3 position-relative overflow-hidden pt-lg-27 pt-9">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="border-bottom border-default-color-2">
                        <div class="row justify-content-center">
                            <div class="col-xl-11">
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10" data-aos="fade-right"
                                        data-aos-duration="800" data-aos-once="true">
                                        <!-- content-1 start -->
                                        <div
                                            class="d-flex flex-column justify-content-center h-100 pl-xl-11 pr-xl-13 pr-lg-9 pr-md-0 pr-0 pt-lg-0 pb-lg-27 pb-9 ">
                                            <!-- content-1 section-title start -->
                                            <h2
                                                class="font-size-17 heading-default-color letter-spacing-n5 line-height-1p06 mb-9 pr-lg-0 pr-sm-23 pr-15">
                                                lekki Cinema</h2>
                                            <p
                                                class="font-size-9 text-dovegray font-family-3 letter-spacing-np3 mb-10 mb-lg-11 pr-lg-0 pr-md-9 pr-sm-0">
                                                What do we refers being healthy What do we refers being healthyWhat do we refers
                                                being healthyWhat do we refers being healthyWhat do we refers being healthyWhat
                                                do we refers being healthy? .</p>
                                            <!-- content-1 section-title end -->
                                        </div>
                                        <!-- content-1 end -->
                                    </div>
                                    <div class="col-lg-6 col-md-8 col-sm-10 position-relative" data-aos="fade-left"
                                        data-aos-duration="800" data-aos-once="true">
                                        <!-- content img start -->
                                        <div class="img-pos-1 mb-24 h-100 pb-lg-0 pb-11">
                                            <img src="{{ asset('img/region.jpg') }}" alt="" class="w-100"
                                                class="h-100">
                                        </div>
                                        <!-- content img end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-2 section start -->
    <div class="bg-default-3 overflow-hidden pt-lg-19 pt-15">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="border-bottom border-default-color-2">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-8 col-sm-10 position-relative" data-aos="fade-right"
                                data-aos-duration="800" data-aos-once="true">
                                <!-- content img start -->
                                <div class="img-pos-1 pr-5 ml-n10 pos-abs-bl h-100">
                                   <a href="ajahCinema"><img src="img/region.jpg" alt="" class="w-100"></a> 
                                </div>
                                <!-- content img end -->
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10" data-aos="fade-left"
                                data-aos-duration="800" data-aos-once="true">
                                <!-- content-2 start -->
                                <div
                                    class="d-flex flex-column justify-content-center h-100 pl-xl-11 pl-lg-6 pl-0 pr-xl-15 pt-lg-27 pt-8 pb-lg-27 pb-7">
                                    <!-- content-2 section-title start -->
                                    <h2
                                        class="font-size-14 heading-default-color letter-spacing-n3 mb-10 pr-lg-15 pr-md-22 pr-sm-23 pr-15">
                                        Ajah Cinema
                                    </h2>
                                    <p
                                        class="font-size-9 text-dovegray font-family-3 letter-spacing-np4 mb-10 mb-lg-11 pr-xl-12 pr-md-9">
                                        What do we refers being healthy What do we refers being healthyWhat do we refers
                                        being healthyWhat do we refers being healthyWhat do we refers being healthyWhat
                                        do we refers being healthy?.</p>
                                    <!-- content-2 section-title end -->
                                </div>
                                <!-- content-1 end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-3 section start -->
    <div class="bg-default-3 position-relative overflow-hidden pt-xl-25 pt-lg-17 pt-13">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 offset-xl-1 col-lg-6 col-md-8 col-sm-10 pl-xl-0" data-aos="fade-right"
                            data-aos-duration="800" data-aos-once="true">
                            <!-- content-3 start -->
                            <div
                                class="d-flex flex-column justify-content-center h-100 pl-xl-11 pr-xl-13 pr-lg-9 pr-md-0 pr-0 pt-lg-0 pb-lg-23 pb-9 ">
                                <!-- content-1 section-title start -->
                                <h2
                                    class="font-size-14 heading-default-color letter-spacing-n3 mb-9 pr-lg-0 pr-sm-23 pr-15">
                                    Ikeja Cinema</h2>
                                <p
                                    class="font-size-9 text-dovegray font-family-3 letter-spacing-np3 mb-10 mb-lg-11 pr-lg-0 pr-md-9 pr-sm-0">
                                    What do we refers being healthy What do we refers being healthyWhat do we refers
                                            being healthyWhat do we refers being healthyWhat do we refers being healthyWhat
                                            do we refers being healthy?.</p>
                                <!-- content-1 section-title end -->
                            </div>
                            <!-- content-3 end -->
                        </div>
                        <div class="col-lg-6 col-md-8 col-sm-10 position-relative" data-aos="fade-left"
                            data-aos-duration="800" data-aos-once="true">
                            <!-- content img start -->
                            <div class="img-pos-1 pos-abs-bl mb-0 h-100 w-100 pb-lg-0 pb-11 px-lg-15">
                               <a href="{{ route('ikejaCinema') }}"> <img src="img/region.jpg" alt="" class="w-100"></a>
                            </div>
                            <!-- content img end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- content-4 section start -->
        <div class="bg-default-3 overflow-hidden pt-lg-19 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="border-bottom border-default-color-2">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-8 col-sm-10 position-relative" data-aos="fade-right"
                                    data-aos-duration="800" data-aos-once="true">
                                    <!-- content img start -->
                                    <div class="img-pos-1 pr-5 ml-n10 pos-abs-bl h-100">
                                    <a href="{{ route('lekkiCinema') }}"><img src="img/region.jpg" alt="" class="w-100"></a> 
                                    </div>
                                    <!-- content img end -->
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10" data-aos="fade-left"
                                    data-aos-duration="800" data-aos-once="true">
                                    <!-- content-2 start -->
                                    <div
                                        class="d-flex flex-column justify-content-center h-100 pl-xl-11 pl-lg-6 pl-0 pr-xl-15 pt-lg-27 pt-8 pb-lg-27 pb-7">
                                        <!-- content-2 section-title start -->
                                        <h2
                                            class="font-size-14 heading-default-color letter-spacing-n3 mb-10 pr-lg-15 pr-md-22 pr-sm-23 pr-15">
                                            Lekki Cinema
                                        </h2>
                                        <p
                                            class="font-size-9 text-dovegray font-family-3 letter-spacing-np4 mb-10 mb-lg-11 pr-xl-12 pr-md-9">
                                            What do we refers being healthy What do we refers being healthyWhat do we refers
                                            being healthyWhat do we refers being healthyWhat do we refers being healthyWhat
                                            do we refers being healthy?.</p>
                                        <!-- content-2 section-title end -->
                                    </div>
                                    <!-- content-1 end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- testimonial section start -->
    <div class="position-relative bg-default-3 overflow-hidden z-index-1 pt-lg-24 pt-md-23 pt-13">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-11 px-lg-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-left mb-16">
                                <h2 class="font-size-14 text-mineshaft letter-spacing-n3 mb-10 pr-lg-0 pr-md-22">Latest Cinema <hr>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center" data-aos="fade-right" data-aos-duration="800"
                        data-aos-once="true">
                        <div class="row justify-content-center">
                            <div class="row justify-content-center">
                                <!-- seg 1 lekkiCinema --->
                                <div class="col-xl-4 col-lg-5 col-md-4">
                                    @foreach ($lekkiCinema as $item )
                                    <div class="card">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-5 col-md-12">
                                                
                                            <div class="card-body">
                                                <video width="100%" height="150px" controls>
                                                    <source src="{{ asset($item->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                                                      style="border-radius: 100px">
                                              </video>
                                             <span> {!! $item->caption !!} Showing on {{ $item->date }}</span>
                                            </div>
                                            <div
                                                class="testimonial-card bg-white rounded-5 py-9 pl-9 pr-7 mb-lg-0 mb-9">
                                                <div class="media ml-1 align-items-center">
                                                    <div class="media-body pl-4">
                                                        <h5
                                                            class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                            {{ $item->title }}</h5>
                                                        <p  class="font-size-4 text-dovegray text-dovegray letter-spacing-np4 line-height-1p86 font-weight-normal mb-0">
                                                            <a href="{{ url('read-lekkiCinema/'.$item->id) }}">Check Show Time Here>></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach
                                    <div class="card-footer">
                                        {{ $lekkiCinema->links() }}
                                    </div>
                                </div>
                                <!-- seg 2 Ajah Cinema--->
                                <div class="col-xl-4 col-lg-5 col-md-4">
                                    @foreach ($ajahCinema as $cinema )
                                    <div class="card">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-5 col-md-12">
                                            <div class="card-body">
                                                <video width="100%" height="150px" controls>
                                                    <source src="{{ asset($cinema->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                                                      style="border-radius: 100px">
                                              </video>
                                              <span> {!! $cinema->caption !!} Showing on {{ $cinema->date }}</span>
                                            </div>
                                            <div
                                                class="testimonial-card bg-white rounded-5 py-9 pl-9 pr-7 mb-lg-0 mb-9">
                                                <div class="media ml-1 align-items-center">
                                                    <div class="media-body pl-4">
                                                        <h5
                                                            class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                            {{ $cinema->title }}</h5>
                                                        <p  class="font-size-4 text-dovegray text-dovegray letter-spacing-np4 line-height-1p86 font-weight-normal mb-0">
                                                            <a href="{{ url('read-ajahCinema/'.$cinema->id) }}">Check Show Time Here>></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                    <div class="card-footer">
                                        {{ $ajahCinema->links() }}
                                    </div>
                                </div>
                                <!-- seg 3 Ikeja Cinema--->
                                <div class="col-xl-4 col-lg-5 col-md-4">
                                    @foreach ($ikejaCinema as $ItemIkejaCinema )
                                    <div class="card">
                                    <div class="row justify-content-center">
                                        <div class="col-xl-12 col-lg-5 col-md-12">
                                            <div class="card-body">
                                                <video width="100%" height="150px" controls>
                                                    <source src="{{ asset($ItemIkejaCinema->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                                                      style="border-radius: 100px">
                                              </video>
                                              <span> {!! $ItemIkejaCinema->caption !!} Showing on {{ $ItemIkejaCinema->date }}</span>
                                            </div>
                                            <div
                                                class="testimonial-card bg-white rounded-5 py-9 pl-9 pr-7 mb-lg-0 mb-9">
                                                <div class="media ml-1 align-items-center">
                                                    <div class="media-body pl-4">
                                                        <h5
                                                            class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                            {{ $ItemIkejaCinema->title }}</h5>
                                                        <p  class="font-size-4 text-dovegray text-dovegray letter-spacing-np4 line-height-1p86 font-weight-normal mb-0">
                                                            <a href="{{ url('read-ikejaCinema/'.$ItemIkejaCinema->id) }}">Check Show Time Here>></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    @endforeach
                                    <div class="card-footer">
                                        {{ $ikejaCinema->links() }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shape-3"></div>
    </div>
    </div>

    @extends('client::layouts.footer')
    <div  id="form-submit"></div>
    @extends('client::layouts.script')
</body>

</html>