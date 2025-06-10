<?php include "header.php" ?>
<?php
    $sql = "select ID,destination,image,duration from trip";
    $result=mysqli_query($conn, $sql);
?>
<!-- Destination Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <div class="text-center mb-3 pb-3">
                <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Destination</h6>
                <h1>Destination Covered</h1>
            </div>
            <div class="row">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="<?php echo $row["image"]; ?>" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="tripdetail.php?id=<?php echo $row["ID"]; ?>">
                            <h5 class="text-white"><?php echo $row["destination"]; ?></h5>
                            <span><?php echo $row["duration"]; ?></span>
                        </a>
                    </div>
                </div>
                <?php
                    }
                } else {
                    ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="destination-item position-relative overflow-hidden mb-2">
                            <a class="destination-overlay text-white text-decoration-none" href="">
                                <h5 class="text-white">No Places found</h5>
                            </a>
                        </div>
                    </div>
                    <?php
                }
                ?>

                <!--<div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-2.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">United Kingdom</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-3.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Australia</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-4.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">India</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-5.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">South Africa</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="destination-item position-relative overflow-hidden mb-2">
                        <img class="img-fluid" src="img/destination-6.jpg" alt="">
                        <a class="destination-overlay text-white text-decoration-none" href="">
                            <h5 class="text-white">Indonesia</h5>
                            <span>100 Cities</span>
                        </a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
    <!-- Destination Start -->

<?php include "footer.php" ?>