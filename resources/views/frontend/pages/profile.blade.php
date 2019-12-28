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
                                    <img class="thumbnail-image" src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height:190px">
                                    <div class="edit">
                                        <label for="user-profile-image">
                                            <input type="file" name="image_path" class="file thumbnail-file" id="user-profile-image" accept="image/*" style="display: none;">
                                            <i class="fa fa-camera fa-2x"></i>
                                        </label>
                                    </div>
                                    <input type="submit" value="Submit" id="submit-button" style="display: none;">

                                    <div id="progress" class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-primary"></div>
                                    </div>
                                    <h1>Mr. Robiul Alam</h1>
                                </figure>
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
                                        <div class="indent_title_in">
                                            <i class="pe-7s-news-paper"></i>
                                            <h3>Educational Statement</h3>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Institute: Noakhali Science & Technology University</p>
                                            <p>Department: CSTE</p>
                                            <p>Batch: 06</p>
                                            <p>Session: 2010-11</p>

                                        </div> </div>
                                    <!-- /tab_1 -->
                                    <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
                                        <div class="indent_title_in">
                                            <i class="pe-7s-user"></i>
                                            <h3>Personal statement</h3>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Name: Md. Robiul Alam</p>
                                            <p>Age: 30 years</p>
                                            <p>Mobile: 01671069297</p>
                                            <p>Date of Birth: 1993/08/17</p>
                                            <p>Email: prothomrobi@gmail.com</p>
                                            <!-- /row-->
                                        </div>
                                        <!--  End wrapper_indent -->

                                    </div>
                                    <!-- /tab_2 -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                        <div class="indent_title_in">
                                            <i class="pe-7s-news-paper"></i>
                                            <h3>Professional Statement</h3>
                                        </div>
                                        <div class="wrapper_indent">
                                            <p>Institute: .............................</p>
                                            <p>Department: ..................</p>
                                            <p>Designation: ................</p>

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

@section('after-scripts')
    <script type="text/javascript" >

        $('.thumbnail-file').change(function () {
            readURL(this);
            $('#submit-button').show();
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.thumbnail-image')
                        .attr('src', e.target.result)
                        .width(220)
                        .height(220);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        var URL = "#";
        $("#uploadimage").on('submit', (function (e) {
            e.preventDefault();
            $.ajax({
                url: URL,
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    $('#submit-button').hide();
                    $('#progress').show();
                    var progress = parseInt(100, 0);
                    $('#progress .progress-bar').css('width', progress + '%');

                    $('#progress').delay(800).queue(function(n) {
                        $(this).fadeOut(); n();
                    });
                }
            });
        }));

    </script>
@endsection