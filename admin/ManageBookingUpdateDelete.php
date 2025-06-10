<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){
    if(isset($_REQUEST["updateStatus"])){
        $sql = "UPDATE booking SET status='".$_REQUEST["status"]."' WHERE ID=".$_REQUEST["id"];
        
        if (mysqli_query($conn, $sql)) { 
            echo "<script>window.location='ManageBooking.php';</script>";
        } else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if(isset($_REQUEST["task"])){
      if($_REQUEST["task"]=="delete"){
        $sql = "DELETE FROM booking WHERE ID=".$_REQUEST["id"];
        if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='ManageBooking.php';</script>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
  else if($_REQUEST["task"]=="update"){

    $sql = "select * from booking where ID=".$_REQUEST["id"];
    $result=mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) 
    {
      $row = mysqli_fetch_assoc($result);
  ?>
  <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <?php include "LeftSideMenu.php" ?>
                </div>

                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <span class="text-primary text-uppercase text-decoration-none" href="">Update Booking Status</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Status *</label>
                                        <input type="hidden" value="<?php echo $row["ID"]; ?>" name="id"/>
                                        <select name="status">
                                            <option selected value="Confirm">Confirm</option>
                                            <option value="Waiting">Waiting</option>
                                            <option value="Cancle">Cancel</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="updateStatus" value="Update Status" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
}
}
}
}
 else {
  echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "Footer.php"; ?>