<?php 
extract($_POST);
if(isset($save))
{

	if($e=="" || $pass=="")
	{
	$err="<font color='red'>fill all the fileds first</font>";	
	}
	else
	{
//$pass=md5($p);	

$sql=mysqli_query($conn,"select * from student where (id='$e' or std_email_id='$e') and std_password='$pass' ");

$r=mysqli_num_rows($sql);

if($r)
{
$_SESSION['user']=$e;
header('location:user');
}

else
{

$err="<font color='red'>Invalid login details</font>";

}
}
}

?>
<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">

<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><h2>Student Login </h2></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Roll Number</div>
		<div class="col-sm-5">
		<input type="text" name="e" class="form-control"  /></div>
	</div>
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Password</div>
		<div class="col-sm-5">
		<input type="password" name="pass" class="form-control"/></div>
	</div>
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<input type="submit" value="Login" name="save" class="btn btn-info"/>
		<a href="StudentRequestReset.php">
		<input type="button" value="Forgot Password" name="resetPassword" class="btn btn-info"/>
	    </a>
		
		</div>
	</div>
</form>	
</div>
</div>