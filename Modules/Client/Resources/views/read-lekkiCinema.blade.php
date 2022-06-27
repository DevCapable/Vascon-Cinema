    @extends('client::layouts.master')
    @section('title','Read more lekki cinema ')
    @section('content')
        <div class="position-relative bg-default-3 overflow-hidden z-index-1 pt-lg-24 pt-md-23 pt-13">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-11 px-lg-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="section-title text-center mb-16">
                                    <h2 class="font-size-14 text-mineshaft letter-spacing-n3 mb-10 pr-lg-0 pr-md-22">
                                        Lekki Cinema
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center" data-aos="fade-right" data-aos-duration="800"
                             data-aos-once="true">
                            <div class="row justify-content-center">
                                <div class="row justify-content-center">
                                    <div class="col-xl-12 col-lg-5 col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="media-body pl-4">
                                                    <h5
                                                        class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                        {!! $toRead->caption !!}</h5>

                                                </div>
                                                <video width="100%" height="200px" controls>
                                                    <source src="{{ asset($toRead->movie) }}" type="video/mp4"
                                                            class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;"
                                                            alt="VAS Solutions"
                                                            style="border-radius: 100px">
                                                </video>
                                            </div>
                                            <div class="testimonial-card bg-white rounded-5 py-9 pl-9 pr-7 mb-lg-0 mb-9">
                                                {!! "Brief details about ". $toRead->caption  !!}
                                                <p
                                                    class="font-size-7 font-family-3 letter-spacing-np1 line-height-1p7 text-mineshaft mb-lg-4 pb-5 pr-lg-7 pr-sm-0">
                                                    {!! $toRead->details !!}</p>
                                                <h5
                                                    class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                    {{" This Movie is Showing on: ". $toRead->date . " Time: ".  $toRead->time }}</h5>
                                                <div class="media ml-1 align-items-center">
                                                    <div class="customer-img mr-4">
                                                        <img src="image/l3/png/client-img-5.png" alt=""
                                                             class="circle-size-41 w-100">
                                                        <a href="javascript:void(0)" onclick="window.history.back();"
                                                           class="btn btn-outline-info btn-lg btn-block">Go Back</a>
                                                    </div>
                                                </div>
                                            </div>
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

    @stop
