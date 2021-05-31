<!DOCTYPE html>
<html lang="en">

<head>
    <title>VAS.com</title>
</head>

<body data-theme="light">
    @extends('client::layouts.app')
    @extends('client::layouts.styles')
    <!-- hero area -->

    <!-- testimonial section start -->
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
                                @foreach ($lekkiCinema as $item )
                                <div class="col-xl-6 col-lg-5 col-md-6">
                                        
                                    <div class="card">
                                        <div class="card-body">
                                            <video width="100%" height="400px" controls>
                                                <source src="{{ asset($item->movie) }}" type="video/mp4" class="img-thumbnail" style="box-shadow: 0px 2px 7px 2px gray ;" alt="VAS Solutions"
                                                  style="border-radius: 100px">
                                          </video>
                                        </div>
                                        <div class="testimonial-card bg-white rounded-5 py-9 pl-9 pr-7 mb-lg-0 mb-9">
                                            <div class="media ml-1 align-items-center">
                                                <div class="customer-img mr-4">
                                                    <img src="img/Vas_new.png" alt=""
                                                    class="circle-size-41 w-100">
                                                </div>
                                                <div class="media-body pl-4">
                                                    <h5
                                                    class="font-size-6 font-weight-bold letter-spacing-np32 text-mineshaft mb-1">
                                                    {{ $item->title }}</h5>
                                                    <p
                                                    class="font-size-4 text-dovegray text-dovegray letter-spacing-np4 line-height-1p86 font-weight-normal mb-0">
                                                   <a href="{{ ('read-lekkiCinema/'. $item->id) }}"> Read More>></a></p>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-shape-3"></div>
    </div>

   @extends('client::layouts.footer')
    @extends('client::layouts.script')
</body>

</html>