<!DOCTYPE html>
@langrtl
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('frontend/img/icon/nstu.ico')}}">
    {{--<meta name="description" content="@yield('meta_description', 'Laravel 5 Boilerplate')">--}}
    {{--<meta name="author" content="@yield('meta_author', 'Anthony Rappa')">--}}
    @yield('meta')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui-smooth.css') }}">

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}
    <style>
        .required:after {
            content:" *";
            color: red;
        }
    </style>
    @stack('after-styles')

    @yield('header-css')
</head>

<body class="{{ config('backend.body_classes') }}">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.demo')
            @include('includes.partials.logged-in-as')
            <br/>

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div><!--content-header-->

                    @include('includes.partials.messages')
                    @yield('content')
                </div><!--animated-->
            </div><!--container-fluid-->
        </main><!--main-->

        @include('backend.includes.aside')
    </div><!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')

    <link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    {{ script('js/jquery-ui-1.10.2.js') }}
    @yield('footer-script')
</body>
</html>
