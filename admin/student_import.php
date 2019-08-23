<html>
<head>
<title>csv insert</title>
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
    <i class="fa fa-cloud-upload"></i>Student Details Upload
</label>
<input type="file" name="csvfile" id="file-upload" required="required"/>
<br/>
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
		$std_name=$cont[0];
		$roll_no=$cont[1];
		$std_email=$cont[2];
		$course=$cont[3];
		$depart=$cont[4];
		$sem=$cont[5];
		$password=$cont[6];
		$mobile=$cont[7];
		}else{
			$query="INSERT INTO student(std_name,id,std_email_id,std_cource,std_dept,std_semester,std_password,std_mobile) 
			VALUES('$cont[0]','$cont[1]','$cont[2]','$cont[3]','$cont[4]','$cont[5]','$cont[6]','$cont[7]')";
			//echo "$query<br/>";
			mysqli_query($conn,$query);
		}
		$i++;
		
	}
	echo "Success";
	//print_r($_FILES['csvfile']);
}else
{
	echo "Connection failed";
}







	}
?>


