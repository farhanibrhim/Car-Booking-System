<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script&amp;display=swap">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <div>
        <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button"
            style="background: #060445;border-radius: 20;border-top-left-radius: 20;border-top-right-radius: 20;border-bottom-right-radius: 20;border-bottom-left-radius: 20;border-style: none;padding-top: 0;padding-bottom: 10px;">
            <div class="container">
                <button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"
                    style="background: var(--bs-orange);margin-top: 10px;"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"
                        style="color: var(--bs-navbar-disabled-color);"></span></button>
                <div><a class="navbar-brand" href="index.php"><span style="color: rgb(215,109,11);">Careta</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="navbar-nav nav-right">
                        <li class="nav-item"></li>
                        <li class="nav-item"><a class="nav-link" href="publiccar.php"
                                style="color: rgba(224,217,217,0.9);">Cars</a></li>
                    </ul>
                    <p class="ms-auto navbar-text navbar-text navbar-text navbar-text actions"
                        style="margin-top: 20px;">
                        <a class="login" data-bs-target="#modal-1" data-bs-toggle="modal"
                            style="color: rgba(224,217,217,0.9); margin-right: 10px; cursor: pointer;">Log In</a>
                        <a class="btn btn-light action-button" role="button" href="register.php"
                            style="color: rgba(0,0,0,0.9);background: var(--bs-gray-200);border-radius: 10px;border-style: solid;border-color: rgba(0,0,0,0.9);font-size: 16px;padding: 5px 8px; margin-right: 10px;">Sign
                            Up</a>
                    </p>
                </div>
            </div>
        </nav>
    </div>
    <header class="masthead" style="background-image: url('assets/img/carousel-1.jpg');">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"><span>RENT A CAR</span></div>
                <div class="text-uppercase intro-heading"><span>THE BEST RENTAL CAR THAT YOU EVER SEEN</span></div><a
                    class="btn btn-primary text-uppercase btn-xl" role="button" href="#rgstr">REGISTER NOW</a>
            </div>
        </div>
    </header>
    <div>
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h1>WELCOME TO CARETA</h1>
                    <p class="w-lg-50">We help you make your trip enjoyable by having the cheapest rates for rental
                        car.&nbsp;</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                <div class="col">
                    <div class="card" style="height: 320px;">
                        <div class="card-body border rounded p-4"
                            style="background: linear-gradient(black, #060445 60%);"><img
                                class="rounded d-block card-img-top w-100 card-img-top w-100 fit-cover"
                                style="height: 200px;" src="assets/img/choose-a-rental-car.jpg">
                            <h4 class="fw-semibold card-title" style="color: var(--bs-orange);margin-top: 5px;">CAR
                                RESERVATION ANYTIME</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="height: 320px;">
                        <div class="card-body border rounded p-4"
                            style="background: linear-gradient(black, #060445 60%);"><img
                                class="rounded d-block card-img-top w-100 card-img-top w-100 fit-cover"
                                style="height: 200px;" src="assets/img/BEST%20PRICE%20GUARANTEED1.png">
                            <h4 class="fw-semibold card-title" style="color: var(--bs-orange);margin-top: 5px;">BEST
                                PRICE GUARANTEED</h4>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="height: 320px;">
                        <div class="card-body border rounded p-4"
                            style="background: linear-gradient(black, #060445 60%);"><img
                                class="rounded d-block card-img-top w-100 card-img-top w-100 fit-cover"
                                style="height: 200px;" src="assets/img/blog-06-12-17.jpg">
                            <h4 class="fw-semibold card-title" style="color: var(--bs-orange);margin-top: 5px;">MIND
                                PEACE, DRIVE SAFELY</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="col">
            <h1 class="text-center" id="rgstr" style="margin-bottom: 20px;">REGISTER YOUR ACCOUNT NOW !</h1>
        </div>
        <div class="container">
            <form method="POST" action="registerprocess.php">
                <div class="row d-flex d-xl-flex justify-content-center justify-content-xl-center">
                    <div class="col-sm-12 col-lg-10 col-xl-9 col-xxl-7 bg-light shadow-lg" style="border-radius: 5px;">
                        <div class="p-2">
                            <div class="text-center"></div>
                            <form class="user">
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0"><input
                                            class="form-control form-control form-control form-control form-control-user"
                                            type="text" name="fic" placeholder="IC Number" required=""></div>
                                    <div class="col-sm-6"><input
                                            class="form-control form-control form-control form-control form-control-user"
                                            type="email" name="femail" placeholder="Email Address" required=""></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3 mb-sm-0"><input
                                            class="form-control form-control form-control form-control form-control-user"
                                            type="text" name="fname" placeholder="Full Name" required=""></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3 mb-sm-0"><input
                                            class="form-control form-control form-control form-control form-control-user"
                                            type="password" name="fpwd" placeholder="Password" required=""></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-12 mb-3 mb-sm-0"><input
                                            class="form-control form-control form-control form-control form-control-user"
                                            type="password" name="fpwd1" placeholder="Confirm your password"
                                            required=""></div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input
                                            class="form-control form-control form-control form-control form-control-user"
                                            name="fcontact" type="text" placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <input
                                            class="form-control form-control form-control form-control form-control-user"
                                            name="flic" type="text" placeholder="License Number" required="">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div>
                                        <textarea class="form-control" name="fadd" id="exampleTextarea" rows="3"
                                            placeholder="Enter your complete address" required></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <p id="emailErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
                                    <p id="passwordErrorMsg" class="text-danger" style="display: none;">Paragraph</p>
                                </div>
                                <button type="reset" class="btn btn-info d-block btn-user w-100"
                                    style="margin-bottom:5px">Clear</button>
                                <button class="btn btn-primary d-block btn-user w-100" id="submitBtn"
                                    type="submit">Register Account</button>
                                <hr>
                            </form>
                            <div class="text-center"></div>
                            <div class="text-center">
                                <a class="small" href="#" data-bs-target="#modal-1" data-bs-toggle="modal">Already have
                                    an account? Login!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-body" style="height: 333.984px;background: #060445;">
                                <h4 class="card-title" style="color: var(--bs-card-bg);">Get Where You're Going with
                                    Ease with Our Car Booking System</h4>
                                <p class="card-text" style="color: var(--bs-orange);">Say goodbye to the hassle of
                                    traditional car rental. Book your next ride with just a few clicks!. Are you tired
                                    of waiting in line at car rental counters? Want a more convenient way to book your
                                    next ride? Our car booking system is the solution you've been looking for. With a
                                    user-friendly interface and quick booking process, you can get on the road in no
                                    time!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3"><img class="img-fluid d-block mx-auto" src="assets/img/vendor-1.png">
                </div>
                <div class="col-sm-6 col-md-3"><img class="img-fluid d-block mx-auto" src="assets/img/vendor-3.png">
                </div>
                <div class="col-sm-6 col-md-3"><img class="img-fluid d-block mx-auto" src="assets/img/vendor-6.png">
                </div>
                <div class="col-sm-6 col-md-3"><img class="img-fluid d-block mx-auto" src="assets/img/vendor-7.png">
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
<?php include('login.php'); ?>
<?php include 'footermain.php' ?>

</html>
<script>
    window.onload = function () {
        var error = "<?php echo $_GET['error']; ?>";
        if (error) {
            alert(error);
        }
    }
</script>