<?php
include "dbconnect.php";
include 'cbssession.php';
if (!session_id()) {
	session_start();
}

if (isset($_POST['submit']) && isset($_FILES['vmedia'])) {

	$vmodel = $_POST['vmodel'];
	$vtype = $_POST['vtype'];
	$vyear = $_POST['vyear'];
	$vreg = $_POST['vreg'];
	$vprice = $_POST['vprice'];
	$vviewType = $_POST['vviewType'];
	$vmedia = $_FILES['vmedia'];
	$img_name = $_FILES['vmedia']['name'];
	$img_size = $_FILES['vmedia']['size'];
	$tmp_name = $_FILES['vmedia']['tmp_name'];
	$error = $_FILES['vmedia']['error'];


	if ($error === 0) {
		if ($img_size > 4000000) {
			echo "<script>
			window.location.href='staffmanagecar.php';
			alert('Sorry, your file is too large.');
			</script>";
		} else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png");

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
				$img_upload_path = 'img/vehicle/' . $new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO tb_v(v_reg, v_type, v_model, v_year, v_price, v_media, v_viewType)
                VALUES ('$vreg', '$vtype', '$vmodel','$vyear', '$vprice', '$new_img_name', '$vviewType')";    
              $result=mysqli_query($con,$sql);
              if($result){
                 echo "<script>
                 window.location.href='staffmanagecar.php';
                 alert('Car successfully been added');
                 </script>";   
              }else{
                 die(mysqli_error($con));
              }
			} else {
				echo "<script>
				window.location.href='staffmanagecar.php';
				alert('You can't upload this type of file');
				</script>";
			}
		}
	} else {
		echo "<script>
				window.location.href='staffmanagecar.php';
				alert('Unknown error occurred');
				</script>";
	}

} else {
	header("Location: staffmanagecar.php");
}

?>