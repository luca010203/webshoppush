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
$server = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "webshop";

$con = new mysqli($server, $db_user, $db_pass, $db_name);
// session_start();
// If form submitted, insert values into the database.
if (isset($_POST['emailadres'])){
  
        // removes backslashes
 $emailadres = stripslashes($_REQUEST['emailadres']);
        //escapes special characters in a string
 $emailadres = mysqli_real_escape_string($con,$emailadres);
 $password = md5($_POST["password"]);
//  $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
 
 //Checking is user existing in the database or not
        $query = "SELECT * FROM user WHERE `e-mailadres`='$emailadres' AND `password` = '$password'";


        $result = $con->query($query);


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $_SESSION['e-mailadres'] = $row['e-mailadres'];
echo "je bent ingelogd " . $row['e-mailadres'];
       header('location: ../../php/index.php');
    }
} else {
       echo "<div class='form'>
       <h3>Username/password is incorrect.</h3>
       <br/>Click here to <a href='login.php'>Login</a></div>";
}
$con->close();


     
    }else{
?>
<div class="form">
<h1>Log In</h1>
<form action="" method="post" name="login">
<input type="text" name="emailadres" placeholder="emailadres" required />
<input type="password" name="password" placeholder="Password" required />
<input name="submit" type="submit" value="Login" />
</form>
<p>Not registered yet? <a href='register.php'>Register Here</a></p>
</div>
<?php } ?>
</body>
</html>