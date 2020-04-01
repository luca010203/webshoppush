<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $description = $price = $color = $weight = $active = "";
$name_err = $description_err = $price_err = $color_err = $weight_err = $active_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }


    // Validate description
    $input_description = trim($_POST["description"]);
    if(empty($input_description)){
        $description_err = "Please enter a description.";
    } else{
        $description = $input_description;
    }

    
    // Validate address price
    $input_price = trim($_POST["price"]);
    if(empty($input_price)){
        $price_err = "Please enter a price.";     
    } else{
        $price = $input_price;
    }
    
    // Validate color
    $input_color = trim($_POST["color"]);
    if(empty($input_color)){
        $color_err = "Please enter a color.";
    } else{
        $color = $input_color;
    }

        // Validate weight
    $input_weight = trim($_POST["weight"]);
    if(empty($input_weight)){
        $weight_err = "Please enter a weight.";
    } else{
        $weight = $input_weight;
    }


    // Validate active
    $input_active = trim($_POST["active"]);
    if(empty($input_active)){
        $active_err = "Please enter the active.";     
    } elseif(!ctype_digit($input_active)){
        $active_err = "Please enter a positive integer value.";
    } else{
        $active = $input_active;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($description_err) && empty($price_err) && empty($color_err) && empty($weight_err) && empty($active_err)){
        // Prepare an update statement
        $sql = "UPDATE product SET name=?, description=?, price=?, color=?, weight=?, active=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_description, $param_price, $param_color, $param_weight, $param_active);
            
            // Set parameters
            $param_name = $name;
            $param_description = $description;
            $param_price = $price;
            $param_color = $color;
            $param_weight = $weight;
            $param_active = $active;
            
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
        $sql = "SELECT * FROM employees WHERE id = ?";
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
                    $name = $row["name"];
                    $description = $row["description"];
                    $price = $row["price"];
                    $color = $row["color"];
                    $weight = $row["weight"];
                    $active = $row["active"];
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
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label>description</label>
                            <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            <span class="help-block"><?php echo $description_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>price</label>
                            <textarea name="price" class="form-control"><?php echo $price; ?></textarea>
                            <span class="help-block"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                            <label>color</label>
                            <textarea name="color" class="form-control"><?php echo $color; ?></textarea>
                            <span class="help-block"><?php echo $color_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                            <label>weight</label>
                            <input type="text" name="weight" class="form-control" value="<?php echo $weight; ?>">
                            <span class="help-block"><?php echo $weight_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($active_err)) ? 'has-error' : ''; ?>">
                            <label>active</label>
                            <input type="text" name="active" class="form-control" value="<?php echo $active; ?>">
                            <span class="help-block"><?php echo $active_err;?></span>
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