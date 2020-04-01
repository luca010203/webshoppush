<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
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
    $input_middlename = trim($_POST["middlename"]);
    if(empty($input_middlename)){
        $middlename_err = "Please enter a middlename.";
    } else{
        $middlename = $input_middlename;
    }

    
   // Validate description
   $input_lastname = trim($_POST["lastname"]);
   if(empty($input_lastname)){
       $lastname_err = "Please enter a lastname.";
   } else{
       $lastname = $input_lastname;
   }
    
   // Validate description
   $input_birthdate = trim($_POST["birthdate"]);
   if(empty($input_birthdate)){
       $birthdate_err = "Please enter a birthdate.";
   } else{
       $birthdate = $input_birthdate;
   }


    // Validate description
   $input_email = trim($_POST["email"]);
   if(empty($input_email)){
       $email_err = "Please enter a email.";
   } else{
       $email = $input_email;
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
                        <h2>create user</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?>">
                            <label>firstname</label>
                            <input type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                            <span class="help-block"><?php echo $firstname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($middlename_err)) ? 'has-error' : ''; ?>">
                            <label>middlename</label>
                            <textarea name="middlename" class="form-control"><?php echo $middlename; ?></textarea>
                            <span class="help-block"><?php echo $middlename_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?>">
                            <label>lastname</label>
                            <textarea name="lastname" class="form-control"><?php echo $lastname; ?></textarea>
                            <span class="help-block"><?php echo $lastname_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($birthdate_err)) ? 'has-error' : ''; ?>">
                            <label>birthdate</label>
                            <textarea name="birthdate" class="form-control"><?php echo $birthdate; ?></textarea>
                            <span class="help-block"><?php echo $birthdate_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                            <label>email</label>
                            <input type="text" name="email" class="form-control" value="<?php echo $email; ?>">
                            <span class="help-block"><?php echo $email_err;?></span>
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