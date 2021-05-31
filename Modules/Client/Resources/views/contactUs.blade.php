<!DOCTYPE html>
<html lang="en">

<head>
    <title>VAS.com</title>
    <style>
           .help-block {
            color: #dc3545;
        }

        .has-error {
            color: #dc3545;
        }
    </style>
</head>

<body data-theme="light">
    @extends('client::layouts.app')
    <!-- hero area -->

    <!-- testimonial section start -->
    <div class="position-relative bg-default-3 overflow-hidden z-index-1 pt-lg-24 pt-md-23 pt-13">
        <div class="container">
            <div class="row justify-content-center">
                <section class="contact-us">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="section-heading">
                                    <h2>Message</h2>
                                </div>
                                <form id="contact" action="#" method="post" novalidate>
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            
                                            <fieldset>
                                                <input type="text" name="name" class="form-control" placeholder="Enter Your Name"  >
                                                @if ($errors->has('name'))
                                                    <span class="font-wieght-extra-bold">{{ $errors->first('name') }}</span>
                                                @endif
                                            </fieldset>
                                            <fieldset >
                                                <input name="email" type="text" class="form-control" id="email" placeholder="Your email..." >
                                                @if ($errors->has('email'))
                                                    <span class="fonfont-wieght-extra-bold">{{ $errors->first('email') }}</span>
                                                @endif
                                            </fieldset>
                                            <fieldset>
                                                <input name="phone" type="number" class="form-control" id="phone" placeholder="Your phone..." >
                                                
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset>
                                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." ></textarea>
                                            </fieldset>
                                            <fieldset style="padding: 10px;">
                                                <button type="submit" id="form-submit" name ="submit" class="btn btn-success ">Send Message</button>
                                                
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <div class="section-heading contact-info" >
            
                                    <table class="table" style="text-align:left; ">
                                        <h2 style="text-align: center;">Contact Info</h2>
                                        <tr>
                                            <th>LEKKI OFFICE:</th>
                                            <td>
                                               
                                            </td></tr><tr>
                                            <th>AJAH OFFICE:</th>
                                            <td>
                                                
                                            </td></tr><tr>
                                             <th >IKEJA OFFICE:</th>
                                            <td>
                                              
                                            </td></tr><tr>
                                             <th >E-MAIL:</th>
                                            <td>
                                              
                                               
                                            </td>
                                        </tr><tr>
                                             <th >:</th>
                                            <td>
                                              
                                             
                                            </td>
                                        </tr>
            
            
            
                                    </table>
            
            
            
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="bg-shape-3"></div>
    </div>

   @extends('client::layouts.footer')
    @extends('client::layouts.script')
</body>

</html>