<!DOCTYPE html>
<html lang="en">
<head>
<?php
include('../dbconfig.php');


?>
<h1 class="page-header">Add Subject</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">

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
        	<label>Department</label>
  <select name="subject_dept" class="form-control" required/>
					
					<option value="">--Select Dept--</option>
                      <?php
                      $sql=mysqli_query($conn,"select branch_name from branch");
                      $row=mysqli_num_rows($sql);
                       while($row = mysqli_fetch_array($sql))
                           {
                            echo "<option value='".$row['branch_name'] ."'> ".$row['branch_name']." </option>" ;
                           }
                      ?>
                    
					</select>
        </div>
    </div>


    

	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Subject Code:</label>
            	<input type="text"  name="subject_code" placeholder="ABC-123"  class="form-control" required/>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Subject Name	</label>
            	<input type="text" name="subject_name" placeholder="Subject Name"  class="form-control" pattern="[a-zA-Z ]*$" 
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
            	<input type="submit" class="btn btn-success" name="save" value="Add New Subject">
        </div>
  	</div>
	</form>
</div>

<?php
    if(isset($_POST['save'])){
$subjectcode=$_POST["subject_code"];
$sql=mysqli_query($conn,"select * from subject where subject_code =' $subjectcode'  ");
$r=mysqli_num_rows($sql);

if($r==true)
{
echo '<script>alert("Already Exists");</script>';
}
else{










$sql="insert into subject(subject_name,subject_code,subject_dept,std_cource) values ('".$_POST["subject_name"]."','".$_POST["subject_code"]."','".$_POST["subject_dept"]."','".$_POST["std_cource"]."')";
	    $result = mysqli_query($conn,$sql);
      if($result)
      {
            echo '<script>alert("Success");</script>';
       }
       else
       {
           echo '<script>alert("Already Exists");</script>';
       }
  }
	}
?>



</body>
</html>