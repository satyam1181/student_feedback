<?php
    include('../dbconfig.php');
    session_start();
    extract($_POST);
    if(isset($login))
    {
$que=mysqli_query($conn,"select user and pass from admin where user='$email' and pass='$pass'");
        $row=mysqli_num_rows($que);
        if($row)
            {   
                $_SESSION['user']=$email;
                header('location:dashboard.php');
            }
        else
            {
                $err="<font color='white'>Wrong Email or Password !</font>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.3.1/cerulean/bootstrap.min.css" rel="stylesheet" integrity="sha384-C++cugH8+Uf86JbNOnQoBweHHAe/wVKN/mb0lTybu/NZ9sEYbd+BbbYtNpWYAsNP" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>

<style type="text/css">
    
    * {
  margin: 0;
  padding: 0;
  border: 0;
  text-decoration: none;
  outline: none;
}
body,
a {
  font-family: calibri;
  font-size: 14px;
  font-weight: normal;
  color: #3B424D;
}
.main-wrap {
  background: #ffff;
  width: 100%;
  height: 110%;
  position: absolute;
}
.login-main {
  width: 400px;
  height: 260px;
  position: absolute;
  margin: auto;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background:#ff0100;
  padding: 10px;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
  border-radius: 10px;
}
.login-main p {
  text-indent: 10px;
}
.box1 {
  background: #ffd5ce;
  height: 50px;
  text-indent: 10px;
  width: 90%;
  margin-top:10px;
  margin-bottom: 2px;
  color: #3B424D;
  font-size: 15px;
  font-weight: 400;
}
.border1 {
  -webkit-border-radius: 5px 5px 0 0;
  -moz-border-radius: 5px 5px 0 0;
  -ms-border-radius: 5px 5px 0 0;
  -o-border-radius: 5px 5px 0 0;
  border-radius: 5px 5px 0 0;
}
.border2 {
  -webkit-border-radius: 0px 0 5px 5px;
  -moz-border-radius: 0px 0 5px 5px;
  -ms-border-radius: 0px 0 5px 5px;
  -o-border-radius: 0px 0 5px 5px;
  border-radius: 0px 0 5px 5px;
}
.send {
  width: 80px;
  height: 80px;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  position: absolute;
  right: 15px;
  top: 110px;
  border: 5px solid #ff7e68;
  background: #FF5335;
  font-size: 18px;
  color: #fff;
  font-weight: normal;
  text-shadow: 1px 1px 2px #000;
  box-sizing: border-box;
  -webkit-box-sizing: border-box;
}
.send:hover {
  animation: spin 0.3s ease-in-out;
  -webkit-animation: spin 0.3s ease-in-out;
  -moz-animation: spin 0.3s ease-in-out;
  -ms-animation: spin 0.3s ease-in-out;
  -o-animation: spin 0.3s ease-in-out;
  cursor: pointer;
}
@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes spin {
  from {
    -moz-transform: rotate(0deg);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
@-o-keyframes spin {
  from {
    -o-transform: rotate(0deg);
  }
  to {
    -o-transform: rotate(360deg);
  }
}
</style>
    
</head>

<body>
 <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#ff0100">
  <div class="container">
   <div class="navbar-header">
     <a class="navbar-brand" style="color: white;"href="../">Online Feedback System</a>
   </div>
 </div>
 </div>

<form method="post">
   <div class="main-wrap">
        <div class="login-main">
            <h1 style="color: #ffff">Admin Login</h1>
            
            <input type="email" placeholder="Email" name="email" class="box1 border1" required/>
            <input type="password" placeholder="password" name="pass" class="box1 border2" required/>
            <input type="submit" class="send" value="Login" name="login">
            <label>
                             <br><br>           <?php echo @$err;?>
            </label> 
        </div>

    </div>
</form>>

</body>

</html>
