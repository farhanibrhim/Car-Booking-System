<?php
include("dbconnect.php");
include 'cbssession.php';

if (!session_id()) {
    session_start();
}

$uid = $_SESSION['uid'];
$fvec = $_POST['fvec'];
$fpdate = $_POST['fpdate'];
$frdate = $_POST['frdate'];

//calculate num of days
$pickup = date('Y-m-d H:i:s', strtotime($fpdate));
$return = date('Y-m-d H:i:s', strtotime($frdate));


//check date
if (strtotime($frdate) <= strtotime($fpdate)) {
    // Return date is earlier than pickup date
    echo "<script>
    window.location.href='customermanage.php';
    alert('Return date is earlier than or same with pickup date');
    </script>";
    exit;
} else {
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

    $sqlreg = "SELECT v_id FROM tb_v WHERE v_id='$fvec'";
    $vmodel1 = mysqli_query($con, $sqlreg);
    $vmodel = mysqli_fetch_array($vmodel1);



    //Record (Insert) new booking into DB
    $sql = "INSERT INTO tb_b(b_customer, b_vehicle, b_pickdate, b_retdate, b_totalprice, b_status)
		VALUES ('$uid','$fvec','$fpdate','$frdate','$totalprice', '1')";
}
mysqli_query($con, $sql);
mysqli_close($con);

//Successful notification for redirect
echo "<script>
        window.location.href='customermanage.php';
        alert('Successful!');
        </script>";

?>