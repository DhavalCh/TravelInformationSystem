<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){
    if(isset($_REQUEST["updateplace"])){
        if($_FILES['place_image']['name']!="")
        {
            $img = $_FILES['place_image']['name'];
            $tmpdir = $_FILES['place_image']['tmp_name'];
            $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)); // get image extension
            // valid image extensions
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            if(in_array($ext, $valid_extensions)){
                $path="../".$_REQUEST["oldimage"];
                echo $path;
                unlink($path);
                $sql = "UPDATE trip SET destination='".$_REQUEST["destination"]."', image='places/".$img."', price_adult='".$_REQUEST["price_adult"]."', price_child='".$_REQUEST["price_child"]."', duration='".$_REQUEST["duration"]."', description='".$_REQUEST["description"]."'  WHERE ID=".$_REQUEST["id"];
            } else {
                echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
                echo "<script>window.location='ManageTripUpdateDelete.php?id=".$_REQUEST['id']."&task=update"."';</script>";
            }
        }
        else
           $sql = "UPDATE trip SET destination='".$_REQUEST["destination"]."', price_adult='".$_REQUEST["price_adult"]."', price_child='".$_REQUEST["price_child"]."', duration='".$_REQUEST["duration"]."', description='".$_REQUEST["description"]."' WHERE ID=".$_REQUEST["id"];
        
        if (mysqli_query($conn, $sql)) { 
            move_uploaded_file($tmpdir, "../places/".$img); 
            echo "<script>window.location='ManageTrip.php';</script>";
        } else echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    if(isset($_REQUEST["task"])){
      if($_REQUEST["task"]=="delete"){
        $path="../".$_REQUEST["path"];
        unlink($path);
        $sql = "DELETE FROM trip WHERE ID=".$_REQUEST["id"];
        if (mysqli_query($conn, $sql)) {
          echo "<script>window.location='ManageTrip.php';</script>";
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      }
  else if($_REQUEST["task"]=="update"){

    $sql = "select * from trip where ID=".$_REQUEST["id"];
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
                                <span class="text-primary text-uppercase text-decoration-none" href="">Update Trip</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Destination *</label>
                                        <input type="hidden" value="<?php echo $row["ID"]; ?>" name="id"/>
                                        <input type="text" class="form-control" value="<?php echo $row["destination"]; ?>" name="destination" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Adult Price *</label>
                                        <input type="number" class="form-control" value="<?php echo $row["price_adult"]; ?>" name="price_adult" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Child Price *</label>
                                        <input type="number" class="form-control" value="<?php echo $row["price_child"]; ?>" name="price_child" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Duration *</label>
                                        <input type="text" class="form-control" value="<?php echo $row["duration"]; ?>" name="duration" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description *</label>
                                        <textarea class="form-control py-3 px-4" rows="5" id="message" name="description" placeholder="Description"
                                    required="required"
                                    data-validation-required-message="Please enter description"><?php echo $row["description"]; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="<?php echo $row["image"]; ?>" name="oldimage" />
                                        <img src="../<?php echo $row["image"]; ?>" width="200px"><br>
                                        <label for="name">Image *</label>
                                        <input type="file" class="form-control" name="place_image" id="place_image">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="updateplace" value="Update Place" class="btn btn-primary font-weight-semi-bold py-2 px-3">
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