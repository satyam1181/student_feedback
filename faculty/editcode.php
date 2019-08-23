<?php
session_start();  
include('../dbconfig.php');
 $faculity_email_id= $_SESSION['faculty_login'];
echo $faculity_email_id;
$email=$_POST['faculity_email'];
echo $email."<br/>";
$mobile=$_POST['faculity_mobile'];
echo $mobile."<br/>";
$file=$_FILES['photo']['name'];
echo $file."<br/>";
$tmp_name=$_FILES['photo']['tmp_name'];
echo $tmp_name."<br/>";
$location="upload/";
$sql=mysqli_query($conn,"select photo from faculity where faculity_email_id='$faculity_email_id'");
if($user_name=mysqli_fetch_assoc($sql))
{
	$oldfile=$row['photo'];
}
if($file=="")
{
mysqli_query($conn,"update faculity set faculity_email_id='$email',faculity_mobile='$mobile' where faculity_email_id='$faculity_email_id'");
header("location:index.php?page=update_profile.php");
}
else
{
	unlink($location.$oldfile);
move_uploaded_file($tmp_name,$location.$file);
mysqli_query($conn,"update faculity set faculity_email_id='$email',faculity_mobile='$mobile',photo='$file' where faculity_email_id='$faculity_email_id'");
header("location:index.php?page=update_profile");
}


?>