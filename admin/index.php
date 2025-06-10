<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){
    ?>
    <!-- Blog Start -->
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
                                <h2 class="mb-3">WELCOME TO <span class="text-primary">ADMIN DASHBOARD</span></h2>
                            </div>
                            <p>Date : <span><?php echo date("d-m-Y"); ?></span></p>
                            <p>From Left side select an option to manage data</p>
                        </div>
                    </div>
                    <!-- Blog Detail End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php include "footer.php" ?>
    <?php } else {
  echo "<script>window.location='Login.php';</script>";
} ?>
