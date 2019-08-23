<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('../dbconfig.php');
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
</head>
<body style="width: 100%">

<div class="container">
  <h2>Add Faculty</h2>
  <form class="form-horizontal"  method="post">
    <div class="control-group form-group ">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="faculity_name" placeholder="Enter Name" name="faculity_name" pattern="[a-zA-Z ]*$" 
        onkeyup="
        var start = this.selectionStart;
        var end = this.selectionEnd;
        this.value = this.value.toUpperCase();
        this.setSelectionRange(start, end);"
        title="This Field Only Contains Character "required/>
      </div>
    </div>
	
	<div class="form-group control-group">
      <label class="control-label col-sm-2" for="email">Mobile:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="faculity_mobile" placeholder="Enter Mobile Number" name="faculity_mobile"  maxlength="10" pattern="[7-9]{1}[0-9]{9}" title="phone number with 7-9 and remaing 9 digit with 0-9" required/>
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="faculity_email" placeholder="Enter Email" name="faculity_email" required/>
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-5">          
        <input type="password" class="form-control" id="faculity_password" placeholder="Enter password" name="faculity_password" minlength="4" maxlength="6"required/>
      </div>
    </div>


 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Program:</label>
      <div class="col-sm-5">          
 <select name="faculity_cource" class="form-control" required/>
          
          <option value="">--Select--</option>
          <option value="B-TECH">B-TECH</option>
          <option value="B-PHARMA">B-PHARMA</option>
          <option value="MBA">MBA</option>
  
 </select>
      </div>
    </div>


	
	 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">DEPARTMENT:</label>
      <div class="col-sm-5">          
 <select name="faculity_dept" class="form-control" required/>
					
					<option value="">--Select--</option>
					<option value="CSE">CSE</option>
					<option value="Mech">MECH</option>
					<option value="MBA">MBA</option>
					<option value="CIVIL">CIVIL</option>
          <option value="ECE">ECE</option>
          <option value="B-PHARMA">B-PHARMA</option>
          <option value="APPLIED SCIENCE">APPLIED SCIENCE</option>          


	
 </select>
      </div>
    </div>



	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="save" class="btn btn-default"><i class="fa fa-plus fa-fw"></i>Submit</button>
      </div>
    </div>
  </form>
</div>

<?php
   
    if(isset($_POST['save'])){
     
$femail=$_POST["faculity_email"];
$sql121=mysqli_query($conn,"select * from faculity where faculity_email_id =' $femail'");
$r1=mysqli_num_rows($sql121);

if($r1==true)
{
echo '<script>alert("Already Exists");</script>';
}
else{

$fdept=$_POST["faculity_dept"];
$sql1=mysqli_query($conn,"select branch_id from branch where branch_name='$fdept' ");
$result=mysqli_fetch_assoc($sql1);
  
$fname=$_POST["faculity_name"];
$fcource=$_POST["faculity_cource"];
//$fdept=$_POST["faculity_dept"];
$fmobile=$_POST["faculity_mobile"];
$fpassword=$_POST["faculity_password"];
$fdept_id=$result['branch_id'];

$sql11="insert into faculity(
faculity_name,faculity_cource,faculity_dept,faculity_mobile,faculity_email_id,faculity_password,dept_id) values ('$fname','$fcource','$fdept','$fmobile','$femail','$fpassword','$fdept_id')";
  $results = mysqli_query($conn,$sql11);
  if($results==1)
         echo '<script>alert("Success");</script>';
  else
           echo '<script>alert("Already Exists");</script>';
     }
  }

?>

</body>
</html>
