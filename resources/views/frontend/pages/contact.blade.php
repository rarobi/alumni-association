@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">TOUCH US</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <!-- ***** Contact Area Start ***** -->
    <div class="fancy-contact-area section-padding-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Google Map -->
                    <div id="googleMap"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6">
                    <!-- Contact Details -->
                    <div class="contact-details-area">
                        <div class="section-heading">
                            <h2>Contact Us</h2>
                            <p>There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.</p>
                        </div>
                        <p>01671069297 <br>info.testing@gmail.com
                        </p>
                        <p>Maijdee Court<br>Noakhali City, BD</p>
                        <p>Open hours: 8.00-18.00 Sun-Thus</p>
                    </div>
                    <!-- Follow Us -->
                    <div class="follow-us-area">
                        <h2>Follow Us:</h2>
                        <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <!-- Contact Form -->
                    <div class="contact-form-area">
                        <div class="section-heading">
                            <h2>Get In Touch With Us!</h2>
                            <p>Fill out the form below to recieve a free and confidential.</p>
                        </div>
                        <div class="contact-form">
                            <form action="#" method="post">
                                <!-- Message Input Area Start -->
                                <div class="contact_input_area">
                                    <div class="row">
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="subject" id="website" placeholder="Website" required>
                                            </div>
                                        </div>
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="20" placeholder="Messages" required></textarea>
                                            </div>
                                        </div>
                                        <!-- Single Input Area -->
                                        <div class="col-12">
                                            <button type="submit" class="btn fancy-btn fancy-dark bg-transparent">Send Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area End ***** -->
    <script>
        function myMap() {
            var mapProp= {
                center:new google.maps.LatLng(22.792148,91.102248),
                zoom:5,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBaqjkMsppURGKyNhyPS1aWjRci73iuEGo&callback=myMap">

    </script>

@endsection