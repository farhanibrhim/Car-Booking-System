<?php

include 'dbconnect.php';

$uid = $_SESSION['uid'];
$sql = "SELECT * FROM tb_user WHERE u_id = $uid";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if ($row['u_type'] == 2) //if staff
{
    session_destroy();
    echo "<script>
    window.location.href='index.php';
    alert('Return date is earlier than pickup date');
    </script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Careta - Staff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="keretaa.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap1.min.css">
    <link rel="stylesheet" href="assets/css/aos.min.css">
    <link rel="stylesheet" href="assets/css/Animation-Cards-_app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
    .footer{
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: linear-gradient(black, #060445 60%);
   color: gray;
   text-align: center;
   font-family: raleway;
}
</style>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navbar-fixed-top navigation-clean-button"
            style="background: #060445;border-radius: 20;border-top-left-radius: 20;border-top-right-radius: 20;border-bottom-right-radius: 20;border-bottom-left-radius: 20;border-style: none;padding-top: 0;padding-bottom: 10px;">
            <div class="container">
                <button data-bs-toggle="collapse" data-bs-target="#navcol-1" class="navbar-toggler"
                    style="background: var(--bs-orange);margin-top: 10px;"><span class="visually-hidden">Toggle
                        navigation</span><span class="navbar-toggler-icon"
                        style="color: var(--bs-navbar-disabled-color);"></span></button>
                <div><a class="navbar-brand" href="staff.php"><span style="color: rgb(215,109,11);">Careta</span></a>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255,255,255);">
                    <ul class="navbar-nav nav-right">
                        <li class="nav-item"><a class="nav-link" href="staff.php"
                                style="color: rgba(224,217,217,0.9);">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="staffmanagecar.php"
                                style="color: rgba(224,217,217,0.9);">Car List</a></li>
                        <li class="nav-item"><a class="nav-link" href="staffmanagebooking.php"
                                style="color: rgba(224,217,217,0.9);">Manage Booking</a></li>
                    </ul>
                    <p class="ms-auto navbar-text navbar-text navbar-text navbar-text actions"
                        style="margin-top: 20px;">
                        <a class="btn btn-light action-button" role="button" href="logout.php"
                            onclick="return confirm('Are you sure you want to log out?');"
                            style="color: rgba(0,0,0,0.9);background: var(--bs-gray-200);border-radius: 10px;border-style: solid;border-color: rgba(0,0,0,0.9);font-size: 16px;padding: 5px 8px; margin-right: 10px;">Log
                            out</a>
                    </p>
                </div>
            </div>
        </nav>
    </div>
</body>
<?php include('login.php'); ?>
</html>
