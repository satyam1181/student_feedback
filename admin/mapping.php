<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php
include('../dbconfig.php');
if(!isset($_SESSION['user']))
{
header('location:index.php');
}
?>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../css/metisMenu.min.css" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script language="javascript" type="text/javascript">
function showCource(cource_id)
{
document.frm.submit();
}

function showBranch(branch_id)
{
document.frm.submit();
}
</script>
</head>
<body>

<div class="container">
  <h2>Which Department Teach</h2>
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
      <label class="control-label col-sm-2" for="pwd">DEPARTMENT TEACH:</label>
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
?>
 </select>
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Faculty:</label>
      <div class="col-sm-5">          
 <select name="faculity_id" id="faculity_name" class="form-control" required/>
<option value="">--Select--</option>

<?php
$sql1=mysqli_query($conn,"select branch_name from branch where branch_id='$_REQUEST[branch_id]' ");
$data1=mysqli_fetch_assoc($sql1);


$sql = mysqli_query($conn, "SELECT * From faculity WHERE faculity_dept='$data1[branch_name]' " );
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='".$row['id'] ."'> ".$row['faculity_name']." </option>" ;
 
}

?>
 </select>
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Subject:</label>
      <div class="col-sm-5">          
 <select name="subject_code" class="form-control"  required/>
<option value="">--Select--</option>
<?php
$sql = mysqli_query($conn, "SELECT *  From subject where subject_dept='$data1[branch_name]' ");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['subject_code'] ." ".$row['subject_name']."'>" .$row['subject_code'] ." (".$row['subject_name'].")"."</option>" ;
}
?>
  
 </select>
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">SEMESTER:</label>
      <div class="col-sm-2">          
 <select name="sem" class="form-control" required/>
          
          <option value="">--Select--</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
 </select>
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">SUBJECT RUN IN DEPARTMENT:</label>
      <div class="col-sm-5">          
 <select name="dept_run" class="form-control" id="dept" required/>
           <option value="">--Select--</option>
          <?php


$sql = mysqli_query($conn, "SELECT * From branch" );
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='".$row['branch_name'] ."'> ".$row['branch_name']." </option>" ;
}

?>

  
 </select>
      </div>
    </div>





	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="save" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

<?php
 
   if(isset($_POST['save'])){
   
  $a= $_POST["cource_id"];
  $b= $_POST["branch_id"];
  $c= $_POST["sem"];
  $d= $_POST["subject_code"];
  $e= $_POST["faculity_id"];
  $f= $_POST["dept_run"];



$sql11 = mysqli_query($conn, "SELECT cource_name FROM cources WHERE cource_id='$a' " );
$g=mysqli_fetch_row($sql11);
  $c_name=$g[0];

  $sql12= mysqli_query($conn, "SELECT branch_name FROM branch where branch_id='$b' " );
$h=mysqli_fetch_row($sql12);
 $b_name = $h[0];

  $sql13 = mysqli_query($conn, "SELECT faculity_name FROM faculity WHERE id='$e' " );
$i=mysqli_fetch_row($sql13);
 $f_name=$i[0];

    echo  $c_name;
     echo $b_name;
      echo  $f_name;
       echo $c;
        echo $d;
          echo $e;
           echo $f;
           

 
 $sql="INSERT INTO m (program,dept_t,faculty_name,subject_code,sem,dept_run,faculty_id) 
 VALUES ('$c_name','$b_name','$f_name','$d','$c','$f','$e')";
     $rels=mysqli_query($conn,$sql);

     if($rels==1)
       echo "Success";
     else
      echo "Not Successs";
    
	}
  
?>

</body>
</html>