<?php
session_start();

include("dbconnect.php");

$fic = $_POST['fic'];
$fpwd = $_POST['fpwd'];

$stmt = $con->prepare("SELECT * FROM tb_user WHERE u_id = ?"); //select the user with the given ic
$stmt->bind_param("s", $fic); //bind the value of fic to the statement as a string
$stmt->execute();
$result = $stmt->get_result(); //get the result of the query
$count = $result->num_rows; //count the number in rows

if ($count === 1) //to ensure there are only one user 
{
	$row = $result->fetch_assoc();
	if (password_verify($fpwd, $row['u_pwd'])) {
		//set session
		$_SESSION['u_id'] = session_id();
		$_SESSION['uid'] = $fic;

		if ($row['u_type'] == 1) //admin
		{
			header('Location:staff.php');
			exit;
		} else {
			header('Location:customerbooking.php');
			exit;
		}
	} else {
		$message = "Username and/or Password incorrect.\\nTry again.";
		echo "<script>
		    window.location.href='index.php';
		    alert('$message');
		    </script>";
		exit;
	}
} else {
	$message = "Username and/or Password incorrect.\\nTry again.";
	echo "<script>
		    window.location.href='index.php';
		    alert('$message');
		    </script>";
	exit;
}

$stmt->close();
$con->close();

?>