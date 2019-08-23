<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('../dbconfig.php');

?>
<h1 class="page-header">Add Student</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text"  name="std_name" id="std_name" class="form-control" pattern="[a-zA-Z ]*$" 
        onkeyup="
  var start = this.selectionStart;
  var end = this.selectionEnd;
  this.value = this.value.toUpperCase();
  this.setSelectionRange(start, end);
"
title="This Field Only Contains Character " required/>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Roll No:</label>
            	<input type="number" name="std_roll" id="std_roll" class="form-control" maxlength="10" required/>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email :</label>
            	<input type="email"  name="std_email_id" id="std_email_id" class="form-control" required/>
        </div>
    </div>
	
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Cource</label>
  <select name="std_cource" class="form-control" required/>
					
					<option value="">--Select Cource--</option>
					<option value="B-Tech">B-Tech</option>
					<option value="B-Pharma">B-Pharma</option>
					<option value="MBA">MBA</option>
					</select>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Branch</label>
  <select name="std_branch" class="form-control" required/>
					
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
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Semester</label>
  <select name="std_semester" class="form-control" required/>
					
					<option value="">--Select Cource--</option>
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
	
	
	
	
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
            	<input type="password"   name="std_password" class="form-control" minlength="4" maxlength="6" required/>
        </div>
    </div>
	
	
	
	
                  
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile Number:</label>
            	<input type="number" id="mob"  class="form-control" maxlength="11" name="std_mobile" id="std_mobile"  required/>
        </div>
  	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success"  name="save" value="Add New Student">
        </div>
  	</div>
	</form>
</div>

<?php
    if(isset($_POST['save'])){
      $name=$_POST['std_name'];
      $roll=$_POST['std_roll'];
      $mobile=$_POST['std_mobile'];
      $email=$_POST['std_email_id'];
      $pswd=$_POST['std_password'];
      $cource=$_POST['std_cource'];
      $branch=$_POST['std_branch'];
      $semester=$_POST['std_semester'];
      
      
	    $result = mysqli_query($conn,"insert into student(std_name,id,std_mobile,std_email_id,std_password,std_cource,std_dept,std_semester) values ('$name','$roll','$mobile','$email','$pswd','$cource','$branch','$semester')");
	if($result==1)
            echo '<script>alert("Success");</script>';
        else
           echo '<script>alert("Not Success");</script>';
  }
	
	
?>

</body>
</html>