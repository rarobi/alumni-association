<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">
                @lang('menus.backend.sidebar.general')
            </li>
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

            {{--<li class="nav-item nav-dropdown {{--}}
                    {{--active_class(Active::checkUriPattern('library/*'), 'open')--}}
                {{--}}">--}}
                {{--<a class="nav-link nav-dropdown-toggle {{--}}
                        {{--active_class(Active::checkUriPattern('library/*'))--}}
                    {{--}}" href="#">--}}
                    {{--<i class="nav-icon fa fa-list"></i>--}}
                    {{--Library--}}
                {{--</a>--}}

                {{--<ul class="nav-dropdown-items">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('library/book/entry*'))--}}
                            {{--}}" href="{{ route('library.book.entry.index') }}">--}}
                            {{--<i class="fa fa-book"></i> Book Entry--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('library/book/issue*'))--}}
                            {{--}}" href="{{ route('library.book.issue.index') }}">--}}
                            {{--<i class="fa fa-book-medical"></i> Issue Book--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('library/book/return*'))--}}
                            {{--}}" href="{{ route('library.book.return.index') }}">--}}
                            {{--<i class="fa fa-book-reader"></i> Return Book--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('library/book/distributed*'))--}}
                            {{--}}" href="{{ route('library.book.distributed.index') }}">--}}
                            {{--<i class="fa fa-bookmark"></i> Distributed Books--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('library/book/member-history*'))--}}
                            {{--}}" href="{{ route('library.book.member.history') }}">--}}
                            {{--<i class="fa fa-book-open"></i> Books History--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class="nav-item nav-dropdown {{--}}
                    {{--active_class(Active::checkUriPattern('account/*'), 'open')--}}
                {{--}}">--}}
                {{--<a class="nav-link nav-dropdown-toggle {{--}}
                        {{--active_class(Active::checkUriPattern('account/*'))--}}
                    {{--}}" href="#">--}}
                    {{--<i class="nav-icon fa fa-list"></i>--}}
                    {{--Account--}}
                {{--</a>--}}

                {{--<ul class="nav-dropdown-items">--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('account/list/*'))--}}
                            {{--}}" href="{{ url('account/list/all') }}">--}}
                            {{--<i class="fa fa-piggy-bank"></i> Accounts--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('account/income/*'))--}}
                            {{--}}" href="{{ route('account.income.index') }}">--}}
                            {{--<i class="fa fa-money-bill"></i> Income--}}
                        {{--</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{--}}
                                {{--active_class(Active::checkUriPattern('account/expense/*'))--}}
                            {{--}}" href="{{ route('account.expense.index') }}">--}}
                            {{--<i class="fa fa-money-bill-wave"></i> Expense--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

                {{--<li class="nav-title">--}}
                    {{--Settings--}}
                {{--</li>--}}
            @if ($logged_in_user->isAdmin())
                <li class="nav-item nav-dropdown {{
                    active_class(Active::checkUriPattern('settings/*'), 'open')
                }}">
                    <a class="nav-link nav-dropdown-toggle {{
                        active_class(Active::checkUriPattern('settings/*'))
                    }}" href="#">
                        <i class="nav-icon fa fa-list"></i>
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
        </ul>
    </nav>

    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div><!--sidebar-->
