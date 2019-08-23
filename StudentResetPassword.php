<?php 
include("dbconfig.php");
if(!isset($_GET["code"]))
{
  exit("Can't Find Page");
}
$code= $_GET["code"];
$setEmailQuery = mysqli_query($conn,"SELECT email from resetPasswords where code='$code'");
  if(mysqli_num_rows($setEmailQuery) == 0)
   {
   	exit("Can't Find Page");
   }


  if(isset($_POST["password"]))
  {
  	$pw = $_POST["password"];
  //	$pw = md5($pw);

  	$row = mysqli_fetch_array($setEmailQuery);
  	$email = $row["email"];

  	$query = mysqli_query($conn, "UPDATE student SET std_password='$pw' WHERE std_email_id='$email' ");
  	if($query==true)
  	{
  		$query = mysqli_query($conn, "DELETE FROM resetPasswords WHERE code='$code' ");
  		exit("password Updated");
  	}
  	else
  	{
  		exit("Something Wrong");
  	}
  }
?>
<form method="POST">
	<input type="password" name="password" placeholder="New Password">
	<br>
	<input type="submit" name="submit" value="Update Password">
</form>