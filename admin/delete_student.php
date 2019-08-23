<?php
include('../dbconfig.php');
	
	$info=$_GET['id'];
	
	mysqli_query($conn,"delete from student where id='$info'");
	header('location:dashboard.php?info=display_student');
?>