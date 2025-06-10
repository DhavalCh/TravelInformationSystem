<?php include "header.php"; ?>
<?php if(isset($_SESSION["user"])){
    $sql = "select * from usermemories where user_id=".$_SESSION['id'];
    ?>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <span class="text-primary text-uppercase text-decoration-none" href="">Add New Memory</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Destination *</label>
                                        <input type="text" class="form-control" name="destination" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description *</label>
                                        <textarea class="form-control py-3 px-4" rows="5" name="description" placeholder="Description"
                                    required="required"
                                    data-validation-required-message="Please enter description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Image *</label>
                                        <input type="file" class="form-control" name="place_image" id="place_image">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="addMemory" value="Add Memory" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Memories</h6>
                <h1>Tour Memories</h1>
            </div>
            <div class="row">
                <?php
                    $result=mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="package-item bg-white mb-2">
                        <img class="img-fluid" src="<?php echo $row["image"]; ?>" alt="">
                        <div class="p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <small class="m-0"><i class="fa fa-map-marker-alt text-primary mr-2"></i><?php echo $row["location"]; ?></small>
                            </div>
                            <h5><?php echo $row["description"]; ?></h5>
                            <div class="border-top mt-4 pt-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="m-0"><a href="MemoryDelete.php?id=<?php echo $row["ID"]; ?>&path=<?php echo $row["image"]; ?>">Delete</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Packages End -->

    <?php include "footer.php" ?>
    <?php 
    if(isset($_REQUEST['addMemory'])){
        //Image 
        $img = $_FILES['place_image']['name'];
        $tmpdir = $_FILES['place_image']['tmp_name'];
        $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)); // get image extension
        // valid image extensions
        $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
        if(in_array($ext, $valid_extensions)){
            $sql = "INSERT INTO `usermemories`(`user_id`, `image`, `location`, `description`) VALUES ('".$_SESSION["id"]."','memories/".$img."','".$_REQUEST['destination']."','".$_REQUEST['description']."')";
            if (mysqli_query($conn, $sql)) {
                move_uploaded_file($tmpdir, "memories/".$img);
                echo "<script>window.location='Memory.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        }
    } 

    } else {
        echo "<script>window.location='Login.php';</script>";
} ?>