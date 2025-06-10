<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){?>
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 mt-5 mt-lg-0">
                    <?php include "LeftSideMenu.php" ?>
                </div>

                <div class="col-lg-8">
                    <!-- Blog Detail Start -->
                    <div class="bg-white mb-3" style="padding: 30px;">
                        <h4 class="text-uppercase mb-4" style="letter-spacing: 5px;">Manage Booking</h4>
                        <table width="100%" border="1" style="text-align: center;">
                            <?php 
                                $sql = "select ID, (select Name from user where ID=user_id) as name, (select destination from trip where ID=tripID) as destination, StartDate, child, adult, totalAmount, status from booking";
                                //$sql = "select * from booking";
                                $result=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                            ?>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Destination</th>
                                <th>start_date</th>
                                <th>No of Child</th>
                                <th>No of Adults</th>
                                <th>TotalAmount</th>
                                <th>Booking Status</th>
                                <th colspan="2">Operations</th>
                            </tr>
                            <?php while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?php echo $row["ID"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["destination"]; ?></td>
                                <td><?php echo $row["StartDate"]; ?></td>
                                <td><?php echo $row["child"]; ?></td>
                                <td><?php echo $row["adult"]; ?></td>
                                <td><?php echo $row["totalAmount"]; ?></td>
                                <td><?php echo $row["status"]; ?></td>
                                <td><a href="ManageBookingUpdateDelete.php?id=<?php echo $row["ID"]; ?>&task=update">Update</a></td>
                                <td><a href="ManageBookingUpdateDelete.php?id=<?php echo $row["ID"]; ?>&task=delete">Delete</a></td>
                            </tr>
                            <?php } 
                            } else {
                                echo "<h3>No Booking found</h3>";
                        }?>
                        </table>
                    </div>
                
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <?php include "footer.php"; 
    } else {
        echo "<script>window.location='Login.php';</script>";
} ?>