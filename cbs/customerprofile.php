<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
    session_start();
}

include 'headercustomer.php';

$uid = $_SESSION['uid'];

$sql = "SELECT * FROM tb_user
        WHERE u_id='$uid'";

$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

?>
<div class="col-md-8 text-start mx-auto" style="margin-top: 30px">
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <h2 class="text-dark mb-2">Personal Details</h2>
            </div><br>
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary"><span>
                        <?php echo $row["u_name"]; ?>
                    </span></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary"><span>
                        <?php echo $row["u_email"]; ?>
                    </span></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary"><span>
                        <?php echo $row["u_phone"]; ?>
                    </span></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">License Number</h6>
                </div>
                <div class="col-sm-9 text-secondary"><span>
                        <?php echo $row["u_lino"]; ?>
                    </span></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary"><span>
                        <?php echo $row["u_address"]; ?>
                    </span></div>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-12"><a class="btn btn-info" role="button" data-bs-target="#modalProfile"
                        data-bs-toggle="modal">Edit</a></div>
            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function () {
        var error = "<?php echo $_GET['error']; ?>";
        if (error) {
            alert(error);
        }
    }
</script>
<?php include('customerprofilemodal.php'); ?>
<?php include'footermain.php' ?>