<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    <!-- Brand Logo Light -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-light">
        <span class="logo-lg">
            <img src="{{asset('admin-assets/images/logo.png')}}" alt="logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin-assets/images/logo-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Brand Logo Dark -->
    <a href="{{route('admin.dashboard')}}" class="logo logo-dark">
        <span class="logo-lg">
            <img src="{{asset('admin-assets/images/logo-dark.png')}}" alt="dark logo">
        </span>
        <span class="logo-sm">
            <img src="{{asset('admin-assets/images/logo-dark-sm.png')}}" alt="small logo">
        </span>
    </a>

    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{route('admin.account.edit', Auth::user()->name)}}">
                <img src="{{asset('admin-assets/images/users/avatar-1.jpg')}}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{Auth::user()->name}}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title">Navigation</li>

            <li class="side-nav-item">
                <a href="{{route('admin.dashboard')}}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> Dashboards </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-sections" class="side-nav-link">
                    <i class="mdi mdi-card-account-details-outline"></i>
                    <span> Sections </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebar-sections">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.banner.index')}}">Banner</a>
                        </li>
                        <li>
                            <a href="{{route('admin.about.index')}}">About</a>
                        </li>
                        <li>
                            <a href="{{route('admin.partner.index')}}">Partner</a>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#registration-collapse">
                                <span> Registration </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="registration-collapse">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.region.index')}}">Regions</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.application-area.index')}}">Application Area</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.workers-registration.index')}}">Workers</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.patients-registration.index')}}">Patients</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#worker-collapse">
                                <span> Worker </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="worker-collapse">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.worker-categories.index')}}">Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.worker.index')}}">Workers</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#gallery-collapse">
                                <span> Gallery </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="gallery-collapse">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{route('admin.gallery-categories.index')}}">Categories</a>
                                    </li>
                                    <li>
                                        <a href="{{route('admin.gallery.index')}}">Images</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="{{route('admin.report.index')}}">Report</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.menu.index')}}" class="side-nav-link">
                    <i class="ri-menu-fill"></i>
                    <span> Menu </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.settings')}}" class="side-nav-link">
                    <i class="ri-settings-2-line"></i>
                    <span> Settings </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{route('admin.users.index')}}" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> Users </span>
                </a>
            </li>





        </ul>
        <!--- End Sidemenu -->

    </div>
</div>
<!-- ========== Left Sidebar End ========== -->