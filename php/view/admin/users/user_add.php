<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
// Define variables and initialize with empty values
$firstname = $password = "";
$firstname_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    

    
     // Validate description
   $input_username = trim($_POST["username"]);
   if(empty($input_username)){
       $username_err = "Please enter a username.";
   } else{
       $username = $input_username;
   }



     // Validate description
   $password = trim($_POST["password"]);
   if(empty($input_password)){
       $password_err = "Please enter a password.";
   } else{
       $password = $input_password;
   }


    
   
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err)){
        // Prepare an update statement
        $sql = "UPDATE admin SET username=?, password=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = $password;

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                 // Close statement
        mysqli_stmt_close($stmt);
    }
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
    //     // Close statement
    //     mysqli_stmt_close($stmt);
    // }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>create admin</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>