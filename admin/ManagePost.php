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
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Manage Post</h4>
                        <table width="100%" border="1" style="text-align: center;">
                            <?php 
                                $sql = "select ID,(select Name from user where ID=user_id) as name,post_title, post_detail, image from trippost";
                                $result=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Detail</th>
                                <th>Image</th>
                                <th>Operations</th>
                            </tr>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["post_title"]; ?></td>
                                <td><?php echo $row["post_detail"]; ?></td>
                                <td><img src="../<?php echo $row["image"]; ?>" width="150"/></td>
                                <td><a href="ManagePostDelete.php?id=<?php echo $row["ID"]; ?>&path=<?php echo $row["image"]; ?>">Delete</a></td>
                            </tr>
                            <?php } 
                        } else {
                            echo "<h3>No Post Found</h3>";
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

    } else {
        echo "<script>window.location='Login.php';</script>";
} ?>