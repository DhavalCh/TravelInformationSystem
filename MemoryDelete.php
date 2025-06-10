<?php include "header.php" ?>
<?php

	$path=$_REQUEST["path"];
    unlink($path);
    $sql = "DELETE FROM usermemories WHERE ID=".$_REQUEST["id"];
    if (mysqli_query($conn, $sql)) {
      echo "<script>window.location='Memory.php';</script>";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    } 
?>