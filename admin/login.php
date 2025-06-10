<?php include "header.php" ?>

<!-- Login Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;" >Login</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="login" id="loginForm">
                            <div class="control-group">
                                <input type="text" class="form-control p-4" name="name" id="name" placeholder="User Name"
                                    required="required" data-validation-required-message="Please enter Username" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="password" name="password" class="form-control p-4" id="password" placeholder="Password"
                                    required="required" data-validation-required-message="Please enter a password" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary py-3 px-4" type="submit" name="login" value="Login">
                                <input class="btn btn-primary py-3 px-4" type="reset" name="clear" value="Clear">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
<?php
if(isset($_REQUEST["login"])){
  $sql = "select * from admin where name='".$_REQUEST["name"]."' AND Password='".$_REQUEST["password"]."'";
  $result=mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['admin']=$row["name"];
    $_SESSION['id']=$row["ID"];
    echo "<script>window.location='index.php';</script>";
} else {
  echo "<script>alert('Enter correct credential details')</script>";
}
} 
mysqli_close($conn);
?>