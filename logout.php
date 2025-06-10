<?php
	session_start();
	if(isset($_SESSION['user'])){
		unset($_SESSION['user']);
	}
	echo "<script>window.location='index.php';</script>";
?>