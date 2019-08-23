<?php
session_start();  
include('../dbconfig.php');
 $student_id= $_SESSION['user'];
//echo $student_id;
$email=$_POST['std_email_id'];
//echo $email."<br/>";
$mobile=$_POST['std_mobile'];
//echo $mobile."<br/>";
$file=$_FILES['photo']['name'];
//echo $file."<br/>";
$tmp_name=$_FILES['photo']['tmp_name'];
//echo $tmp_name."<br/>";
$location="upload/";
$sql=mysqli_query($conn,"select photo from student where id='$student_id' or std_email_id='$student_id' ");
if($user_name=mysqli_fetch_assoc($sql))
{
	$oldfile=$user_name['photo'];
	//echo $oldfile;
}
if($file=="")
{
mysqli_query($conn,"update student set std_email_id='$email',std_mobile='$mobile' where id='$student_id' or std_email_id='$student_id' ");
header("location:update_profile.php");
}
else
{
	unlink($location.$oldfile);
move_uploaded_file($tmp_name,$location.$file);
mysqli_query($conn,"update student set std_email_id='$email',std_mobile='$mobile',photo='$file' where id='$student_id' or std_email_id='$student_id'");

header("location:index.php?page=update");
//echo 'successfully your profile is updated!';
}


?>