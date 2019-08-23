<?php
	extract($_POST);
	if(isset($save))
	{	
	
	mysqli_query($conn,"update faculity set faculity_name='$name',faculity_email_id	='$email',faculity_dept='$department',faculity_password='$pass',faculity_mobile='$mobile' where id='".$_GET['id']."'");	

$err="<font color='green'>Faculty Details updated</font>";

	}
	
$con=mysqli_query($conn,"select * from faculity where id='".$_GET['id']."'");

$res=mysqli_fetch_assoc($con);	

?>


<h1 class="page-header">Update  Faculty</h1>
<div class="col-lg-8" style="margin:15px;">
	<form method="post">
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label><?php echo @$err;?></label>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Name:</label>
            	<input type="text" value="<?php echo @$res['faculity_name'];?>" name="name" class="form-control" required>
        </div>
   	</div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Email:</label>
            	<input type="text" value="<?php echo @$res['faculity_email_id'];?>" name="email" class="form-control" required>
        </div>
   	</div>
 	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Dept :</label>
            	<input type="text" value="<?php echo @$res['faculity_dept'];?>"  name="department" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Password :</label>
          <input type="text" value="<?php echo @$res['faculity_password'];?>"  name="pass" class="form-control" required>
        </div>
    </div>
	
	<div class="control-group form-group">
    	<div class="controls">
        	<label>Mobile:</label>
  <input type="text"  name="mobile" value="<?php echo @$res['faculity_mobile'];?>" class="form-control" required>
        </div>
    </div>
	
	
	<div class="control-group form-group">
    	<div class="controls">
            	<input type="submit" class="btn btn-success" name="save" value="Update  Faculty">
        </div>
  	</div>
	</form>


</div>