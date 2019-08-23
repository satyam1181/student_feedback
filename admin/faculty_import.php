<html>
<head>
<title>faculty Import</title>
<style type="text/css">
	input[type="file"] {
    display: none;
}
.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
}
</style>
</head>
<body>
	
<form  method="post" enctype="multipart/form-data">
	<label for="file-upload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i>Faculty Details Upload
</label>
<input type="file" name="csvfile" id="file-upload" required="required"/><br/>
<input type="submit" name="save" value="upload">
</form>
</body>
</html>
<?php
include('../dbconfig.php');


    if(isset($_POST['save']))
    {


if ($conn)
{
	$file=$_FILES['csvfile']['tmp_name'];
	$handle=fopen($file,"r");
	$i=0;
	while(($cont=fgetcsv($handle,1000,","))!==false)
	{
		$table=rtrim($_FILES['csvfile']['name'],".csv");
		if($i==0)
		{
		$id=$cont[0];
		$fname=$cont[1];
		$f_email=$cont[2];
		$f_dept=$cont[3];
		$dept_id=$cont[4];
		$f_mobile=$cont[5];
		$f_password=$cont[6];
		$f_course=$cont[7];

		}else
		{
			$query="INSERT INTO faculity (faculity_name,faculity_email_id,faculity_dept,dept_id,faculity_mobile,faculity_password,faculity_cource)
			VALUES('$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]')";
			//echo $query,"<br/>";
			mysqli_query($conn,$query);
		}
		$i++;
		
	}
	echo "Success";
	//print_r($_FILES['csvfile']);
}
else
{
	echo "Connection failed";
}
}
?>