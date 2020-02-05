@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Registration Rules</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="bg-gray p-t-70">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="about-us-text">
                        <div class="row">
                            <div class="col-sm-12">
                                <h4>Registration Process:</h4>
                                <p> Firstly, an alumni pay Tk. 200 to the <strong>BKash/Rocket/Nogod number</strong> <span class="text-danger"> 017220348*9 </span> and must write down or save the Transaction ID, Transaction Date, Sending Bkash Mobile Number and
                                    Documnet (Screenshot of customer receipt message for Mobile Banking Transaction.) during payment for further process.
                                    He/She will use it for registration.
                                </p>
                            </div>
                        </div>
                        <p>In absence of mobile money transfer system one can send the money to the <strong>Alumni Bank A/C</strong> <span class="text-danger">1234567891234 </span> and must write down or save the Originating Branch Name (Exmp: Sonali Bank, Mirpur Branch),
                            Transaction Date and scan copy of customer receipt for Banking Transaction for further registration process.</p>
                        <p>
                            Then alumni fill the necessary field mentioned below for Registration.
                            <ol>
                                <li>1. Name</li>
                                <li>2. E-mail</li>
                                <li>3. Batch</li>
                                <li>4. Session</li>
                                <li>5. Passing Year </li>
                                <li>6. Mobile Number</li>
                                <li>7. Roll(B.Sc. Class Roll)</li>
                                <li>8. Tranx ID(like BKash, Rocket, Nogod etc)</li>
                                <li>9. Password</li>
                                <li>10. Payment other information</li>

                            </ol>
                        </p>
                        <p>
                            Then Alumni have to wait for 3-5 working days for approve the registration.
                        </p>
                        <p>
                            Initially a Batch Admin(Each batch has an Admin who is the representative of the Batch) check the information and verify that. Finally Association Admin approve the registration.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection