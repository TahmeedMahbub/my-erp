
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ERP - Roles</title>
        @include('imports.cdn.style')
    </head>

    <body id="body" class="dark-sidebar">
        @include('imports.main.sidebar')
        @include('imports.main.topbar')

        <div class="page-wrapper">

            <!-- Page Content-->
            <div class="page-content-tab">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <a href="{{route('registration')}}" class="btn btn-success btn-sm"><i class="mdi mdi-plus"></i> Create Roles</a>
                                </div>
                                <h4 class="page-title">User Roles</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->

                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-centered">
                                            <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Company</th>
                                                <th>Bill</th>
                                                <th>Average Bill</th>
                                                <th>Paid Bill</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td><img src="assets/images/small/project-1.jpg" alt="" class="rounded-circle thumb-xs me-1">
                                                    Micromin
                                                </td>
                                                <td>4</td>
                                                <td>$250</td>
                                                <td>$800</td><td class="text-end">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('registration') }}" title="View" class="text-secondary">
                                                            <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                        </a>
                                                        <a href="{{ route('registration') }}" title="Edit" class="text-secondary">
                                                            <i class="mdi mdi-lead-pencil pe-2 text-secondary fs-4"></i>
                                                        </a>
                                                        <a href="{{ route('registration') }}" title="Delete" class="text-secondary">
                                                            <i class="mdi mdi-delete-empty text-secondary fs-4"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td><img src="assets/images/small/project-1.jpg" alt="" class="rounded-circle thumb-xs me-1">
                                                    Micromin
                                                </td>
                                                <td>4</td>
                                                <td>$250</td>
                                                <td>$800</td><td class="text-end">
                                                    <div class="d-flex justify-content-end">
                                                        <a href="{{ route('registration') }}" title="View" class="text-secondary">
                                                            <i class="mdi mdi-eye pe-2 fs-4"></i>
                                                        </a>
                                                        <a href="{{ route('registration') }}" title="Edit" class="text-secondary">
                                                            <i class="mdi mdi-lead-pencil pe-2 text-secondary fs-4"></i>
                                                        </a>
                                                        <a href="{{ route('registration') }}" title="Delete" class="text-secondary">
                                                            <i class="mdi mdi-delete-empty text-secondary fs-4"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td><img src="assets/images/small/project-2.jpg" alt="" class="rounded-circle thumb-xs me-1">
                                                    ZZ Diamond
                                                </td>
                                                <td>2</td>
                                                <td>$180</td>
                                                <td>$400</td>
                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end">
                                                        <i class="mdi mdi-eye pe-2"></i>
                                                        <i class="mdi mdi-lead-pencil pe-2"></i>
                                                        <i class="mdi mdi-delete-empty"></i>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table><!--end /table-->
                                    </div><!--end /tableresponsive-->
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col-->
                    </div><!--end row-->
                </div><!-- container -->

                @include('imports.main.footer')
            </div>
        </div>


    </body>
    <!--end body-->
</html>
