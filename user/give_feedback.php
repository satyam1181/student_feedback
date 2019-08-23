
<?php 
include('../dbconfig.php');
$user= $_SESSION['user'];
if($user=="")
{header('location:../index.php');}
$roll=$_SESSION['roll'];
$std_cource=$_SESSION['std_cource'];
$std_dept=$_SESSION['std_dept'];
$std_sem=$_SESSION['std_semester'];

/*
$sql=mysqli_query($conn,"select * from faculity where student_id='$user' and faculty_id='$faculty'");
$r=mysqli_num_rows($sql);

if($r==true)
{
echo "<h2 style='color:red'>You already given feedback to this faculty</h2>";
}
else
{
$query="insert into feedback values('','$user','$faculty','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$quest11','$quest12','$quest13','$quest14',now())";

mysqli_query($conn,$query);

echo "<h2 style='color:green'>Thank you </h2>";
}
}
*/
/*
echo $roll;
echo "<br>";
echo $std_cource;
echo "<br>";
echo $std_dept;
echo "<br>";
echo $std_sem;
*/
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr class='success'>";
	
	echo "<th>Subject Code</th>";
	echo "<th>Program</th>";
	echo "<th>Department of Faclty</th>";
	echo "<th>Semester</th>";
	echo "<th>Faclty Name</th>";
	echo "<th>Form</th>";
	echo "</tr>";


$que=mysqli_query($conn,"select * from m where dept_run='$std_dept' && sem='$std_sem' ");
while ($row=mysqli_fetch_array($que)) {
	


	echo "<tr>";
		echo "<td>".$row['subject_code']."</td>";
		echo "<td>".$row['program']."</td>";
		echo "<td>".$row['dept_t']."</td>";
		echo "<td>".$row['sem']."</td>";
		echo "<td>".$row['faculty_name']."</td>";
	//	$fid=$_SESSION['fa_id'];
echo "<td class='text-center'><a href='index.php?id=$row[faculty_id]&page=feedback_form'><span class='glyphicon glyphicon-list-alt' style=color:red;></span></td>";	echo "</tr>";

	
}

?>
