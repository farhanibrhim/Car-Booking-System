<?php
include("dbconnect.php");
include 'cbssession.php';

if (!session_id()) {
	session_start();
}



// get booking id from URL
if (isset($_GET['id'])) {
	$bid = $_GET['id'];
}

//SQL DELETE
$sql = "DELETE FROM tb_b WHERE b_id = '$bid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

//ADD VERIFICATION !!!!
header('location: customermanage.php');

?>

<?php include 'footermain.php'; ?>