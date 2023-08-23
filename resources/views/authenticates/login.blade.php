
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
                            <form id="login-form" action="/signin.php" method="post">
                                <div class="form-group">
                                    <label for="username" class="form-label">Username or Phone Number or Email *</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username or Phone Number or Email">
                                </div><br>

                                <div class="form-group">
                                    <label for="passsword" class="form-label">Password *</label>
                                    <input type="password" class="form-control" id="passsword" name="password" placeholder="Enter Password">
                                </div><br>

                                <div class="text-center py-3 mb-3">
                                    <input type="submit" class="btn btn-primary" value="Login">
                                </div>

                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-de-success btn-sm">Registration</button>
                                    <button type="button" class="btn btn-de-warning btn-sm">Forget Password</button>
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
