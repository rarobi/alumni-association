@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Profile</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->
    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <aside class="col-xl-3 col-lg-4" id="sidebar">
                            <div class="box_profile">
                                <figure>
                                    <img src="frontend/img/blog-img/blog-4.jpg" alt="" style="height:190px">
                                </figure>
                                <h1>DR. Julia Jhones</h1>
                            </div>
                        </aside>
                        <!-- /asdide -->

                        <div class="col-xl-9 col-lg-8">
                            <div class="tabs_styled_2">
                                <ul class="nav nav-tabs" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-expanded="true">General info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="book-tab" data-toggle="tab" href="#book" role="tab" aria-controls="book">Educational Info</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Job Info</a>
                                    </li>
                                </ul>
                                <!--/nav-tabs -->
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="book-tab">
                                        <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                        <form>
                                            <div class="main_title_3">
                                                <h3><strong>1</strong>Select your date</h3>
                                            </div>
                                            <div class="form-group add_bottom_45">
                                                <div id="calendar"></div>
                                                <input type="hidden" id="my_hidden_input">
                                                <ul class="legend">
                                                    <li><strong></strong>Available</li>
                                                    <li><strong></strong>Not available</li>
                                                </ul>
                                            </div>
                                            <div class="main_title_3">
                                                <h3><strong>2</strong>Select your time</h3>
                                            </div>
                                            <div class="row justify-content-center add_bottom_45">
                                                <div class="col-md-3 col-6 text-center">
                                                    <ul class="time_select">
                                                        <li>
                                                            <input type="radio" id="radio1" name="radio_time" value="09.30am">
                                                            <label for="radio1">09.30am</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio2" name="radio_time" value="10.00am">
                                                            <label for="radio2">10.00am</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio3" name="radio_time" value="10.30am">
                                                            <label for="radio3">10.30am</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio4" name="radio_time" value="11.00am">
                                                            <label for="radio4">11.00am</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio5" name="radio_time" value="11.30am">
                                                            <label for="radio5">11.30am</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio6" name="radio_time" value="12.00am">
                                                            <label for="radio6">12.00am</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-3 col-6 text-center">
                                                    <ul class="time_select">
                                                        <li>
                                                            <input type="radio" id="radio7" name="radio_time" value="01.30pm">
                                                            <label for="radio7">01.30pm</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio8" name="radio_time" value="02.00pm">
                                                            <label for="radio8">02.00pm</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio9" name="radio_time" value="02.30pm">
                                                            <label for="radio9">02.30pm</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio10" name="radio_time" value="03.00pm">
                                                            <label for="radio10">03.00pm</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio11" name="radio_time" value="03.30pm">
                                                            <label for="radio11">03.30pm</label>
                                                        </li>
                                                        <li>
                                                            <input type="radio" id="radio12" name="radio_time" value="04.00pm">
                                                            <label for="radio12">04.00pm</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /row -->

                                            <div class="main_title_3">
                                                <h3><strong>3</strong>Select visit</h3>
                                            </div>
                                            <ul class="treatments clearfix">
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit1" name="visit1">
                                                        <label for="visit1" class="css-label">Back Pain visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit2" name="visit2">
                                                        <label for="visit2" class="css-label">Cardiovascular screen <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit3" name="visit3">
                                                        <label for="visit3" class="css-label">Diabetes consultation <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit4" name="visit4">
                                                        <label for="visit4" class="css-label">Icontinence visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit5" name="visit5">
                                                        <label for="visit5" class="css-label">Foot Pain visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit6" name="visit6">
                                                        <label for="visit6" class="css-label">Food intollerance visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit7" name="visit7">
                                                        <label for="visit7" class="css-label">Neck Pain visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="checkbox">
                                                        <input type="checkbox" class="css-checkbox" id="visit8" name="visit8">
                                                        <label for="visit8" class="css-label">Back Pain visit <strong>$55</strong></label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </form>
                                        <hr>
                                        <p class="text-center"><a href="booking-page.html" class="btn_1 medium">Book Now</a></p>
                                    </div>
                                    <!-- /tab_1 -->
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <p class="lead add_bottom_30">Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                        <div class="indent_title_in">
                                            <i class="pe-7s-user"></i>
                                            <h3>Professional statement</h3>
                                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                                            <h6>Specializations</h6>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <ul class="bullets">
                                                        <li>Abdominal Radiology</li>
                                                        <li>Addiction Psychiatry</li>
                                                        <li>Adolescent Medicine</li>
                                                        <li>Cardiothoracic Radiology </li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-6">
                                                    <ul class="bullets">
                                                        <li>Abdominal Radiology</li>
                                                        <li>Addiction Psychiatry</li>
                                                        <li>Adolescent Medicine</li>
                                                        <li>Cardiothoracic Radiology </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- /row-->
                                        </div>
                                        <!-- /wrapper indent -->

                                        <hr>

                                        <div class="indent_title_in">
                                            <i class="pe-7s-news-paper"></i>
                                            <h3>Education</h3>
                                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Nullam mollis. Phasellus hendrerit. Pellentesque aliquet nibh nec urna. In nisi neque, aliquet vel, dapi.</p>
                                            <h6>Curriculum</h6>
                                            <ul class="list_edu">
                                                <li><strong>New York Medical College</strong> - Doctor of Medicine</li>
                                                <li><strong>Montefiore Medical Center</strong> - Residency in Internal Medicine</li>
                                                <li><strong>New York Medical College</strong> - Master Internal Medicine</li>
                                            </ul>

                                        </div>
                                        <!--  End wrapper indent -->

                                        <hr>

                                        <div class="indent_title_in">
                                            <i class="pe-7s-cash"></i>
                                            <h3>Prices &amp; Payments</h3>
                                            <p>Mussum ipsum cacilds, vidis litro abertis.</p>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Zril causae ancillae sit ea. Dicam veritus mediocritatem sea ex, nec id agam eius. Te pri facete latine salutandi, scripta mediocrem et sed, cum ne mundi vulputate. Ne his sint graeco detraxit, posse exerci volutpat has in.</p>
                                            <table class="table table-responsive table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Service - Visit</th>
                                                    <th>Price</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td>New patient visit</td>
                                                    <td>$34</td>
                                                </tr>
                                                <tr>
                                                    <td>General consultation</td>
                                                    <td>$60</td>
                                                </tr>
                                                <tr>
                                                    <td>Back Pain</td>
                                                    <td>$40</td>
                                                </tr>
                                                <tr>
                                                    <td>Diabetes Consultation</td>
                                                    <td>$55</td>
                                                </tr>
                                                <tr>
                                                    <td>Eating disorder</td>
                                                    <td>$60</td>
                                                </tr>
                                                <tr>
                                                    <td>Foot Pain</td>
                                                    <td>$35</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!--  End wrapper_indent -->

                                    </div>
                                    <!-- /tab_2 -->

                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="reviews-container">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div id="review_summary">
                                                        <strong>4.7</strong>
                                                        <div class="rating">
                                                            <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                                        </div>
                                                        <small>Based on 4 reviews</small>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9">
                                                    <div class="row">
                                                        <div class="col-lg-10 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <div class="row">
                                                        <div class="col-lg-10 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <div class="row">
                                                        <div class="col-lg-10 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <div class="row">
                                                        <div class="col-lg-10 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                                    </div>
                                                    <!-- /row -->
                                                    <div class="row">
                                                        <div class="col-lg-10 col-9">
                                                            <div class="progress">
                                                                <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                                    </div>
                                                    <!-- /row -->
                                                </div>
                                            </div>
                                            <!-- /row -->

                                            <hr>

                                            <div class="review-box clearfix">
                                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                                </figure>
                                                <div class="rev-content">
                                                    <div class="rating">
                                                        <i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                                    </div>
                                                    <div class="rev-info">
                                                        Admin – April 03, 2016:
                                                    </div>
                                                    <div class="rev-text">
                                                        <p>
                                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /review-box -->

                                            <div class="review-box clearfix">
                                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                                </figure>
                                                <div class="rev-content">
                                                    <div class="rating">
                                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                                    </div>
                                                    <div class="rev-info">
                                                        Ahsan – April 01, 2016
                                                    </div>
                                                    <div class="rev-text">
                                                        <p>
                                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End review-box -->

                                            <div class="review-box clearfix">
                                                <figure class="rev-thumb"><img src="http://via.placeholder.com/150x150.jpg" alt="">
                                                </figure>
                                                <div class="rev-content">
                                                    <div class="rating">
                                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                                    </div>
                                                    <div class="rev-info">
                                                        Sara – March 31, 2016
                                                    </div>
                                                    <div class="rev-text">
                                                        <p>
                                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End review-box -->

                                        </div>
                                        <!-- End review-container -->
                                    </div>
                                    <!-- /tab_3 -->
                                </div>
                                <!-- /tab-content -->
                            </div>
                            <!-- /tabs_styled -->
                        </div>
                        <!-- /col -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection