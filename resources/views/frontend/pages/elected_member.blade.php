@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Elected Members</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <!-- ****** Single Blog Area Start ****** -->
    <section class="single_blog_area p-t-70">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/clients-img/azad.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>ABUL KALAM AZAD</h4>
                                        <h6 class="text-info"> PRESIDENT</h6>
                                        <p>BATCH: 01</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>MD. SAIFUR RAHMAN (SAIF)</h4>
                                        <h6 class="text-info">VICE - PRESIDENT</h6>
                                        <p>BATCH: 02</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>BISHWA JIT GHOSH</h4>
                                        <h6 class="text-info"> VICE - PRESIDENT</h6>
                                        <p>BATCH: 01</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>MARUF HASAN BULBUL</h4>
                                        <h6 class="text-info">GENERAL SECRETARY</h6>
                                        <p>BATCH: 02</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>MD MAINUDDIN</h4>
                                        <h6 class="text-info"> TREASURER</h6>
                                        <p>BATCH: 01</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>MD. FAHIDUL ISLAM (SHAON)</h4>
                                        <h6 class="text-info">ASSISTANT GENERAL SECRETARY</h6>
                                        <p>BATCH: 04 </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="accordion elected-members">
                        <div class="heading">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="head-img">
                                        <img src="frontend/img/bg-img/dummy-profile.jpg" alt="" style="height: 150px">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="head-cont">
                                        <h4>HASNAT RIAZ</h4>
                                        <h6 class="text-info"> ASSISTANT GENERAL SECRETARY</h6>
                                        <p>BATCH: 04</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Single Blog Area End ****** -->
@endsection