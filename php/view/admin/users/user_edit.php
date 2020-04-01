<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$firstname = $middlename = $lastname = $birthdate = $email = $password = "";
$firstname_err = $middlename_err = $lastname_err = $birthdate_err = $email_err = $password_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
     // Validate description
   $input_firstname = trim($_POST["firstname"]);
   if(empty($input_firstname)){
       $firstname_err = "Please enter a firstname.";
   } else{
       $firstname = $input_firstname;
   }


     // Validate description
   $password = trim($_POST["password"]);
   if(empty($input_password)){
       $password_err = "Please enter a password.";
   } else{
       $password = $input_password;
   }
    
    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($middlename_err) && empty($lastname_err) && empty($birthdate_err) && empty($email_err) && empty($password_err)){
        // Prepare an update statement
        $sql = "UPDATE user SET firstname=?, middlename=?, lastname=?, birthdate=?, email=?, password=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_firstname, $param_middlename, $param_lastname, $param_birthdate, $param_email, $param_password);
            
            // Set parameters
            $param_firstname = $firstname;
            $param_middlename = $middlename;
            $param_lastname = $lastname;
            $param_birthdate = $birthdate;
            $param_email = $email;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
                 // Close statement
        mysqli_stmt_close($stmt);
    }
    
            }
        }
         
    //     // Close statement
    //     mysqli_stmt_close($stmt);
    // }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM user WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $firstname = $row["firstname"];
                    $middlename = $row["middlename"];
                    $lastname = $row["lastname"];
                    $birthdate = $row["birthdate"];
                    $email = $row["e-mailadres"];
                    $password = $row["password"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                    // Close statement
        mysqli_stmt_close($stmt);
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // // Close statement
        // mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <label>firstname</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                            <span class="help-block"><?php echo $firstname_err;?></span>
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