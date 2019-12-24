<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSTE Alumni Association</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('img/icon/nstu.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="Backend/css/util.css">
    <link rel="stylesheet" type="text/css" href="Backend/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100" >
        <div class="wrap-login100">
                {{ html()->form('POST', route('frontend.auth.register.post'))->open() }}
                <span class="login100-form-title p-b-20">
						Admin Register
					</span>
                <span class="login100-form-title p-b-25">
						<i class="zmdi zmdi-font"></i>
					</span>

                <div class="wrap-input100 validate-input">
                    {{--<input id="name" class="input100" type="text" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter Full Name">--}}
                    {{ html()->text('first_name')
                    ->placeholder(__('validation.attributes.frontend.first_name'))
                    ->attribute('maxlength', 191)
                    ->required()}}
                </div>

                <div class="wrap-input100 validate-input">
                    {{--<input id="email" class="input100" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">--}}
                    {{ html()->text('last_name')
                    ->placeholder(__('validation.attributes.frontend.last_name'))
                    ->attribute('maxlength', 191)
                    ->required() }}
                </div>

                <div class="wrap-input100 validate-input">
                    {{--<input id="password" class="input100" type="password" name="password" required autocomplete="new-password" placeholder="Enter Password">--}}
                    {{ html()->email('email')
                    ->placeholder(__('validation.attributes.frontend.email'))
                    ->attribute('maxlength', 191)
                    ->required() }}
                </div>

                <div class="wrap-input100 validate-input">
                    {{--<input id="password-confirm" class="input100" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">--}}
                    <span class="btn-show-pass">
				    <i class="zmdi zmdi-eye"></i>
				    </span>
                    {{ html()->password('password')
                    ->placeholder(__('validation.attributes.frontend.password'))
                    ->required() }}
                </div>

            <div class="wrap-input100 validate-input">
                {{--<input id="password-confirm" class="input100" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">--}}
                <span class="btn-show-pass">
				    <i class="zmdi zmdi-eye"></i>
				</span>
                {{ html()->password('password_confirmation')
                ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                ->required() }}
            </div>
                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-15">
						<span class="txt1">
							If you have alrady an account?
						</span>

                    <a class="txt2" href="{{ url('login') }}">
                        Sign In
                    </a>
                </div>
            {{ html()->form()->close() }}
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="Backend/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="Backend/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="Backend/vendor/bootstrap/js/popper.js"></script>
<script src="Backend/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="Backend/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="Backend/vendor/daterangepicker/moment.min.js"></script>
<script src="Backend/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="Backend/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="Backend/js/main.js"></script>

</body>
</html>

