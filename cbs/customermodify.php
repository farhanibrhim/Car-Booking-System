<?php
include('dbconnect.php');
include 'cbssession.php';

if (!session_id()) {
    session_start();
}

include 'headercustomer.php';


if (isset($_GET['id'])) {
    $bid = $_GET['id'];
}

$sql1 = "SELECT * FROM tb_b WHERE b_id='$bid'";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_array($result1);

$sql = "SELECT * FROM tb_v WHERE v_viewType = 1";
$result = mysqli_query($con, $sql);

?>
<div class="col-sm-6 text-start mx-auto">
    <br><br>
    <button type="submit" class="btn btn-secondary" onclick="location.href='customermanage.php'">Back</button>
    <form method="POST" action="customermodifyprocess.php">
        <br>
        <legend>Modify form</legend>
        <br><br>
        <div class="form-group">
            <label for="exampleSelect1">Select Vehicle</label>
            <?php

            echo '<select class="form-select" name="fvec" id="exampleSelect1">';
            while ($rowv = mysqli_fetch_array($result)) {
                if ($rowv['v_id'] == $row1['b_vehicle']) {
                    echo "<option selected = 'selected' value = '" . $rowv['v_id'] . "'>" . $rowv['v_model'] . "</option>";
                } else {
                    echo "<option value = '" . $rowv['v_id'] . "'>" . $rowv['v_model'] . "</option>";
                }
            }
            echo '</select>';

            ?>

        </div>
        <br>
        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Pickup date</label>
            <input type="date" name="fpdate" class="form-control" id="exampleInputPassword1"
                value="<?php echo $row1['b_pickdate'] ?>" required>
        </div>



        <div class="form-group">
            <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
            <input type="date" name="frdate" class="form-control" id="exampleInputPassword1"
                value="<?php echo $row1['b_retdate'] ?>" required>
        </div>

        <input type="hidden" name="fbid" value="<?php echo $row1['b_id'] ?>" required>



        <br>
        <button type="submit" class="btn btn-primary">Modify</button>
        <br><br><br>


    </form>
</div>
<div class="container py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>List Vehicles</h2>
            <p class="w-lg-50">List cars that available. Choose your car and enjoy your trip !</p>
        </div>
    </div>
    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
        <?php

        $sql2 = "SELECT * FROM tb_v";
        $result2 = mysqli_query($con, $sql2);

        while ($row = mysqli_fetch_array($result2)) {
            $floatValue = $row['v_price'];
            $formattedValue = number_format($floatValue, 2);
            echo '<div class="col">';
            echo "<div class='card'><img id='vmedia" . $row['v_media'] . " class='card-img-top w-100 d-block card-img-top w-100 fit-cover' style='height:200px;'' src='img/vehicle/" . $row['v_media'] . "'>";
            echo '<div class="card-body p-4">';
            echo '<h4 id="vmodel' . $row['v_model'] . '" class="card-title" style="max-height: 150px; overflow:hidden;">' . $row["v_model"] . '</h4>';
            echo '<p id="vtype' . $row['v_type'] . '" class="text card-text mb-0">Vehicle Type: ' . $row["v_type"] . '</p>';
            echo '<p id="vyear' . $row['v_year'] . '" class="text card-text mb-0">Vehicle Year: ' . $row["v_year"] . '</p>';
            echo '<p id="vprice' . $row['v_price'] . '" class="text card-text mb-0">Vehicle Price (per day): RM' . $formattedValue . '</p>';
            echo '<div class="d-flex">
                  <div>';
            echo '</div>';
            echo '<form>';
            echo '<fieldset>
                  <input type="hidden" name="cid" value="' . $row['v_id'] . '">
                  </fieldset>';
            echo '</div>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
<script>
    window.onload = function () {
        var error = "<?php echo $_GET['error']; ?>";
        if (error) {
            alert(error);
        }
    }
</script>
<?php include 'footermain.php'; ?>