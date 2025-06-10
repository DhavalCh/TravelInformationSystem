<?php include "header.php"; ?>
<?php if(isset($_SESSION["user"])){
    if(isset($_REQUEST["task"])){
        $sql = "DELETE FROM `tripgoal` WHERE `userid`='".$_SESSION['id']."'";
        if (mysqli_query($conn, $sql)) {
            echo "<script>window.location='BookedTrip.php';</script>";
        }
    }?>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pb-3">
                        <?php $sqlgoal="select * from tripgoal where userid=".$_SESSION['id'];
                            $resultgoal=mysqli_query($conn, $sqlgoal);
                            if (mysqli_num_rows($resultgoal) == 0) {
                        ?>
                        <div class="bg-white mb-3" style="padding: 30px;">
                            <div class="d-flex mb-3">
                                <span class="text-primary text-uppercase text-decoration-none" href="">Set Your Goal for Trip</span>
                            </div>
                            <div class="bg-white mb-3">
                                <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Goal *</label>
                                        <input type="text" class="form-control" name="goal" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="submit" name="setgoal" value="Set Goal" class="btn btn-primary font-weight-semi-bold py-2 px-3">
                                    </div>
                                </form>
                                <?php
                                if(isset($_REQUEST["setgoal"])){
                                        $sql = "INSERT INTO `tripgoal`(`userid`, `goal`) VALUES ('".$_SESSION['id']."','".$_REQUEST["goal"]."')";
                                        if (mysqli_query($conn, $sql)) {
                                            echo "<script>window.location='BookedTrip.php';</script>";
                                        } else {
                                            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    <?php } else {
                        $row_goal = mysqli_fetch_assoc($resultgoal);
                        ?>
                        <div class="bg-white row" style="padding: 30px;">
                            <div class="col-sm-6">
                                <span class="text-primary text-uppercase text-decoration-none" href="">Your Goal : <?php echo $row_goal["goal"]; ?></span>
                            </div>
                            <div class="col-sm-6 text-right"><a href="BookedTrip.php?task=delete">Delete</a></div>
                        </div>
                        <?php
                    }
                    ?>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Booked Trip</h4>
                        <table width="100%" border="1" style="text-align: center;">
                            <?php 
                                $sql = "select ID, (select destination from trip where ID=tripID) as destination, (select duration from trip where ID=tripID) as duration, StartDate, child, adult, totalAmount, status from booking where user_id=".$_SESSION["id"];
                                //$sql = "select * from trip";
                                $result=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                            <tr>
                                <th>ID</th>
                                <th>Destination</th>
                                <th>Duration</th>
                                <th>Start Date</th>
                                <th>Adult</th>
                                <th>Children</th>
                                <th>Total</th>
                                <th>Status</th>
                            </tr>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["destination"]; ?></td>
                                <td><?php echo $row["duration"]; ?></td>
                                <td><?php echo $row["StartDate"]; ?></td>
                                <td><?php echo $row["child"]; ?></td>
                                <td><?php echo $row["adult"]; ?></td>
                                <td><?php echo $row["totalAmount"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                            </tr>
                            <?php } 
                            } else {
                                echo "<h3>No trips found</h3>";
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
            $sql = "INSERT INTO `trip`(`destination`, `image`, `price_adult`, `price_child`, `duration`, `description`) VALUES ('".$_REQUEST["destination"]."','places/".$img."','".$_REQUEST['price_adult']."','".$_REQUEST['price_child']."','".$_REQUEST['duration']."','".$_REQUEST['description']."')";
            if (mysqli_query($conn, $sql)) {
                move_uploaded_file($tmpdir, "../places/".$img);
                echo "<script>window.location='ManageTrip.php';</script>";
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