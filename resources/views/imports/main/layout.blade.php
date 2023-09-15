<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ERP - @yield('title')</title>
        @include('imports.cdn.style')
        @yield('head')
    </head>

    <body id="body" class="dark-sidebar">
        @include('imports.main.sidebar')
        @include('imports.main.topbar')

        <div class="page-wrapper">
            <div class="page-content-tab">
                <div class="container-fluid">
                    @include('imports.main.alert')
                    @yield('content')
                </div>

                @include('imports.main.footer')
            </div>
        </div>

        @include('imports.main.minimized-leftbar')
    </body>
    <!--end body-->
</html>
