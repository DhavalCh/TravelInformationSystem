<?php include "header.php" ?>

<!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <?php if(isset($_SESSION["user"])){?>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Detail Start -->
                    <div class="pb-3">
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <span class="text-primary text-uppercase text-decoration-none" href="">Add New Post</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Title *</label>
                                        <input type="text" class="form-control" name="title" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description *</label>
                                        <textarea class="form-control py-3 px-4" rows="5" name="description" placeholder="Description"
                                    required="required"
                                    data-validation-required-message="Please enter description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Image *</label>
                                        <input type="file" class="form-control" name="post_image" id="place_image">
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="addPost" value="Add Post" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
               </div>
            </div>
            <?php 
                if(isset($_REQUEST['addPost'])){
                    //Image 
                    $img = $_FILES['post_image']['name'];
                    $tmpdir = $_FILES['post_image']['tmp_name'];
                    $ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)); // get image extension
                    // valid image extensions
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
                    if(in_array($ext, $valid_extensions)){
                        $sql = "INSERT INTO `trippost`(`user_id`, `post_title`, `post_detail`, `image`) VALUES ('".$_SESSION["id"]."','".$_REQUEST['title']."','".$_REQUEST['description']."','post/".$img."')";
                        if (mysqli_query($conn, $sql)) {
                            move_uploaded_file($tmpdir, "post/".$img);
                            echo "<script>window.location='post.php';</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        }
                    } else {
                        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
                    }
                }
            } 
            ?>
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Client Post</h6>
                <h1>What Say Our Clients</h1>
            </div>
            <div class="row">
                <?php
                    $sql="select * from trippost";
                    $result=mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-6 col-md-6 mb-4 text-center pb-4">
                    <img class="img-fluid mx-auto" src="<?php echo $row["image"]; ?>" style="width: 100px; height: 100px;" >
                    <div class="testimonial-text bg-white p-4 mt-n5">
                        <h5 class="text-truncate mt-5"><?php echo $row["post_title"]; ?></h5>
                        <p ><?php echo $row["post_detail"]; ?>
                        </p>
                    </div>
                </div>
            <?php } }?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

<?php include "footer.php" ?>