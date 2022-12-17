<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                        data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
                    <span>
                        <button type="button"
                                class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Menu</li>

                <li class="mm-active">
                    <a href="#">
                        <i class="metismenu-icon pe-7s-plugin"></i>Applications
                        <i class="fa fa-dochub"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('dashboard')}}" class="">
                                <i class="metismenu-icon"></i>dashboard
                            </a>
                        </li>
                        @foreach(config('MenuAdmin.menu') as $key)

                            @can($key.'.index')
                            <li>
                            <a href="{{route($key.'.index')}}" class="">
                                <i class="metismenu-icon"></i>{{$key}}
                            </a>
                        </li>
                            @endcan
                        @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
