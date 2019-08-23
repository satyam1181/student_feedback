<?php 

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
//require 'vendor/autoload.php';
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'dbconfig.php';

if(isset($_POST["email"]))
{   
    $emailTo = $_POST["email"];

    $sql1 = mysqli_query($conn,"select std_email_id from student where std_email_id = '$emailTo' ");
    $r=mysqli_num_rows($sql1);
    if($r==false)
    {
        exit("Not Valid User");
    }
    else
    {
        

    $code = uniqid(true);
    $query = mysqli_query($conn,"INSERT INTO resetPasswords(email,code) VALUES ('$emailTo','$code')");
    
    $mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'sanjudada900@gmail.com';                     // SMTP username
    $mail->Password   = '1saurabhgupta';                               // SMTP password
    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('sanjudada900@gmail.com', 'Feedback System');
    $mail->addAddress($emailTo, 'Joe User');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    $mail->addReplyTo('no-reply@gmail.com', 'no-reply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   

    // Content
    $url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/StudentResetPassword.php?code=$code";
    $mail->isHTML(true);                                   // Set email format to HTML
    $mail->Subject = "Your Password Reset Link ";
   // $mail->Body    = "This is the HTML message body <b>in bold!</b> $code";
    $mail->Body    = "<h1>You Are Requested To Reset Your Password</h1>
                       Click <a href='$url'>this link</a> to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Reset Password Link Sent To Your Email';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
exit();

}
}
// Instantiation and passing `true` enables exceptions
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Online feedback System</title>
    
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="background:#ff0100">
        <div class="container" >
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#FFFFFF">Online feedback System</a>
                
                
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    
                     <li style="color:#FFFFFF">
                        <a style="color:#FFFFFF; background-color:#0000;" href="index.php" onmouseover="this.style.backgroundColor='#0F0'" onmouseout="this.style.backgroundColor='#ff0100'"><i class="fa fa-home fa-fw"></i>Home</a>
                    </li>
                    
                    <li style="color:#FFFFFF">
                        <a style="color:#FFFFFF" href="index.php?info=about" onmouseover="this.style.backgroundColor='#0F0'" onmouseout="this.style.backgroundColor='#ff0100'"><i class="fa fa-home fa-fw"></i>About</a>
                    </li>
                    
                
                
                     
                        
                    
                   

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">

<form method="post">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-6"><h3>Student Reset Password</h2></div>
	</div>
	
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"><?php echo @$err;?></div>
	</div>
	
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4">Enter YOur Email</div>
		<div class="col-sm-5">
		<input type="email" name="email" class="form-control" required="true" /></div>
	</div>
	
	
	<div class="row" style="margin-top:10px">
		<div class="col-sm-4"></div>
		<div class="col-sm-8">
		<input type="submit" value="Reset Password" name="submit" class="btn btn-info"/>
		
		
		</div>

	
	</div>
</form>	
</div>
</div>

<?php 
                    @$info=$_GET['info'];
                    if($info!="")
                    {
                                            
                         if($info=="about")
                         {
                         include('about.php');
                         }
                         else if($info=="contact")
                         {
                         include('contact.php');
                         }
                         else if($info=="student_login")
                         {
                         include('student_login.php');
                         }
                          else if($info=="faculty_login")
                         {
                         include('faculty_login.php');
                         }
                         else if($info=="registration")
                         {
                            include('registration.php');
                         }
                         else if($info=="StudentRequestReset")
                         {
                            include('StudentRequestReset.php');
                         }
                        
                    }
     ?>

</body>

</html>
