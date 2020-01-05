<header id="header" class="header_area">
    <div class="container-fluid h-100">
        <div class="row h-100">
             <nav class="h-100 align-items-center navbar navbar-light navbar-expand-lg mainmenu">
                 <div class="col-sm-5">
                    <a class="navbar-brand cste-title" href="{{ url('/') }}">CSTE-Alumni Association</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#fancyNav" aria-controls="fancyNav" aria-expanded="false" aria-label="Toggle navigation"><span class="ti-menu"></span></button>
                 </div>
                 <div class="col-sm-7">
                    <div class="collapse navbar-collapse pull-right" id="fancyNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ active_class(Active::checkUriPattern('/')) }}">
                            <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organization</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a href="{{ url('/login') }}">Login</a></li>
                                <li><a href="{{ url('/alumni-register') }}">Registration</a></li>
                                <li><a href="{{ url('/vision') }}">Vision</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Members</a>
                                    <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="{{ url('/elected-members') }}">Elected Members</a></li>
                                        <li><a class="dropdown-item" href="{{ url('/members') }}">General Members</a></li>
                                        {{--<li class="dropdown">--}}
                                            {{--<a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown3</a>--}}
                                            {{--<ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                                                {{--<li><a href="#">Action</a></li>--}}
                                            {{--</ul>--}}
                                        {{--</li>--}}
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item {{ active_class(Active::checkUriPattern('notice')) }}"><a href="{{ url('/notice') }}">Notice</a></li>
{{--                        <li class="nav-item"><a href="{{ url('/blog') }}">Blog</a></li>--}}
                        <li class="nav-item {{ active_class(Active::checkUriPattern('gallery')) }}"><a href="{{ url('/gallery') }}">Gallery</a></li>
                        <li class="nav-item {{ active_class(Active::checkUriPattern('contact')) }}"><a href="{{ url('/contact') }}">Contact</a></li>
                        @if(Auth::user())
                        <li class="nav-item"><a href="{{ url('logout') }}">Logout</a></li>
                        @endif
                    </ul>
                </div>
                 </div>
             </nav>
        </div>
    </div>
</header>

