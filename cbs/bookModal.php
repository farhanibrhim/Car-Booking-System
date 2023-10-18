<div id="modalBook" class="modal fade" role="dialog" tabindex="-1">
    <!-- CREATE AN ANNOUNCEMENT -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Book your vehicle</h4><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CONTENT IN MODAL -->
                <form method="POST" action="customerprocess.php">

                    <br>
                    <legend>Booking form</legend>


                    <div class="form-group">
                        <label for="exampleSelect1">Select Vehicle</label>

                        <?php
                        $sql = "SELECT * FROM tb_v WHERE v_viewType = 1";
                        $result = mysqli_query($con, $sql);

                        echo '<select class="form-select" name="fvec" id="exampleSelect1">';
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value = '" . $row['v_id'] . "'>" . $row['v_model'] . "</option>";
                        }
                        echo '</select>';

                        ?>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label mt-4">Pickup date</label>
                        <input type="date" name="fpdate" class="form-control" id="exampleInputPassword1" required>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1" class="form-label mt-4">Return Date</label>
                        <input type="date" name="frdate" class="form-control" id="exampleInputPassword1" required>
                    </div>



                    <br>
                    <button type="reset" class="btn btn-warning">Clear</button> <button type="submit"
                        class="btn btn-warning">Book</button>
                    <br><br><br>
                </form>
            </div>
        </div>
    </div>
</div>