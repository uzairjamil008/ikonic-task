<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <section class="vh-100 bg-image"
        style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h3 class="text-uppercase text-center mb-5">Login</h3>
                                <form action="login-user" method="post">
                                    @if(Session::has('success'))
                                    <div class="alert alert-success" id="Message">{{Session::get('success')}}</div>
                                    @endif
                                    @if(Session::has('fail'))
                                    <div class="alert alert-danger" id="Message">{{Session::get('fail')}}</div>
                                    @endif
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3cg"><i class="fa fa-envelope"></i>
                                            Your Email</label>
                                        <input type="email" id="email" class="form-control form-control-lg" name="email"
                                            placeholder="Enter Your Name" required />
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4cg"><i class="fa fa-key"></i>
                                            Password</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control form-control-lg" placeholder="Enter Your Password"
                                            required />
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4">Login</button>
                                    </div>
                                    <p class="text-center text-muted mt-5 mb-0">Don't Have an account? <a
                                            href="{{url('registration')}}" class="fw-bold text-body"><u>Registration
                                                Here</u></a><br>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- scripte to show flash message for a few seconds -->
    <script>
    setTimeout(function() {
        $('#Message').fadeOut('fast');
    }, 3000);
    </script>
    <!-- END Script -->
</body>

</html>
