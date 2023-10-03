@include('imports.cdn.style')
<div class="left-sidebar">
    <!-- LOGO -->
    <div class="brand">
        <a href="{{route('home')}}" class="logo">
            <span>
                <img src="{{ asset('assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm" style="height: 35px">
            </span>
            <span>
                <img src="{{ asset('assets/images/logo.png') }}" alt="logo-large" class="logo-lg logo-light" style="height: 80px">
                <img src="{{ asset('assets/images/logo-dark.png') }}" alt="logo-large" class="logo-lg logo-dark">
            </span>
        </a>
    </div>
    <div class="border-end">
        <ul class="nav nav-tabs menu-tab nav-justified" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#Main" role="tab" aria-selected="true">
                    <span>Accounting<br></span>
                    <i class="mdi mdi-chart-areaspline"></i>
                    <span><b class="font-17 fw-bold line-height-lg">AMS</b></span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#Extra" role="tab" aria-selected="false">
                    <span>Human <br></span>
                    <i class="mdi mdi-google-street-view"></i>
                    <span><b class="font-17 fw-bold line-height-lg">HRMS</b></span>
                </a>
            </li>
        </ul>
    </div>
    <!-- Tab panes -->

    <!--end logo-->
    <div class="menu-content h-100" data-simplebar>
        <div class="menu-body navbar-vertical">
            <div class="collapse navbar-collapse tab-content" id="sidebarCollapse">
                <!-- Navigation -->
                <ul class="navbar-nav tab-pane active" id="Main" role="tabpanel">
                    @include('imports.main.ams-sidebar')
                </ul>
                <ul class="navbar-nav tab-pane" id="Extra" role="tabpanel">
                    <li>
                        <div class="update-msg text-center position-relative">
                            <button type="button" class="btn-close position-absolute end-0 me-2" aria-label="Close"></button>
                            <img src="{{ asset('assets/images/speaker-light.png') }}" alt="" class="" height="110">
                            <h5 class="mt-0">Mannat Themes</h5>
                            <p class="mb-3">We Design and Develop Clean and High Quality Web Applications</p>
                            <a href="javascript: void(0);" class="btn btn-outline-warning btn-sm">Upgrade your plan</a>
                        </div>
                    </li>
                </ul><!--end navbar-nav--->
            </div><!--end sidebarCollapse-->
        </div>
    </div>
</div>

{{-- @include('imports.cdn.script') --}}
