<?php
include("dbconnect.php");
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

//retrieve data from approval page
$fbid = $_POST['fbid'];
$fstatus = $_POST['fstatus'];

//update booking status
$sql = "UPDATE tb_b
		SET b_status='$fstatus'
		WHERE b_id ='$fbid'";

mysqli_query($con, $sql);
mysqli_close($con);


header('location: staffmanagebooking.php');
?>