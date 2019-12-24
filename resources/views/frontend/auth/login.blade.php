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
    <div class="container-login100">
        <div class="wrap-login100">
            {{ html()->form('POST', route('frontend.auth.login.post'))->class('form-horizontal login100-form validate-form')->open() }}
            <span class="login100-form-title p-b-26">
						Welcome Admin
					</span>
            <span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

            <div class="wrap-input100 validate-input" data-validate = "Valid email is: abc@gmail.com">
                {{--<input class="input100" type="text" name="email">--}}
                {{ html()->text('email')
                    ->class('input100')
                    ->placeholder('Email')
                    ->required()
                    ->autofocus() }}
                {{--<span class="focus-input100" data-placeholder="Email"></span>--}}
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="Enter password">
				<span class="btn-show-pass">
				    <i class="zmdi zmdi-eye"></i>
				</span>
                {{--<input class="input100" type="password" name="pass">--}}
                {{ html()->password('password')
                ->class('input100')
                ->placeholder('Password')
                ->required()
                ->autofocus() }}
                {{--<span class="focus-input100" data-placeholder="Password"></span>--}}
            </div>

            <div class="container-login100-form-btn">
                <div class="wrap-login100-form-btn">
                    <div class="login100-form-bgbtn"></div>
                    <button class="login100-form-btn">
                        Login
                        {{--{{ form_submit('Login') }}--}}
                    </button>
                </div>
            </div>

            <div class="text-center p-t-15">
						<span class="txt1">
							Don’t have an account?
						</span>

                <a class="txt2" href="{{ url('register') }}">
                    Sign Up
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