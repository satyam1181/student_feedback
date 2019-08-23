<?php
//error_reporting(1);
$user= $_SESSION['faculty_login'];
if($user=="")
{header('location:../index.php');}
$faculity_email_id= $_SESSION['faculty_login'];
//echo $faculity_email_id;
include('../dbconfig.php');
$sql=mysqli_query($conn,"select * from faculity where faculity_email_id='$faculity_email_id' ");
$user_name=mysqli_fetch_assoc($sql);
?>
<html>
<head>
<title>profile</title>
<!--<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/bootstrap.min.css"></script>
<script>
$(document).ready(function() {

$("#photo").on('change', function () {

     //Get count of selected files
     var countFiles = $(this)[0].files.length;

     var imgPath = $(this)[0].value;
     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
     var image_holder = $("#image-holder");
     image_holder.empty();

     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
         if (typeof (FileReader) != "undefined") {

             //loop for each file selected for uploaded.
             for (var i = 0; i < countFiles; i++) {

                 var reader = new FileReader();
                 reader.onload = function (e) {
                     $("<img />", {
                         "src": e.target.result,
						 "height":"100px",
						 "width":"100px",
                        
                     }).appendTo(image_holder);
                 }

                 image_holder.show();
                 reader.readAsDataURL($(this)[0].files[i]);
             }

         } else {
             alert("This browser does not support FileReader.");
         }
     } else {
         alert("Pls select only images");
     }
 });	
	
});
</script>
</head>
<body>



<h2>My Profile</h2>
<hr/>
  <form action="editcode.php" class="form-horizontal"  method="post" enctype="multipart/form-data">
  
  <div id="image-holder"><img src="upload/<?php echo $user_name['photo'];?>" width="100px" height="100px" style="margin-left:200px;margin-top:20px;margin-bottom:20px;" /></div>
  
    <div class="control-group form-group ">
      <label class="control-label col-sm-2" for="email">Name:</label>
      <div class="col-sm-5">
        <input type="text" class="form-control" id="faculity_name"  name="faculity_name" value="<?php echo $user_name['faculity_name'];?>" readonly />
      </div>
    </div>
	
	<div class="form-group control-group">
      <label class="control-label col-sm-2" for="email">Mobile:</label>
      <div class="col-sm-5">
        <input type="number"  class="form-control" id="faculity_mobile" value="<?php echo $user_name['faculity_mobile'];?>" name="faculity_mobile" maxlength="10" />
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-5">
        <input type="email" class="form-control" id="faculity_email" value="<?php echo $user_name['faculity_email_id'];?>" name="faculity_email" />
      </div>
    </div>
	
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-5">          
        <input type="text" class="form-control" id="faculity_password" value="<?php echo $user_name['faculity_password'];?>" name="faculity_password" readonly />
      </div>
    </div>


 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Program:</label>
      <div class="col-sm-5"> 

<input type="text" class="form-control" id="faculity_cource" value="<?php echo $user_name['faculity_cource'];?>" name="faculity_cource" readonly />	  

      </div>
    </div>


	
	 <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">DEPARTMENT:</label>
      <div class="col-sm-5">    

	  <input type="text" name="faculity_dept" class="form-control" value="<?php echo $user_name['faculity_dept'];?>"  readonly />
      
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" for="pwd">My Pic</label>
      <div class="col-sm-5">    

	  <input type="file" name="photo" id="photo" accept="image/*"  required/>
      
      </div>
    </div>

	
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="save" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</html>

