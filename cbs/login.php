<div id="modal-1" class="modal fade" role="dialog" tabindex="-1">
    <!-- CREATE AN ANNOUNCEMENT -->
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Login to your account</h4><button class="btn-close" type="button"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- CONTENT IN MODAL -->
                <form method="POST" action="loginprocess.php">
                    <fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label mt-4">IC Number</label>
                                <input type="text" name="fic" class="form-control" id="exampleInputPassword1"
                                    placeholder="Enter verification card number" required>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                                <input type="password" name="fpwd" class="form-control" id="exampleInputPassword1"
                                    placeholder="Please enter your password" required>
                            </div>
                            <br>
                            <div style="text-align: right;">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <br><br><br>
                        </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>