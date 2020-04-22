<?php
    //include("../config/connect.php");
    require_once "config.php";
    // include("../src/register.php");

    //dd($_POST);

    // if(!empty($_POST)){
    //     $sfd = setFormData();
    // }
    
?>
<?php
// Include config file
// require_once "register.php";
 
// Define variables and initialize with empty values
$firstname = $emailadres = $password = $middlename = $lastname = $birthdate = $confirm_password = "";
$firstname_err = $emailadres_err = $password_err = $middlename_err = $lastname_err = $birthdate_err = $confirm_password_err = "";



// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter a firstname.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM user WHERE `firstname` = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_firstname);
            
            // Set parameters
            $param_firstname = trim($_POST["firstname"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $firstname_err = "This firstname is already taken.";
                } else{
                    $firstname = trim($_POST["firstname"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($firstname_err) && empty($password_err) && empty($confirm_password_err)){
        













 // Validate emailadres
 if(empty(trim($_POST["emailadres"]))){
    $emailadres_err = "Please enter a emailadres.";
} else{
    // Prepare a select statement
    $sql = "SELECT id FROM user WHERE `e-mailadres` = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_emailadres);
        
        // Set parameters
        $param_emailadres = trim($_POST["emailadres"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $emailadres_err = "This emailadres is already taken.";
            } else{
                $emailadres = trim($_POST["emailadres"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}




 // Validate middlename
 if(empty(trim($_POST["middlename"]))){
    $middlename_err = "Please enter a middlename.";
} else{
    // Prepare a select statement
    $sql = "SELECT id FROM user WHERE `middlename` = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_middlename);
        
        // Set parameters
        $param_middlename = trim($_POST["middlename"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $middlename_err = "This middlename is already taken.";
            } else{
                $middlename = trim($_POST["middlename"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}








 // Validate lastname
 if(empty(trim($_POST["lastname"]))){
    $lastname_err = "Please enter a lastname.";
} else{
    // Prepare a select statement
    $sql = "SELECT id FROM user WHERE `lastname` = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_lastname);
        
        // Set parameters
        $param_lastname = trim($_POST["lastname"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $lastname_err = "This lastname is already taken.";
            } else{
                $lastname = trim($_POST["lastname"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}







 // Validate birthdate
 if(empty(trim($_POST["birthdate"]))){
    $birthdate_err = "Please enter a birthdate.";
} else{
    // Prepare a select statement
    $sql = "SELECT id FROM user WHERE `birthdate` = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $param_birthdate);
        
        // Set parameters
        $param_birthdate = trim($_POST["birthdate"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            /* store result */
            mysqli_stmt_store_result($stmt);
            
            if(mysqli_stmt_num_rows($stmt) == 1){
                $birthdate_err = "This birthdate is already taken.";
            } else{
                $birthdate = trim($_POST["birthdate"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }
}















        
        // Prepare an insert statement
        $sql = "INSERT INTO user ( firstname,`e-mailadres`, `password`, middlename, lastname, birthdate) VALUES (?,?,?,?,?,'2020-1-1')";
      
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_firstname, $param_emailadres,
                                                   md5($_POST['password']), $param_middlename,
                                                   $param_lastname);

            //echo("username:".$username);
            //echo("password:".$password);
           
            // Set parameters
            $param_firstname = trim($_POST["firstname"]);;
            // $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            
       
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
                echo "Something went wrong. Please try again later.";
                exit();
            }

            

            // Close statement
            mysqli_stmt_close($stmt);
        }

    }
    
    // Close connection
    mysqli_close($con);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                <label>firstname</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                <span class="help-block"><?php echo $firstname_err; ?></span>
            </div>   
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($middlename_err)) ? 'has-error' : ''; ?>">
                <label>middlename</label>
                <input type="text" name="middlename" class="form-control" value="<?php echo $middlename; ?>">
                <span class="help-block"><?php echo $middlename_err; ?></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                <label>lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                <span class="help-block"><?php echo $lastname_err; ?></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($emailadres_err)) ? 'has-error' : ''; ?>">
                <label>emailadres</label>
                <input type="text" name="emailadres" class="form-control" value="<?php echo $emailadres; ?>">
                <span class="help-block"><?php echo $emailadres_err; ?></span>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($birthdate_err)) ? 'has-error' : ''; ?>">
                <label>birthdate</label>
                <input type="text" name="birthdate" class="form-control" value="<?php echo $birthdate; ?>">
                <span class="help-block"><?php echo $birthdate_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>