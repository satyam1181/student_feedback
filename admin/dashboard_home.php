<h1 align="center" style="text-decoration:underline"><a href="">Admin Dashboard</a></h1>
<?php 
//all complaints
$qq=mysqli_query($conn,"select * from faculity ");
$rows=mysqli_num_rows($qq);			
//echo "<h2 style='color:green'>Total Number of Faculty : $rows</h2>";	

//all emegency compalints
$q=mysqli_query($conn,"select * from student");
$r1=mysqli_num_rows($q);			
//

//all users
$q2=mysqli_query($conn,"select * from feedback");
$r2=mysqli_num_rows($q2);			
//echo "<h2 style='color:black'>Total Number feedback given by users  : $r2</h2>";	

?>


<html>
<body>
	<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.mins.css" rel="stylesheet" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.bundle.min.js" integrity="sha384-zDnhMsjVZfS3hiP7oCBRmfjkQC4fzxVxFhBx8Hkz2aZX8gEvA/jsP3eXRCvzTofP" crossorigin="anonymous"></script>
	</head>
	<table  class="table table-hover">
		<thead>
			<tr>
				<th scope="col"><h2>Total Faculty</h2></th>
                <th scope="col"><h2>Total Student</h2></th>
                <th scope="col"><h2>Total Feedback</h2></th>
            </tr>
           </thead>

        <tbody>
      <tr class="table-warning">
      
      <td><h3><?php echo $rows ?></h3></td>
      <td><h3><?php echo $r1 ?></h3></td>
      <td><h3><?php echo $r2 ?></h3></td>
      </tr>


        </tbody>
	</table>
</body>
</html>
