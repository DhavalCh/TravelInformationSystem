<?php include "header.php" ?>
<?php
    $sql = "select * from trip where ID=".$_REQUEST['id'];
    $result=mysqli_query($conn, $sql);
?>
<!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <?php
                if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                ?>
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1><?php echo $row["destination"]; ?></h1>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="<?php echo $row["image"]; ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <span>Description : <?php echo $row["description"]; ?></span><br><br>
                        <h5>Duration : <?php echo $row["duration"]; ?></h5>
                        <h5>Price (Per Person)</h5>
                        <span>Adult : $<?php echo $row["price_adult"]; ?></span><br>
                        <span>Children : $<?php echo $row["price_child"]; ?></span><br><br>
                        <h6><a href="tripbook.php?id=<?php echo $_REQUEST['id'] ?>" class="btn btn-primary py-3 px-4">Book Now</a></h6>
                    </div>
                </div>
            </div>
            <?php                
            } else {
            ?>
            <h5 class="text-white">No Places found</h5>
            <?php
                }
            ?>
        </div>
    </div>
    <!-- Destination Start -->

<?php include "footer.php" ?>