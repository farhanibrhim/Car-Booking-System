<div id="modal-2" class="modal fade" role="dialog" tabindex="-1">
    <!-- CREATE AN ANNOUNCEMENT -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add vehicle</h4><button class="btn-close" type="button" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CONTENT IN MODAL -->
                <form method="POST" action="addcarprocess.php" enctype="multipart/form-data">
                    <fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Vehicle Model</label>
                                <input type="text" name=vmodel class="form-control" id="exampleFormControlInput1"
                                    placeholder="Proton Saga" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Vehicle Type</label>
                                <input type="text" name=vtype class="form-control" id="exampleFormControlInput1"
                                    placeholder="Sedan" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Vehicle Year</label>
                                <input type="text" name=vyear class="form-control" id="exampleFormControlInput1"
                                    placeholder="2003" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Vehicle Registration Number</label>
                                <input type="text" name=vreg class="form-control" id="exampleFormControlInput1"
                                    placeholder="NAV 8141" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Rental Price per day (RM)</label>
                                <input type="text" name=vprice class="form-control" id="exampleFormControlInput1"
                                    placeholder="150.50" pattern="^\d+(\.\d{1,2})?$" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Category (View)</label>
                                <?php
                                $sql = "SELECT * FROM tb_viewtype";
                                $result = mysqli_query($con, $sql);

                                echo '<select class="form-select" name="vviewType" id="exampleSelect1" required>';
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<option value = '" . $row['viewType'] . "'>" . $row['viewType_desc'] . "</option>";
                                }
                                echo '</select>';

                                ?>
                            </div>
                        </fieldset>
                        <fieldset>
                            <br>
                            <div class="form-group">
                                <label>Select Image File:</label>
                                <input type="file" name="vmedia" id="vmedia" accept=".png, .jpg, .jpeg" required>
                                <br><br>
                                <input type="hidden" name="vid">
                            </div>
                        </fieldset>
                    </fieldset>
            </div>
            <div class="modal-footer"><button type="reset" class="btn btn-info">Clear</button><button type="submit"
                    name="submit" class="btn btn-info">Submit</button></div>
            </form>
        </div>
    </div>
</div>