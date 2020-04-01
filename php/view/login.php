<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="assets/css/style2.css" />
</head>
<body>
<?php
// require('../config/connect.php');
require_once "config.php";
// session_start();
// If form submitted, insert values into the database.
if (isset($_POST['firstname'])){
        // removes backslashes
 $firstname = stripslashes($_REQUEST['firstname']);
        //escapes special characters in a string
 $firstname = mysqli_real_escape_string($con,$firstname);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM user WHERE firstname='?';
-- and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['firstname'] = $firstname;
            // Redirect user to index.php
     header("Location: ../index.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>