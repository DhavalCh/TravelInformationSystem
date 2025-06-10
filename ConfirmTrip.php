<?php include "header.php"; ?>
<?php if(isset($_SESSION['user'])){ 
    $sql="select * from trip where ID=".$_REQUEST["id"];
    $result=mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $adultprice=(int)$_REQUEST["adult"]*(double)$row['price_adult'];
    $childprice=(int)$_REQUEST["child"]*(double)$row['price_child'];
    $amount=$adultprice+$childprice;
    ?>
	    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="text-center mb-3 pb-3">
                <h1 class="text-primary text-uppercase" style="letter-spacing: 5px;" >Trip Booking Details</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form bg-white" style="padding: 30px;">
                        <div id="success"></div>
                        <form name="login" id="loginForm" novalidate="novalidate">
                            <div class="control-group">
                            	<label>Name :</label>
                                <input type="hidden" name="id" value="<?php echo $_REQUEST["id"]; ?>" />
                                <input type="text" readonly class="form-control p-4" value="<?php echo $_SESSION['user']; ?>" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                            	<label>Start Date :</label>
                                <input type="date" class="form-control p-4" id="contact" name="startdate" value="<?php echo $_REQUEST['startdate']; ?>"  />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                	<label>Number of Adults</label>
                                    <input type="number" readonly class="form-control p-4" name="adult" value="<?php echo $_REQUEST['adult']; ?>" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                	<label>Number of Children</label>
                                    <input type="number" readonly class="form-control p-4" name="child" value="<?php echo $_REQUEST['child']; ?>" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="control-group col-sm-6">
                                    <label>Total Amount of Adults</label>
                                    <input type="number" readonly class="form-control p-4" name="price_adult" value="<?php echo $adultprice; ?>" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group col-sm-6">
                                    <label>Total Amount of Children</label>
                                    <input type="number" readonly class="form-control p-4" name="price_child" value="<?php echo $childprice; ?>" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                
                                <label>Total Amount :</label>
                                <input type="number" class="form-control p-4" readonly id="contact" name="totalAmount" value="<?php echo $amount; ?>" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <label>Trip Status :</label>
                                <input type="text" readonly value="Pending" class="form-control p-4" name="status" placeholder="Your Contact"
                                    required="required" data-validation-required-message="Please enter your Contact Detail" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="text-center">
                                <input class="btn btn-primary py-3 px-4" type="submit" name="confirm" value="Confirm">
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

<?php
if(isset($_REQUEST["confirm"])){
  $sql = "INSERT INTO `booking`(`user_id`, `tripID`, `StartDate`, `Child`, `adult`,`totalAmount`,`status`) VALUES ('".$_SESSION['id']."','".$_REQUEST["id"]."','".$_REQUEST["startdate"]."','".$_REQUEST["child"]."','".$_REQUEST["adult"]."','".$_REQUEST["totalAmount"]."','".$_REQUEST["status"]."')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>window.location='BookedTrip.php';</script>";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
} 
mysqli_close($conn);
?>