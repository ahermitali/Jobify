<div class="navbar-header">
    <div class="d-flex">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('admin/assets/images/logo.svg')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('admin/assets/images/logo-dark.png')}}" alt="" height="17">
                </span>
            </a>

            <a href="index.html" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('admin/assets/images/logo-light.svg')}}" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('admin/assets/images/logo-light.png')}}" alt="" height="19">
                </span>
            </a>
        </div>

        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
            <i class="fa fa-fw fa-bars"></i>
        </button>

        <!-- App Search-->
        <form class="app-search d-none d-lg-block">
            <div class="position-relative">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="bx bx-search-alt"></span>
            </div>
        </form>

        <div class="dropdown dropdown-mega d-none d-lg-block ms-2">
            <button type="button" class="btn header-item waves-effect" data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                <span key="t-megamenu">Mega Menu</span>
                <i class="mdi mdi-chevron-down"></i>
            </button>
            <div class="dropdown-menu dropdown-megamenu">
                <div class="row">
                    <div class="col-sm-8">

                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li>
                                        <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-rating">Rating</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-forms">Forms</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-tables">Tables</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-charts">Charts</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <h5 class="font-size-14" key="t-applications">Applications</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li>
                                        <a href="javascript:void(0);" key="t-ecommerce">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-calendar">Calendar</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-email">Email</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-projects">Projects</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-tasks">Tasks</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-contacts">Contacts</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-4">
                                <h5 class="font-size-14" key="t-extra-pages">Extra Pages</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li>
                                        <a href="javascript:void(0);" key="t-light-sidebar">Light Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-compact-sidebar">Compact Sidebar</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-horizontal">Horizontal layout</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-maintenance">Maintenance</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-coming-soon">Coming Soon</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-timeline">Timeline</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-faqs">FAQs</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="font-size-14" key="t-ui-components">UI Components</h5>
                                <ul class="list-unstyled megamenu-list">
                                    <li>
                                        <a href="javascript:void(0);" key="t-lightbox">Lightbox</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-range-slider">Range Slider</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-sweet-alert">Sweet Alert</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-rating">Rating</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-forms">Forms</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-tables">Tables</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" key="t-charts">Charts</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-sm-5">
                                <div>
                                    <img src="{{ asset('admin/assets/images/megamenu-img.png')}}" alt="" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex">

        <div class="dropdown d-inline-block d-lg-none ms-2">
            <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="mdi mdi-magnify"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                aria-labelledby="page-header-search-dropdown">

                <form class="p-3">
                    <div class="form-group m-0">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        

        

        

        <div class="dropdown d-inline-block">
            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="rounded-circle header-profile-user" src="{{ asset('admin/assets/images/users/avatar-1.jpg')}}"
                    alt="Header Avatar">
                <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                    <div>{{ Auth::user()->name }}</div>
                </span>
                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bx bx-user font-size-16 align-middle me-1"></i> <span key="t-profile">Profile</span></a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item text-danger">
                <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> 
                <span>Logout</span>
            </button>
        </form>            </div>
        </div>




        

    </div>
</div>

