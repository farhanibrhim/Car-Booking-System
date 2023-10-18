<?php
session_start();

include("dbconnect.php");

$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];
$fic = stripcslashes($fic);
$fpwd = stripcslashes($fpwd);
$fic = mysqli_real_escape_string($con, $fic);
$fpwd = mysqli_real_escape_string($con, $fpwd);


$sql = "SELECT * FROM tb_user WHERE u_id='$fic'";

$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);

if ($count == 1) {
	while ($row = mysqli_fetch_assoc($result)) {
		if (password_verify($fpwd, $row['u_pwd'])) {
			//set session
			$_SESSION['u_id'] = session_id();
			$_SESSION['uid'] = $fic;

			if ($row['u_type'] == 1) //admin
			{
				header('Location:staff.php');
			} else {
				header('Location:customerbooking.php');
			}
		} else {
			$message = "Username and/or Password incorrect.\\nTry again.";
			echo "<script>
		    window.location.href='index.php';
		    alert('$message');
		    </script>";
		}
	}
} else {
	$message = "Username and/or Password incorrect.\\nTry again.";
	echo "<script>
		    window.location.href='index.php';
		    alert('$message');
		    </script>";
}

mysqli_close($con);

?>