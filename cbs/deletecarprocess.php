<?php
ob_start();
include('dbconnect.php');
include 'cbssession.php';
if (!session_id()) {
    session_start();
}

include 'headerstaff.php';

if (isset($_GET['v_id'])) {
    $vid = $_GET['v_id'];
}

$sql = "DELETE FROM tb_v WHERE v_id = '$vid'";
$result = mysqli_query($con, $sql);
mysqli_close($con);

header("location: staffmanagecar.php");
ob_end_flush();


?>