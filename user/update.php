<?php 
$roll=$_SESSION['user'];
//echo $roll;
include('../dbconfig.php');
$sql=mysqli_query($conn,"select * from student where id='$user' or std_email_id='$user' ");
$user_name=mysqli_fetch_assoc($sql);
?>


<!DOCTYPE html>
<html lang="en">
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
<h1 class="page-header">My Profile</h1>
<div class="col-lg-8" style="margin:15px;">
    <form action="editcode.php" method="post" enctype="multipart/form-data">
    
    <div id="image-holder"><img src="upload/<?php echo $user_name['photo'];?>" width="100px" height="100px" style="margin:20px;margin-top:-20px;" /></div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Name:</label>
                <input type="text" value="<?php echo $user_name['std_name'];?>" name="std_name" id="std_name" class="form-control" readonly />
                
                
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Roll No:</label>
                <input type="number" value="<?php echo $user_name['id'];?>" name="std_roll" id="std_roll" class="form-control" maxlength="10" readonly />
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Email :</label>
                <input type="email" value="<?php echo $user_name['std_email_id'];?>" name="std_email_id" id="std_email_id" class="form-control" required/>
        </div>
    </div>
    
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Cource</label>
  <input name="std_cource" class="form-control"   value="<?php echo $user_name['std_cource'];?>" readonly />
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Branch</label>
  <input name="std_branch" class="form-control"   value="<?php echo $user_name['std_dept'];?>" readonly />
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Semester</label>
                    
                    <input name="std_semester" class="form-control" value="<?php echo $user_name['std_semester'];?>" readonly />

        </div>
    </div>
    
    
    
    
    
    <div class="control-group form-group">
        <div class="controls">
            <label>Password :</label>
                <input name="std_password" class="form-control"   value="<?php echo $user_name['std_password'];?>" readonly />
        </div>
    </div>
    
    
    
    
                  
    <div class="control-group form-group">
        <div class="controls">
            <label>Mobile Number:</label>
                <input type="number" value="<?php echo $user_name['std_mobile'];?>" class="form-control" maxlength="10" name="std_mobile" id="std_mobile"  required/>
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
            <label>My Pic</label>
                <input type="file" name="photo" id="photo" accept="image/*"  required/>
        </div>
    </div>
    
    <div class="control-group form-group">
        <div class="controls">
                <input type="submit" class="btn btn-success" name="save" value="update">
        </div>
    </div>
    </form>
</div>


</body>
</html>

