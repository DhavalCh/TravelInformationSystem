<?php include "header.php"; ?>
<?php if(isset($_SESSION["admin"])){
    if(isset($_REQUEST["task"])){
      if($_REQUEST["task"]=="delete"){
        $sqlbooking="SELECT * FROM booking WHERE user_id=".$_REQUEST["id"];
        $sqltrippost="SELECT * FROM trippost WHERE user_id=".$_REQUEST["id"];
        $result_booking=mysqli_query($conn, $sqlbooking);
        $result_post=mysqli_query($conn, $sqltrippost);
        if(mysqli_num_rows($result_booking) > 0 || mysqli_num_rows($result_post) > 0){
            echo "<script>alert('Delete records from Booking and Post related to this User');</script>";
            echo "<script>window.location='ManageUsers.php';</script>";
        }
        else {
            $sqlMemories = "DELETE FROM usermemories WHERE user_id=".$_REQUEST["id"];
            $sqlgoal = "DELETE FROM tripgoal WHERE userid=".$_REQUEST["id"];
            $sql = "DELETE FROM user WHERE ID=".$_REQUEST["id"];
            mysqli_query($conn,$sqlgoal);
            mysqli_query($conn,$sqlMemories);
            if (mysqli_query($conn, $sql)) {
                echo "<script>window.location='ManageUsers.php';</script>";
            } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
      }
    }
}
 else {
  echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "Footer.php"; ?>