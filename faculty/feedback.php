         <?php
         $user= $_SESSION['faculty_login'];
         if($user=="")
             {
             	header('location:../index.php');
             }

         $qury=mysqli_query($conn,"select id from faculity where faculity_email_id='$user'");
         $res=mysqli_fetch_assoc($qury);
         $f_id=$res['id'];
         ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	 <script language="javascript" type="text/javascript">
function showState(subject)
{
document.frm.submit();
}
</script>
</head>
<body>
     
     <div class="container">
     	<div class="row">
	<div class="col-sm-12" style="color:orange;">
		<h1 align="center" >Feedback</h1>

	</div>
</div>
  <form class="form-horizontal"  method="post" name="frm" id="frm">

<div class="form-group">
      <label class="control-label col-sm-1" for="pwd">Subject:</label>
      <div class="col-sm-3">          
 <select name="subject_code" id="subject_code" class="form-control" onChange="showState(this.value);" required/>
          
          <option value=" ">--Select--</option>
         <?php
        
$sql1="select subject_code from m where faculty_id='$f_id' ";
$sql_row1=mysqli_query($conn,$sql1);
while($sql_res1=mysqli_fetch_assoc($sql_row1))
{
?>
<option value="<?php echo $sql_res1["subject_code"]; ?>" <?php if($sql_res1["subject_code"]==$_REQUEST["subject_code"]) { echo "Selected"; } ?> >
  <?php echo $sql_res1["subject_code"]; ?>
    
  </option>
<?php
}

?>
            
 </select>
      </div>
    </div>

<?php 
$q=mysqli_query($conn,"select * from feedback where faculity_id='$f_id' and subject='$_REQUEST[subject_code]' ");
$r=mysqli_num_rows($q);
if($r==false)
{
echo "<h3 style='color:Red'>Select Subject ! </h3>";
}
else
{
?>



<div class="row">

<div class="col-sm-12">

<table class="table table-bordered">

	<thead >
	
	<tr class="success">
		<th>Sr.No</th>
		<th>Date</th>
		
		<th>Quest1</th>
		<th>Quest2</th>
		<th>Quest3</th>
		<th>Quest4</th>
		<th>Quest5</th>
		<th>Quest6</th>
		<th>Quest7</th>
		<th>Quest8</th>
		<th>Quest9</th>
		<th>Quest10</th>
		<th>Quest11</th>
		<th>Quest12</th>
		<th>Quest13</th>
		<th>Quest14</th>
		<th>Total</th>
		</tr>
		</thead>
		
		<?php
		$i=1;
	while($row=mysqli_fetch_array($q))
		{ 	
			
			$sum=0; 	
			echo "<tr>";
			echo "<td>".$i."</td>";
			echo "<td>".$row['date']."</td>";
			//echo "<td>".$row['subject']."</td>";
			echo "<td>".$row[6]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td>".$row[8]."</td>";
			echo "<td>".$row[9]."</td>";
			echo "<td>".$row[10]."</td>";
			echo "<td>".$row[11]."</td>";
			echo "<td>".$row[12]."</td>";
			echo "<td>".$row[13]."</td>";
			echo "<td>".$row[14]."</td>";
			echo "<td>".$row[15]."</td>";
			echo "<td>".$row[16]."</td>";
			echo "<td>".$row[17]."</td>";
			echo "<td>".$row[18]."</td>";
			echo "<td>".$row[19]."</td>";
			echo "<td>".$row[20]."</td>";
			//$sum=($row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]+$row[17]+$row[18]+$row[19])/12;

            
           
			//echo "<td>".$sum."</td>";
			//echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
			echo "</tr>";
			static $total_avg=0;
            $total_avg=round((($total_avg+$row[20])/$i),1);
		$i++;
		}	
		?>
		

		
</table>
</div>
</div>
<?php }?>

<?php
 echo "<h2>$total_avg</h2>";  
 $starNumber=$total_avg;
 for( $x = 0; $x < 5; $x++ )
    {
        if( floor($starNumber)-$x >= 1 )
        { echo '<i class="fa fa-star"></i>'; }
        elseif( $starNumber-$x > 0 )
        { echo '<i class="fa fa-star-half-o"></i>'; }
        else
        { echo '<i class="fa fa-star-o"></i>'; }
    }
 ?>
            </body>
</html>