<?php 
if(!isset($_SESSION['user']))
{
header('location:index.php');
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script language="javascript" type="text/javascript">
function showCource(cource_id)
{
document.frm.submit();
}
function showBranch(branch_id)
{
document.frm.submit();
}
function showFaculty(id)
{
document.frm.submit();
}
function showSubject(subject_code)
{
document.frm.submit();
}
</script>
<style type="text/css">
  
.container {
  width: 1000px;
  background-color: white;
}

table {
  width: 100%;
  border-collapse: collapse;
}

td {
  border: 1px solid black;
}

/* try removing the "hack" below to see how the table overflows the .body */
.hack1 {
  display: table;
  table-layout: fixed;
  width: 100%;
}

.hack2 {
  display: table-cell;
  overflow-x: auto;
  width: 100%;
}


</style>>
</head>
<body>

<div class="container">
  <h2>Feedback</h2>
  <form class="form-horizontal"  method="post" name="frm" id="frm">

<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Program:</label>
      <div class="col-sm-5">          
 <select name="cource_id" id="cource_id" class="form-control" onChange="showCource(this.value);" required/>
          
          <option value=" ">--Select--</option>
         <?php
$sql1="select * from cources";
$sql_row1=mysqli_query($conn,$sql1);
if ($_REQUEST["cource_id"]) {
   $cource_id_=$_REQUEST["cource_id"];

 }
   else{
    $cource_id_=1;
    $_REQUEST["subject_code"]="";


   }

while($sql_res1=mysqli_fetch_assoc($sql_row1))
{

?>
<option value="<?php echo $sql_res1["cource_id"]; ?>"<?php if($sql_res1["cource_id"]===$cource_id_) { echo "Selected"; } ?> >
  <?php echo $sql_res1["cource_name"]; ?>
    
  </option>
<?php
}
?>
            
 </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">DEPARTMENT :</label>
      <div class="col-sm-5">          
 <select name="branch_id" class="form-control" id="branch_id" onChange="showBranch(this.value);" required/>
  					
					<option value="">--Select--</option>
					<?php

$sql="select * from branch where cource_id='$_REQUEST[cource_id]'";
$sql_row=mysqli_query($conn,$sql);

while($sql_res=mysqli_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["branch_id"]; ?>" 
  <?php 
  if($sql_res["branch_id"]==$_REQUEST["branch_id"]) 
  { 
  echo "Selected";
   }
    ?>><?php echo $sql_res["branch_name"]; ?>
    
  </option>
<?php
}
static $total_avg=0;
?>
 </select>
      </div>
    </div>



     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Faculty :</label>
      <div class="col-sm-5">          
 <select name="id" class="form-control" id="id" onChange="showFaculty(this.value);" required/>
          
          <option value="">--Select--</option>
          <?php

$sql="select * from faculity where dept_id='$_REQUEST[branch_id]'";
$sql_row=mysqli_query($conn,$sql);
while($sql_res=mysqli_fetch_assoc($sql_row))
{
?>
<option value="<?php echo $sql_res["id"]; ?>" 
  <?php 
  if($sql_res["id"]==$_REQUEST["id"]) 
  { 
  echo "Selected";
   }
    ?>><?php echo $sql_res["faculity_name"]; ?>
    
  </option>
<?php
}
?>
 </select>
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Subject :</label>
      <div class="col-sm-5">          
 <select name="subject_code" class="form-control" id="subject_code" onChange="showSubject(this.value);" required/>
          
          <option value="">--Select--</option>
          <?php

$sql="select subject_code from m where faculty_id='$_REQUEST[id]'";
$sql_row=mysqli_query($conn,$sql);
while($sql_res=mysqli_fetch_assoc($sql_row))
{

?>
<option value="<?php echo $sql_res["subject_code"]; ?>" 
  <?php 
  if($sql_res["subject_code"]==$_REQUEST["subject_code"]) 
  { 
  echo "Selected";
   }
    ?>><?php echo $sql_res["subject_code"]; ?>
    
  </option>
<?php
}
?>
 </select>
      </div>
    </div>

    <?php 
$q=mysqli_query($conn,"select * from feedback where  subject='$_REQUEST[subject_code]' ");
$r=mysqli_num_rows($q);
if($r==false)
{
//echo "<h3 style='color:Red'>Select Subject ! </h3>";
}
else
{
?>

<div class="container">

  <div class="hack1">
    <div class="hack2">
<?php


  echo "<table class='table table-responsive table-bordered table-striped table-hover' style=margin:10px;>";

  
  echo "<tr>";
    echo "<th>Sr.No</th>";
    echo "<th>Date</th>";
    echo "<th>Roll No</th>";
   echo " <th>Quest1</th>";
    echo "<th>Quest2</th>";
   echo " <th>Quest3</th>";
    echo "<th>Quest4</th>";
    echo "<th>Quest5</th>";
    echo "<th>Quest6</th>";
    echo "<th>Quest7</th>";
    echo "<th>Quest8</th>";
    echo "<th>Quest9</th>";
    echo "<th>Quest10</th>";
    echo "<th>Quest11</th>";
    echo "<th>Quest12</th>";
    echo "<th>Quest13</th>";
    echo "<th>Quest14</th>";
    echo "<th>Total</th>";
echo "</tr>";
    
    ?>
    </div>
  </div>

</div>
    <?php
    $i=1;

  while($row=mysqli_fetch_array($q))
    {   
      
      $sum=0;   
      echo "<tr>";
      echo "<td>".$i."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['std_roll_no']."</td>";
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
      echo "<td>".round($row[20],1)."</td>";
      //$sum=($row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15]+$row[16]+$row[17]+$row[18]+$row[19])/12;

            
           
      //echo "<td>".$sum."</td>";
      //echo "<td><a href='#' onclick='deletes($row[id])'>Delete</a></td>";
      echo "</tr>";
      
            $total_avg=round((($total_avg+$row[20])/$i),1);
    $i++;

    }
    
    ?>
    

    
</table>
</div>
</div>
<?php }?>
<?php 
if($total_avg>0)
{
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
}
else
{
echo "<h1>No Record Selected</h1>"; 
  }
 ?>






</form>
</body>
</html>