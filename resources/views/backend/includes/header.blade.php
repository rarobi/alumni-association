<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{ asset('Backend/images/icons/logo.jpg') }}" width="89" height="25" alt="CoreUI Logo">
    </a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="nav navbar-nav d-md-down-none">
        <li class="nav-item px-3">
            {{--<a class="nav-link" href="{{ route('frontend.index') }}"><i class="fas fa-home"></i></a>--}}
        </li>

{{--        <li class="nav-item px-3">--}}
{{--            <a class="nav-link" href="#">@lang('navs.frontend.dashboard')</a>--}}
{{--        </li>--}}
        
    </ul>

    <ul class="nav navbar-nav ml-auto">
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<i class="fas fa-bell"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<i class="fas fa-list"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="nav-item d-md-down-none">--}}
            {{--<a class="nav-link" href="#">--}}
                {{--<i class="fas fa-map-marker-alt"></i>--}}
            {{--</a>--}}
        {{--</li>--}}
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
{{--              <span class="d-md-down-none">{{ isset($logged_in_user->name) ? $logged_in_user->name : 'Default' }}</span>--}}
              @if(!is_null( $logged_in_user->profile))
              <img src="/uploads/member_profile/{{ $logged_in_user->profile->image }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
              @else
              <img src="{{ $logged_in_user->first_name }}" class="img-avatar" alt="{{ $logged_in_user->email }}">
              @endif
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-header text-center">
              <strong>Account</strong>
            </div>
              <a class="dropdown-item" href="{{ route('profile') }}">
                  <i class="fas fa-user"></i>Profile
              </a>
            <a class="dropdown-item" href="{{ route('frontend.auth.logout') }}">
                <i class="fas fa-lock"></i> @lang('navs.general.logout')
            </a>
          </div>
        </li>
    </ul>
</header>
