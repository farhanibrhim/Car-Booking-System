<?php
include('dbconnect.php');
include 'cbssession.php';
if (!session_id()) {
    session_start();
}

include 'headerstaff.php';

if (isset($_GET['v_id'])) {
    $vid = $_GET['v_id'];
}

$sql = "SELECT * FROM tb_v WHERE v_id='$vid'"; // KIV here
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
?>


<div class="container">
    <br>
    <button type="submit" class="btn btn-secondary" onclick="location.href='staffmanagecar.php'">Back</button>
    <form method="POST" action="modifycarprocess.php" enctype="multipart/form-data">
        <fieldset>
            <legend class="text-cursive h5 text-red d-block" style="font-size: 35px">Modify vehicle info</legend>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Vehicle Model</label>
                    <input type="text" name=vmodel class="form-control" id="exampleFormControlInput1"
                        value="<?php echo $row['v_model'] ?>" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Vehicle Type</label>
                    <input type="text" name=vtype class="form-control" id="exampleFormControlInput1"
                        value="<?php echo $row['v_type'] ?>" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Vehicle Year</label>
                    <input type="text" name=vyear class="form-control" id="exampleFormControlInput1"
                        value="<?php echo $row['v_year'] ?>" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Vehicle Registration Number</label>
                    <input type="text" name=vreg class="form-control" id="exampleFormControlInput1"
                        value="<?php echo $row['v_reg'] ?>" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Rental Price per day (RM)</label>
                    <input type="text" name=vprice class="form-control" id="exampleFormControlInput1"
                        value="<?php echo $row['v_price'] ?>" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Category (View)</label>
                    <?php

                    $sqlA = "SELECT * FROM tb_viewtype";
                    $resultA = mysqli_query($con, $sqlA);

                    echo '<select class="form-select" name="vviewType" id="exampleSelect1" required>';
                    while ($rowA = mysqli_fetch_array($resultA)) {
                        if ($row['v_viewType'] == $rowA['viewType']) {
                            echo "<option selected = 'selected' value = '" . $rowA['viewType'] . "'>" . $rowA['viewType_desc'] . "</option>";
                        } else {
                            echo "<option value = '" . $rowA['viewType'] . "'>" . $rowA['viewType_desc'] . "</option>";
                        }
                    }
                    echo '</select>';

                    ?>
                </div>
            </fieldset>
            <fieldset>
                <br>
                <div class="form-group">
                    <label>Existing Image File:</label>
                    <img src="img/vehicle/<?php echo $row['v_media']; ?>" height="150" width="150">
                    <br><br>
                    <input type="file" name="vmedia" class="form-control"
                        value="img/vehicle/<?php echo $row['v_media'] ?>">
                    <br><br>
                    <div style="display: inline-block;">
                        <button type="reset" class="btn btn-info">Clear</button>
                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                        <input type="hidden" name="vid" value="<?php echo $row['v_id'] ?>" required>
                    </div>
                    <br><br><br>
                </div>
            </fieldset>
        </fieldset>
    </form>
</div>
<script>
    window.onload = function () {
        var error = "<?php echo $_GET['error']; ?>";
        if (error) {
            alert(error);
        }
    }
</script>
<?php include'footermain.php' ?>