
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ERP - Login</title>
        @include('imports.cdn.style')
    </head>

    <body id="body" class="dark-sidebar">
        <div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="col-lg-3">
                <div class="card overflow-hidden">
                    <div class="card-body">
                        <div class="pt-3">
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="col-lg-8">
                                    <img src="assets/images/small/business.png" alt="" class="img-fluid mx-auto">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                @if(session('error'))
                                    <span class="text-danger font-weight-bold"><b><center>{{ session('error') }}</center></b><br><br></span>
                                @else
                                    <br><br><br>
                                @endif
                            </div>
                            <form id="login-form" action="{{route('signin')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="user_id" class="form-label">Username or Phone Number or Email <span class="text-danger font-weight-bold">*</span></label>
                                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="Enter Username or Phone Number or Email" required>
                                </div><br>

                                <div class="form-group">
                                    <label for="passsword" class="form-label">Password <span class="text-danger font-weight-bold">*</span></label>
                                    <input type="password" class="form-control" id="passsword" name="password" placeholder="Enter Password" required>
                                </div><br>

                                <div class="text-center py-3 mb-3">
                                    <input type="submit" class="btn btn-primary" value="Login">
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{route('registration')}}" class="btn btn-de-success btn-sm">Registration</a>
                                    <a href="{{route('forget_password')}}" class="btn btn-de-warning btn-sm">Forget Password</a>
                                </div>
                            </form>
                        </div>
                    </div><!--end card-body-->
                </div>
            </div>
        </div>
        @include('imports.cdn.script')
    </body>
    <!--end body-->
</html>
