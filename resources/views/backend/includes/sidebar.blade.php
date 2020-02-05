<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
            @if ($logged_in_user->isAdmin())
            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ url('dashboard') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    @lang('menus.backend.sidebar.dashboard')
                </a>
            </li>

            <li class="nav-title">
                Application
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('member'))
                }}" href="{{ url('member') }}">
                    <i class="nav-icon fas fa-users"></i>
                    Members
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('notice'))
                }}" href="{{ url('notice') }}">
                    <i class="nav-icon fas fa-bell"></i>
                    Notices
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('event'))
                }}" href="{{ url('event') }}">
                    <i class="nav-icon fas fa-calendar-check"></i>
                    Events
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('gallery'))
                }}" href="{{ url('gallery') }}">
                    <i class="nav-icon fas fa-camera"></i>
                    Gallery
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('announcement'))
                }}" href="{{ url('announcement') }}">
                    <i class="nav-icon fas fa-bullhorn"></i>
                    Announcement
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('certification'))
                }}" href="{{ url('certification') }}">
                    <i class="nav-icon fas fa-certificate"></i>
                    Certification
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{
                    active_class(Active::checkUriPattern('payment'))
                }}" href="{{ url('payment') }}">
                    <i class="nav-icon fas fa-money-bill"></i>
                    Payment Info
                </a>
            </li>

{{--            @if ($logged_in_user->isAdmin())--}}
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('settings/*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('settings/*'))
                    }}" href="#">
                        <i class="nav-icon fa fa-cogs"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/batch*'))
                            }}" href="{{ route('settings.alumni.batch.index') }}">
                                <i class="fa fa-book"></i> Batch
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/batch-admin-email*'))
                            }}" href="{{ route('settings.alumni.batch-admin-email') }}">
                                <i class="fa fa-envelope"></i> Batch Admin Email
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/session*'))
                            }}" href="{{ route('settings.alumni.session.index') }}">
                                <i class="fa fa-book"></i> Session
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/change-password*'))
                            }}" href="{{ route('settings.alumni.change-password') }}">
                                <i class="fa fa-book"></i> Change Password
                            </a>
                        </li>


{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link {{--}}
{{--                                active_class(Active::checkUriPattern('settings/books/publisher*'))--}}
{{--                            }}" href="{{ route('settings.book.publisher.index') }}">--}}
{{--                                <i class="fa fa-book"></i> Book Publishers--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                </li>

            <li class="nav-title">
                Administration
            </li>
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/auth*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('admin/auth*'))
                    }}" href="#">
                        <i class="nav-icon far fa-user"></i>
                        @lang('menus.backend.access.title')

                        @if ($pending_approval > 0)
                            <span class="badge badge-danger">{{ $pending_approval }}</span>
                        @endif
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/user*'))
                            }}" href="{{ route('admin.auth.user.index') }}">
                                @lang('labels.backend.access.users.management')

                                @if ($pending_approval > 0)
                                    <span class="badge badge-danger">{{ $pending_approval }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('admin/auth/role*'))
                            }}" href="{{ route('admin.auth.role.index') }}">
                                @lang('labels.backend.access.roles.management')
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="divider"></li>

                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('admin/log-viewer*'), 'open')
                }}">
                        <a class="nav-link nav-dropdown-toggle {{
                            active_class(Active::checkUriPattern('admin/log-viewer*'))
                        }}" href="#">
                        <i class="nav-icon fas fa-list"></i> @lang('menus.backend.log-viewer.main')
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer'))
                        }}" href="{{ route('log-viewer::dashboard') }}">
                                @lang('menus.backend.log-viewer.dashboard')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{
                            active_class(Active::checkUriPattern('admin/log-viewer/logs*'))
                        }}" href="{{ route('log-viewer::logs.list') }}">
                                @lang('menus.backend.log-viewer.logs')
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            @if ($logged_in_user->hasRole('payment-receiver-admin'))
                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ url('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        @lang('menus.backend.sidebar.dashboard')
                    </a>
                </li>

                <li class="nav-title">
                    Application
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('payment'))
                }}" href="{{ url('payment') }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        Payment Info
                    </a>
                </li>
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('settings/*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('settings/*'))
                    }}" href="#">
                        <i class="nav-icon fa fa-cogs"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/batch*'))
                            }}" href="{{ route('settings.alumni.batch.index') }}">
                                <i class="fa fa-book"></i> Batch
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/session*'))
                            }}" href="{{ route('settings.alumni.session.index') }}">
                                <i class="fa fa-book"></i> Session
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/change-password*'))
                            }}" href="{{ route('settings.alumni.change-password') }}">
                                <i class="fa fa-book"></i> Change Password
                            </a>
                        </li>


                        {{--                        <li class="nav-item">--}}
                        {{--                            <a class="nav-link {{--}}
                        {{--                                active_class(Active::checkUriPattern('settings/books/publisher*'))--}}
                        {{--                            }}" href="{{ route('settings.book.publisher.index') }}">--}}
                        {{--                                <i class="fa fa-book"></i> Book Publishers--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </li>
            @endif
            @if ($logged_in_user->hasRole('batch-admin'))
                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('admin/dashboard'))
                }}" href="{{ url('dashboard') }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        @lang('menus.backend.sidebar.dashboard')
                    </a>
                </li>

                <li class="nav-title">
                    Application
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('member'))
                }}" href="{{ url('member') }}">
                        <i class="nav-icon fas fa-users"></i>
                        Members
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{
                    active_class(Active::checkUriPattern('payment'))
                }}" href="{{ url('payment') }}">
                        <i class="nav-icon fas fa-money-bill"></i>
                        Payment Info
                    </a>
                </li>
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('settings/*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('settings/*'))
                    }}" href="#">
                        <i class="nav-icon fa fa-cogs"></i>
                        Settings
                    </a>

                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/batch*'))
                            }}" href="{{ route('settings.alumni.batch.index') }}">
                                <i class="fa fa-book"></i> Batch
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/session*'))
                            }}" href="{{ route('settings.alumni.session.index') }}">
                                <i class="fa fa-book"></i> Session
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{
                                active_class(Active::checkUriPattern('settings/alumni/change-password*'))
                            }}" href="{{ route('settings.alumni.change-password') }}">
                                <i class="fa fa-book"></i> Change Password
                            </a>
                        </li>


                        {{--                        <li class="nav-item">--}}
                        {{--                            <a class="nav-link {{--}}
                        {{--                                active_class(Active::checkUriPattern('settings/books/publisher*'))--}}
                        {{--                            }}" href="{{ route('settings.book.publisher.index') }}">--}}
                        {{--                                <i class="fa fa-book"></i> Book Publishers--}}
                        {{--                            </a>--}}
                        {{--                        </li>--}}
                    </ul>
                </li>
            @endif

        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
