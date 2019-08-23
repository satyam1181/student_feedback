
<?php 
include('../dbconfig.php');

$user= $_SESSION['user'];
if($user=="")
{
  header('location:../index.php');
}
  

?>
<html>

<head>
<style>
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>

<body>
<form method="post">
<fieldset>
<center><u>Student's FeedBack Form</u></center><br>
 
<fieldset>




<h3>Please give your answer about the following question by circling the given grade on the scale:</h3>


<button type="button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:3px">Strongly Agree 5</button>
<button type="button" style="font-size:7pt;color:white;background-color:Brown;border:2px solid #336600;padding:3px">Agree 4</button>
<button type="button" style="font-size:7pt;color:white;background-color:blue;border:2px solid #336600;padding:3px">Neutral 3</button>
<button type="button" style="font-size:7pt;color:white;background-color:Black;border:2px solid #336600;padding:3px"> Disagree 2</button>
<button type="button" style="font-size:7pt;color:white;background-color:red;border:2px solid #336600;padding:3px">Strongly Disagree 1</button><br>

<table class="table table-bordered" style="margin-top:50px">
<tr>

<th>  Faculty Name :</th>
<td>

	<?php
  $std_sem=$_SESSION['std_semester'];

	extract($_POST);
	$fa_id=$_GET['id'];
    $sql1=mysqli_query($conn,"select * from m where faculty_id='$fa_id' and sem='$std_sem' ");
    $results=mysqli_fetch_assoc($sql1);
 	echo $results['faculty_name'];
   $f_name=$results['faculty_name'];
  
	 ?>
</td>
</tr>
<tr>
<th>Subject</th>
<td><?php echo $results['subject_code'] ?></td>
</tr>
</table>


<h3>1-Course Material</h3>
<table class="table table-bordered">
<tr>
<td><b>1:</b> Teacher provided the course outline having weekly content plan with list of  required text book:</td>  
<td><input type="radio" name="quest1" value="5" required> 5
  <input type="radio" name="quest1" value="4">4
  <input type="radio" name="quest1" value="3"> 3
<input type="radio" name=" quest1" value="2">2
<input type="radio" name="quest1" value="1">1</td>
</tr>
  
<tr>
<td><b>2:</b>Course objectives,learning outcomes and grading criteria are clear to me:</td> 
<td><input type="radio" name="quest2" value="5" required>5
  <input type="radio" name="quest2" value="4">4
  <input type="radio" name="quest2" value="3">3
<input type="radio" name=" quest2" value="2">2
<input type="radio" name="quest2" value="1">1</td>
</tr>

<tr>
<td>
<b>3:</b>Course integrates throretical course concepts with the real world examples:</td> 
<td>
<input type="radio" name="quest3" value="5" required> 5
  <input type="radio" name="quest3" value="4">4
  <input type="radio" name="quest3" value="3"> 3
<input type="radio" name="quest3" value="2">2
<input type="radio" name="quest3" value="1">1</td>
</tr>
</table>

<h3>2-Class Teaching</h3>
 <table  class="table table-bordered" >
<Td><b>4:</b> Teacher is punctual,arrives on time and leaves on time:</td>
<td> <input type="radio" name="quest4" value="5" required> 5
  <input type="radio" name="quest4" value="4">4
  <input type="radio" name="quest4" value="3"> 3
<input type="radio" name="quest4" value="2">2
<input type="radio" name="quest4" value="1">1
</td>

<tr>
<td>
<b>5:</b> Teacher is good at stimulating the interest in the course content:</td>
<td> 
<input type="radio" name="quest5" value="5" required> 5
<input type="radio" name="quest5" value="4">4
  <input type="radio" name="quest5" value="3"> 3
<input type="radio" name="quest5" value="2">2
<input type="radio" name="quest5" value="1">1</td>
</tr>
<tr>
<td><b>6:</b> Teacher is good at explaining the subject matter:</td>
<td>
 <input type="radio" name="quest6" value="5" required> 5
  <input type="radio" name="quest6" value="4">4
  <input type="radio" name="quest6" value="3"> 3
<input type="radio" name=" quest6" value="2">2
<input type="radio" name="quest6" value="1">1</td>
</tr>

<tr><td>
<b>7:</b> Teacher's presentation was clear,loud ad easy to understand:</td>
<td> <input type="radio" name="quest7" value="5" required> 5
  <input type="radio" name="quest7" value="4">4
  <input type="radio" name="quest7" value="3"> 3
