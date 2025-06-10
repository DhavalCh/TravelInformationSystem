<?php include "header.php" ?>

<!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;" >Registration</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="login" id="loginForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control p-4" id="name" value="<?php if(isset($_REQUEST["name"])) echo $_REQUEST['name']; ?>" name="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your Name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control py-3 px-4" rows="5" id="address" name="address" placeholder="Address"
                                    required="required"
                                    data-validation-required-message="Please enter your Address"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" class="form-control p-4" id="contact" value="<?php if(isset($_REQUEST["contact"])) echo $_REQUEST['contact']; ?>" name="contact" placeholder="Your Contact"
                                    required="required" data-validation-required-message="Please enter your Contact Detail" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control p-4" id="email" value="<?php if(isset($_REQUEST["email"])) echo $_REQUEST['email']; ?>" name="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" class="form-control p-4" id="password" name="password" placeholder="Your Password"
                                    required="required" data-validation-required-message="Please enter a password" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary py-3 px-4" type="submit" id="registrationbtn" name="registration" value="Registration">
                                <button class="btn btn-primary py-3 px-4" type="reset" id="registrationclearbtn">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

<?php include "footer.php" ?>

<?php
if(isset($_REQUEST["registration"])){
  $sql = "INSERT INTO `user`(`Name`, `Address`, `Contact`, `Email`, `Password`) VALUES ('".$_REQUEST["name"]."','".$_REQUEST["address"]."','".$_REQUEST["contact"]."','".$_REQUEST["email"]."','".$_REQUEST["password"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='login.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
} 
mysqli_close($conn);
?>