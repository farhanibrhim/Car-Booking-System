<div id="modalProfile" class="modal fade" role="dialog" tabindex="-1">
    <!-- CREATE AN ANNOUNCEMENT -->
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit your profile</h4><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CONTENT IN MODAL -->
                <div class="row gutters">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 text-start mx-auto">
                        <div class="card-body">
                            <form method="POST" action="customerprofileprocess.php" enctype="multipart/form-data">
                                <div class="row gutters">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-primary mb-2">Personal Details</h6>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="fullName">Full
                                                Name</label>
                                            <input name="fname" class="form-control" type="text"
                                                value="<?php echo $row["u_name"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="phone">Password</label>
                                            <input name="fpwd" class="form-control" type="password"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="phone">Confirm
                                                password</label>
                                            <input name="fpwd1" class="form-control" type="password"
                                                value="" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="phone">Phone
                                                Number</label>
                                            <input name="fcontact" class="form-control" type="text"
                                                value="<?php echo $row["u_phone"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="website">Email</label>
                                            <input name="femail" class="form-control" type="email"
                                                value="<?php echo $row["u_email"]; ?>" />
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="form-group"><label class="form-label" for="website">License
                                                Number</label>
                                            <input name="flic" class="form-control" type="text"
                                                value="<?php echo $row["u_lino"]; ?>" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h6 class="text-primary mt-3 mb-2">Address</h6>
                                        <textarea class="form-control" name="fadd" id="exampleFormControlTextarea1"
                                            rows="3"><?php echo $row["u_address"]; ?>
                                                </textarea>
                                    </div>
                                </div>
                                <div class="row gutters">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="text-right" style="margin-top: 30px">
                                            <button class="btn btn-primary" type="submit" name="submit"
                                                onclick="return confirm('Are you sure you want to update?');">Update</button>
                                            <input type="hidden" name="uid" value="<?php echo $row['u_id'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>