<input type="radio" name="quest7" value="2">2
<input type="radio" name="quest7" value="1">1</td>
<tr>
<td>
<b>8:</b> Teacher is good at using innovative teaching methods/ways:</td><td> 
<input type="radio" name="quest8" value="5" required> 5
  <input type="radio" name="quest8" value="4">4
  <input type="radio" name="quest8" value="3">3
<input type="radio" name="quest8" value="2">2
<input type="radio" name="quest8" value="1">1</td>
</tr>
<tr>
<td>
<b>9:</b> Teacher is available and helpful during counseling hours:</td> 
<td><input type="radio" name="quest9" value="5" required>5
  <input type="radio" name="quest9" value="4">4
  <input type="radio" name="quest9" value="3"> 3
<input type="radio" name="quest9" value="2">2
<input type="radio" name="quest9" value="1">1</td>
</tr>
<tr>
<td>
<b>10:</b> Teacher has competed the whole course as per course outline:</td>
<td>
 <input type="radio" name="quest10" value="5" required> 5
  <input type="radio" name="quest10" value="4">4
  <input type="radio" name="quest10" value="3"> 3
<input type="radio" name="quest10" value="2">2
<input type="radio" name="quest10" value="1">1</td>
</tr>
</table>

<h3>3-Class Assessment</h3>
 <table  class="table table-bordered" >
<tr>
<td><b>11:</b>Teacher was always fair and impartial:</td>
<td>
 <input type="radio" name="quest11" value="5" required> 5
  <input type="radio" name="quest11" value="4">4
  <input type="radio" name="quest11" value="3"> 3
<input type="radio" name="quest11" value="2">2
<input type="radio" name="quest11" value="1">1</td>
</tr>
<tr>
<td><b>12:</b>Assessments conducted are clearly connected to maximize learining objectives:</td>
<Td>
 <input type="radio" name="quest12" value="5" required> 5
  <input type="radio" name="quest12" value="4">4
  <input type="radio" name="quest12" value="3"> 3
<input type="radio" name="quest12" value="2">2
<input type="radio" name="quest12" value="1">1</td>
</tr>
</table>

<b>13:</b>What I liked about the course:<br><br>
<center>
<textarea name="quest13" rows="5" cols="60" id="comments" style="font-family:sans-serif;font-size:1.2em;">

</textarea></center><br><br>
<b>14:</b>Why I disliked about the course:<br><br>
<center>
<textarea name="quest14" rows="5" cols="60" id="comments" style="font-family:sans-serif;font-size:1.2em;">

</textarea></center>

<p align="center"><button type="submit" class="button" name="sub" style="vertical-align:middle"><span> Submit </span> </button></p>


</form>
</fieldset>


<!--<a href="transport.html"><p align="right"><button type="Button"style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Next</button></p></a>
<a href="About.php"><p align="right"><button type="Button" style="font-size:7pt;color:white;background-color:green;border:2px solid #336600;padding:7px">Back</button></p></a>-->

</div><!--close content_item-->
      </div><!--close content-->   
	
	</div><!--close site_content-->  	
  
    
    </div><!--close main-->
  </form>
<center>
</body>
</html>
<?php 
extract($_POST);
if(isset($sub))
{
$roll=$_SESSION['roll'];
$sql=mysqli_query($conn,"select * from feedback where std_roll_no ='$roll' and faculity_id='$fa_id'");
$r=mysqli_num_rows($sql);

if($r==true)
{
echo "<h2 style='color:red'>You have already given feedback to this faculty</h2>";
}
else
{
$today = date("d.m.y");
$std_roll=$_SESSION['roll'];
$std_name=$_SESSION['name'];
$subject=$results['subject_code'];
//echo "<h1>".$results['subject_code']."</h1>";
//echo "<h1>".$subject."</h1>";
$sum=($quest1+$quest2+$quest3+$quest4+$quest5+$quest6+$quest7+$quest8+$quest9+$quest10+$quest11+$quest12)/12;
$query1="insert into feedback (faculity_id,faculity_name,std_roll_no,std_name,date,subject,qns1,qns2,qns3,qns4,qns5,qns6,qns7,qns8,qns9,qns10,qns11,qns12,comment1,comment2,total) 
values('$fa_id','$f_name','$std_roll','$std_name','$today','$subject','$quest1','$quest2','$quest3','$quest4','$quest5','$quest6','$quest7','$quest8','$quest9','$quest10','$quest11','$quest12','$quest13','$quest14','$sum')" OR die(mysqli_error($conn));
$res=mysqli_query($conn,$query1) OR die(mysqli_error($conn));
if($res==1)
{
echo "<h2 style='color:green'>Thank you for your feedback </h2>";
}
 else
 {
  echo "<h2 style='color:Red'>Not Inserted </h2>";

 }

}
}


?>
