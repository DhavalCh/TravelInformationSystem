<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){
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
                                <span class="text-primary text-uppercase text-decoration-none" href="">Add New Place</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name *</label>
                                        <input type="text" class="form-control" name="place" id="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Image *</label>
                                        <input type="file" class="form-control" name="place_image" id="place_image">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="addplace" value="Add Place" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
    
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Manage Place</h4>
                        <table width="100%" border="1" style="text-align: center;">
                            <?php 
                                $sql = "select * from places";
                                $result=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th colspan="2">Operations</th>
                            </tr>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><img src="../<?php echo $row["image"]; ?>" width="150"/></td>
                                <td><a href="ManagePlacesUpdateDelete.php?id=<?php echo $row["ID"]; ?>&task=update">Update</a></td>
                                <td><a href="ManagePlacesUpdateDelete.php?id=<?php echo $row["ID"]; ?>&task=delete&path=<?php echo $row["image"]; ?>">Delete</a></td>
                            </tr>
                            <?php } 
                        }?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php include "footer.php" ?>
    <?php 
    if(isset($_REQUEST['addplace'])){
        //Image 
        $img = $_FILES['place_image']['name'];
        $tmpdir = $_FILES['place_image']['tmp_name'];
        $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        if(in_array($ext, $valid_extensions)){   
            $sql = "INSERT INTO `places`(`name`,`image`) VALUES ('".$_REQUEST["place"]."','places/".$img."')";
            if (mysqli_query($conn, $sql)) {
                move_uploaded_file($tmpdir, "../places/".$img);
                echo "<script>window.location='ManagePlaces.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        }
    } 
}else {
        echo "<script>window.location='Login.php';</script>";
} ?>