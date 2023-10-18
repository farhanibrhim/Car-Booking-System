<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
	session_start();
}

$uid = $_SESSION['uid']; //ic number
$fname = $_POST['fname']; //full name
$fpwd = $_POST['fpwd']; //password
$fpwd1 = $_POST['fpwd1']; //verify password
$fcontact = $_POST['fcontact']; //phone num
$femail = $_POST['femail']; //email
$flic = $_POST['flic']; //license num
$fadd = $_POST['fadd']; //address

$sql1 = "SELECT * FROM tb_user WHERE u_id = $uid";
  $result1 = mysqli_query($con, $sql1);
  $row1 = mysqli_fetch_array($result1);

if (!empty($fpwd) && !empty($fpwd1)) // check if new password is provided
{ 
  if ($fpwd == $fpwd1) 
  {
    if ($row1['u_pwd'] == $fpwd) //if old password same as new password
    { 
      echo "<script>
      window.location.href='customerprofile.php';
      alert('Password same as before');
      </script>";
    }
    else
    {
      $fpwd = password_hash($_POST['fpwd'], PASSWORD_DEFAULT);
    }

  } 
  else 
  {
    echo "<script>
    window.location.href='customerprofile.php';
    alert('Password doenst match');
    </script>";
    exit();
  }
} 
else 
{
  $fpwd = $row1['u_pwd'];
}

$sql = "UPDATE tb_user
		 SET u_name='$fname', u_pwd='$fpwd', u_email='$femail', u_address='$fadd', u_phone='$fcontact', u_lino='$flic'
		 WHERE u_id='$uid'";

mysqli_query($con, $sql);
mysqli_close($con);

echo "<script>
window.location.href='customerprofile.php';
alert('Successful!');
</script>";

?>