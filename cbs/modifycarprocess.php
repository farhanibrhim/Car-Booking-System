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
  $vid = $_POST['vid'];
  $img_name = $_FILES['vmedia']['name'];
  $img_size = $_FILES['vmedia']['size'];
  $tmp_name = $_FILES['vmedia']['tmp_name'];
  $error = $_FILES['vmedia']['error'];


  if (!empty($_FILES['vmedia']['name'])) //if media not empty
  {

      if ($error === 0)
      {
          if ($img_size > 4000000) //if size larger than 4mb
          {
            $em = "Sorry, your file is too large.";
            header("Location: modifycar.php?aa_id=" . $_POST['vid'] . "&error=" . $em);
          }
          else //kalau size tak lebih
          {
              $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
              $img_ex_lc = strtolower($img_ex);
              $allowed_exs = array("jpg", "jpeg", "png");

              if (in_array($img_ex_lc, $allowed_exs))
              {
                  $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                  $img_upload_path = 'img/vehicle/' . $new_img_name;
                  move_uploaded_file($tmp_name, $img_upload_path);

                  // Insert into Database
                  $sql = "UPDATE tb_v
                          SET v_id='$vid', v_reg='$vreg', v_type='$vtype', v_model='$vmodel', v_year='$vyear', v_price='$vprice', v_media='$new_img_name', v_viewType='$vviewType'
                          WHERE v_id='$vid'";
                  mysqli_query($con, $sql);
                  mysqli_close($con);
                  echo "<script>
                window.location.href='staffmanagecar.php';
                alert('Successful');
                </script>";
              }
              else
              {
                  echo "<script>
                  window.location.href='staffmanagecar.php';
                  alert('You can't upload files of this type');
                  </script>";
              }
          }
      }
      else 
      {
        $em = "Unknown error occurred!";
        header("location:modifycar.php?v_id=" . $_POST['vid'] . "&error=" . $em);
      }
  }
  else //kalau media kosong 
  {
    // Insert into Database without the image
    $sql = "UPDATE tb_v
    SET v_id='$vid', v_reg='$vreg', v_type='$vtype', v_model='$vmodel', v_year='$vyear', v_price='$vprice', v_viewType='$vviewType'
    WHERE v_id='$vid'";
    mysqli_query($con, $sql);
    mysqli_close($con);
    echo "<script>
    window.location.href='staffmanagecar.php';
    alert('Successful');
    </script>";
  }

}

?>