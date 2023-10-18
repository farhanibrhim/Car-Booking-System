<?php include 'headermain1.php'; ?>

<div class="container">
    <br>
    <form method="POST" action="registerprocess.php">
        <fieldset>
            <legend>Register your account</legend>
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
                        placeholder="Create a strong Password" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Confirm password</label>
                    <input type="password" name="fpwd1" class="form-control" id="exampleInputPassword1"
                        placeholder="Confirm your password" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Full Name</label>
                    <input type="text" name="fname" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your full name" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Email Address</label>
                    <input type="text" name="femail" class="form-control" id="exampleInputPassword1"
                        placeholder="Email Address" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleTextarea" class="form-label mt-4">Address</label>
                    <textarea class="form-control" name="fadd" id="exampleTextarea" rows="3"
                        placeholder="Enter your complete address" required></textarea>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">Phone number</label>
                    <input type="text" name="fcontact" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your mobile number" required>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label for="exampleInputPassword1" class="form-label mt-4">License number</label>
                    <input type="text" name="flic" class="form-control" id="exampleInputPassword1"
                        placeholder="Enter your valid license number" required>
                </div>
            </fieldset>
            <br>
            <button type="reset" class="btn btn-light">Clear</button> <button type="submit"
                class="btn btn-primary">Submit</button>
            <br><br><br>
        </fieldset>
    </form>
    <br><br><br><br>
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