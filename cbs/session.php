<?php
if (!session_id()) {
	session_start();
}


if (isset($_SESSION['tid']) != session_id()) {
	header('location: login.php');
}

?>