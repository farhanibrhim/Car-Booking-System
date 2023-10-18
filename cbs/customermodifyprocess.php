<?php
include("dbconnect.php");
include 'cbssession.php';
if (!session_id()) {
	session_start();
}


$uid = $_SESSION['uid'];
$fbid = $_POST['fbid'];
$fvec = $_POST['fvec'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];

if (strtotime($frdate) <= strtotime($fpdate)) {
	// Return date is earlier than pickup date
	echo "<script>
	window.location.href='customermanage.php';
	alert('Return date is earlier than or same with pickup date');
	</script>";
	exit;
}

//calculate num of days
$pickup = date('Y-m-d H:i:s', strtotime($fpdate));
$return = date('Y-m-d H:i:s', strtotime($frdate));

//Seconds
$daydiff = abs(strtotime($frdate) - strtotime($fpdate));
//$daydiff = abs($return - $pickup);
$daynum = $daydiff / (60 * 60 * 24);

//Retrieve price from DB
$sqlprice = "SELECT v_price FROM tb_v WHERE v_id='$fvec'";
$resultprice = mysqli_query($con, $sqlprice);
$rowprice = mysqli_fetch_array($resultprice);

//Calculate total price
$totalprice = $daynum * ($rowprice['v_price']);



//UPDATE booking into DB
$sql = "UPDATE tb_b
		SET b_vehicle='$fvec', b_pickdate='$fpdate', b_retdate='$frdate', b_totalprice='$totalprice', b_status='1'
		WHERE b_id ='$fbid'";

mysqli_query($con, $sql);
mysqli_close($con);

//Successful notification for redirect
header('location: customermanage.php');

?>