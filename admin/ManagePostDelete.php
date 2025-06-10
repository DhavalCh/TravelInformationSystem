<?php 
    include "header.php";
    if(isset($_SESSION["admin"])){
    $path="../".$_REQUEST["path"];
    unlink($path);
	$sql = "DELETE FROM trippost WHERE ID=".$_REQUEST["id"];
	if (mysqli_query($conn, $sql)) {
			echo "<script>window.location='ManagePost.php';</script>";
    } else {
      		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
 else {
  echo "<script>window.location='Login.php';</script>";
} ?>