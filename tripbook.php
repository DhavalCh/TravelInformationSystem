<?php include "header.php"; ?>
<?php if(isset($_SESSION['user'])){ ?>
	    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;" >Trip Booking Details</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form action="ConfirmTrip.php" name="login" id="loginForm" novalidate="novalidate">
                            <div class="control-group">
                            	<label>Name :</label>
                            	<input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                                <input type="text" readonly value="<?php echo $_SESSION["user"] ?>" class="form-control p-4" name="name" placeholder="Your Name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            	<label>Start Date :</label>
                                <input type="date" class="form-control p-4" id="contact" name="startdate" placeholder="Your Contact"
                                    required="required" data-validation-required-message="Please enter your Contact Detail" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                	<label>Number of Adults</label>
                                    <input type="number" class="form-control p-4" name="adult" placeholder="No. of Adults"
                                        required="required" data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                	<label>Number of Children</label>
                                    <input type="number" class="form-control p-4" name="child" placeholder="No. of Children"
                                        required="required" data-validation-required-message="Please enter your email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary py-3 px-4" type="submit" name="book" value="Book">
                                <button class="btn btn-primary py-3 px-4" type="reset">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
	echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "footer.php" ?>