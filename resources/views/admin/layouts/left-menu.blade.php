<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li> 
                    <a class="waves-effect waves-dark" href="/admin/role" aria-expanded="false"><i class="mdi mdi-account-star-variant"></i><span class="hide-menu">Роль Пользователей</span></a>
                </li>
                <li> 
                    <a class="waves-effect waves-dark" href="/admin/users" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Пользователи</span></a>
                </li>
                <li class="nav-item dropdown">
                    @if ($lang == 'ru')
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-ru"> </span>Русский</a>
                    @elseif($lang == 'kz')
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-kz"> </span>Казахсикй</a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span>Английский</a>
                    @endif
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="/lang/ru"><span class="flag-icon flag-icon-ru"> </span>Русский</a>
                        <a class="dropdown-item" href="/lang/kz"><span class="flag-icon flag-icon-kz"> </span>Казахсикй</a>
                        <a class="dropdown-item" href="/lang/en"><span class="flag-icon flag-icon-us"> </span>Английский</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    @if (\Request::session()->get('country') == 'ru')
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-ru"></span>Россия</a>
                    @elseif(\Request::session()->get('country') == 'kz')
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-kz"></span>Казахстан</a>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"></span>США</a>
                    @endif
                    <div class="dropdown-menu" aria-labelledby="dropdown09">
                        <a class="dropdown-item" href="/country/ru"><span class="flag-icon flag-icon-ru"></span>Россия</a>
                        <a class="dropdown-item" href="/country/kz"><span class="flag-icon flag-icon-kz"></span>Казахстан</a>
                        <a class="dropdown-item" href="/country/en"><span class="flag-icon flag-icon-us"></span>США</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
    <div class="sidebar-footer">
        <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
        <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
        <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="Logout" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <i class="mdi mdi-power"></i>
        </a> 

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</aside>