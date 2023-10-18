<?php
include("dbconnect.php");


$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];
$fpwd1 = $_POST['fpwd1'];
$fname = $_POST['fname'];
$fadd = $_POST['fadd'];
$fcontact = $_POST['fcontact'];
$flic = $_POST['flic'];
$femail = $_POST['femail'];

$sqlA = "SELECT * FROM tb_user WHERE u_id = '$fic'";
$result = mysqli_query($con, $sqlA);
if ($result) {
	$count = mysqli_num_rows($result);

	if ($count > 0) {
		$user = 1;
	} else {
		if ($fpwd == $fpwd1) {
			$fpwd = password_hash($_POST['fpwd'], PASSWORD_DEFAULT);
			$sql = "INSERT INTO tb_user(u_id, u_pwd, u_name, u_email ,u_address, u_phone, u_lino, u_type)
					VALUES ('$fic','$fpwd','$fname','$femail','$fadd','$fcontact','$flic','2')";

			mysqli_query($con, $sql);
			mysqli_close($con);

			echo "<script>
		    window.location.href='index.php';
		    alert('Successful! Please login your account.');
		    </script>";
		} else {
			echo "<script>
		    window.location.href='register.php';
		    alert('Password doenst match');
		    </script>";
		}
	}
}
?>