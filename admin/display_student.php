<script type="text/javascript">
function deletes(id)
{
	a=confirm('Are You Sure To Remove This Record ?')
	 if(a)
     {
        window.location.href='delete_student.php?id='+id;
     }
}

</script>	


<?php
	
	echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:15px;>";
	echo "<tr class='success'>";
	
	echo "<th>S.No</th>";
	echo "<th>Name</th>";
	echo "<th>Roll Number</th>";
	echo "<th>Email</th>";
	echo "<th>Cource</th>";
	echo "<th>Department</th>";
	echo "<th>Semester</th>";
	echo "<th>Mobile</th>";
	echo "<th>Password</th>";
	echo "<th>Delet</th>";
	echo "</tr>";
	
	$i=1;
	$que=mysqli_query($conn,"select * from student");
	
	while($row=mysqli_fetch_array($que))
	{
		echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$row['std_name']."</td>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['std_email_id']."</td>";
		echo "<td>".$row['std_cource']."</td>";
		echo "<td>".$row['std_dept']."</td>";
		echo "<td>".$row['std_semester']."</td>";
		echo "<td>".$row['std_mobile']."</td>";
		echo "<td>".$row['std_password']."</td>";
		
		
		echo "<td class='text-center'><a href='#' onclick='deletes($row[id])'><span class='glyphicon glyphicon-remove' style=color:red;></span></a></td>";
		
		
		echo "</tr>";
		$i++;
	}
	
?>