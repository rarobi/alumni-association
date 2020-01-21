@extends('frontend.layouts.app')

@section('content')
    <!-- ***** Banner Area Start ***** -->
    <div class="fancy-hero-area bg-img bg-overlay animated-img" style="background-image: url({{asset('frontend/img/bg-img/convocation.jpg')}}); height: 230px" >
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="fancy-hero-content text-center">
                        <h4 class="text-info m-t-125">Please registration First</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Banner Area End ***** -->

    <section class="single_blog_area p-t-70 m-b-20">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
            <main>
                <div class="bg_color_2">
                    <div class="container margin_60_35">
                        <div id="register">
                            {{--                                                        <h4 class="text-center">Please registration First!</h4>--}}
                            <div class="row justify-content-center">
                                <div class="col-md-7">
                                    {{ html()->form('POST', url('alumni-register'))->class('form-horizontal')->open() }}
                                    <div class="box_form bg-info p-10">
                                        <div class="row">
                                            {{--                                            <div>--}}
                                            {{--                                                <p> Please pay first brfore registration.</p>--}}
                                            {{--                                            </div>--}}
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Name')->class('col-md-2 form-control-label required')->for('name') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('name')
                                                        ->class('form-control')
                                                        ->placeholder('Your Name')
                                                        ->attribute('maxlength', 191)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Email')->class('col-md-2 form-control-label required')->for('email') }}
                                                <div class="col-md-12">
                                                    {{ html()->email('email')
                                                        ->class('form-control')
                                                        ->placeholder('Your email address')
                                                        ->attribute('maxlength', 191)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Batch')->class('col-md-2 form-control-label required')->for('batch') }}
                                                <div class="col-md-12">
                                                    {{ html()->select('batch_id',$batches)
                                                        ->placeholder("Select a batch")
                                                        ->class('form-control')
                                                        ->attribute('maxlength', 191)
                                                        ->required() }}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Session')->class('col-md-2 form-control-label required')->for('session') }}
                                                <div class="col-md-12">
                                                    {{ html()->select('session', $sessions)
                                                        ->placeholder("Select a session")
                                                        ->class('form-control')
                                                        ->attribute('maxlength', 191)
                                                        ->required() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Passing Year')->class('col-md-8 form-control-label required')->for('passing_year') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('passing_year')
                                                        ->class('form-control')
                                                        ->id('year')
                                                        ->placeholder("Enter Passing year")
                                                        ->attribute('maxlength', 191)
                                                        ->required() }}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Mobile')->class('col-md-2 form-control-label required')->for('mobile') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('mobile')
                                                        ->class('form-control')
                                                        ->placeholder('Your Mobile')
                                                        ->attribute('maxlength', 14)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Roll')->class('col-md-2 form-control-label required')->for('roll') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('roll')
                                                        ->class('form-control')
                                                        ->placeholder('Enter Your B.Sc roll')
                                                        ->attribute('maxlength', 14)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Payment')->class('col-md-6 form-control-label required')->for('payment') }}
                                                <div class="col-md-12">
                                                    {{ html()->select('paymemt_type')
                                                        ->class('form-control payment')
                                                        ->options(['' => 'select an option', 'bkash' => 'Bkash', 'rocket' => 'Rocket', 'bank' => 'Bank Transfer'])
                                                        ->required() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Password')->class('col-md-2 form-control-label required')->for('Password') }}
                                                <div class="col-md-12">
                                                    {{ html()->password('password')
                                                        ->class('form-control')
                                                        ->placeholder('Your password')
                                                        ->attribute('maxlength', 121)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                            <div class="form-group tranx-box col-sm-6" style="display: none">
                                                {{ html()->label('Tranx ID')->class('col-md-6 form-control-label')->for('tranx_id') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('transaction_id')
                                                        ->class('form-control')
                                                        ->placeholder('Enter transaction numbr')
                                                        ->attribute('maxlength', 20)
                                                        ->required()
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                            <div class="form-group branch-box col-sm-6" style="display: none">
                                                {{ html()->label('Branch Name')->class('col-md-6 form-control-label')->for('tranx_id') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('transaction_id')
                                                        ->class('form-control')
                                                        ->placeholder('Enter branch name') }}
                                                </div>
                                            </div>
                                            {{--                                                <div class="form-group col-sm-6">--}}
                                            {{--                                                    <label>Confirm password</label>--}}
                                            {{--                                                    <input type="password" class="form-control" name="confirm_password" placeholder="Confirm password">--}}
                                            {{--                                                </div>--}}
                                        </div>
                                        <div class="row bank" style="display: none">
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Payment Date')->class('col-md-12 form-control-label')->for('payment_date') }}
                                                <div class="col-md-12">
                                                    {{ html()->text('payment_date')
                                                        ->class('form-control')
                                                        ->id('date')
                                                        ->placeholder("Enter Payment date")
                                                        ->attribute('maxlength', 191) }}
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                {{ html()->label('Document')->class('col-md-6 form-control-label required')->for('document') }}
                                                <div class="col-md-12">
                                                    {{ html()->file('document')
                                                        ->class('form-control')
                                                        ->attribute('maxlength', 20)
                                                        ->autofocus() }}
                                                </div>
                                            </div>
                                        </div>
                                        <div id="pass-info" class="clearfix"></div>
                                        <div class="form-group text-center add_top_30">
                                            <input class="btn btn-dark" type="submit" value="Submit">
                                        </div>
                                        <div class="checkbox-holder text-left">
                                            <div class="checkbox_2">
                                                <p class="text-center text-dark">If you are already a member? <a href="{{ url('/alumni-login') }}"><strong class="text-white">Login!</strong></a></p>
                                            </div>
                                        </div>
                                    </div>
                                    {{ html()->form()->close() }}
                                </div>
                            </div>
                            <!-- /row -->
                        </div>
                        <!-- /register -->
                    </div>
                </div>
            </main>
        </div>
    </section>

@endsection

@section('after-scripts')
    <script>
        $("#year").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });

        $('#date').datepicker({
            maxDate: '0',
            dateFormat: "Y-m-d",
            changeYear: true,
            changeMonth: true,
            yearRange: "-100:+0"
        });

        $('.payment').on('change', function() {
            var payment_option = this.value;
            if(payment_option == 'bkash' || payment_option == 'rocket'){
                $('.tranx-box').show();
                $('.bank').hide();
                $('.branch-box').hide();
            } else {
                $('.bank').show();
                $('.branch-box').show();
                $('.tranx-box').hide();

            }
        });
    </script>
@endsection