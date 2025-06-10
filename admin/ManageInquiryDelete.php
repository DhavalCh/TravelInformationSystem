<?php 
    include "header.php";
    if(isset($_SESSION["admin"])){
	$sql = "DELETE FROM inquiry WHERE ID=".$_REQUEST["id"];
	if (mysqli_query($conn, $sql)) {
			echo "<script>window.location='ManageInquiry.php';</script>";
    } else {
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
 else {
  //echo "<script>window.location='Login.php';</script>";
    echo $_REQUEST['id'];
    echo $_SESSION['admin'];
} ?>