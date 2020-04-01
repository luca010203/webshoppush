<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $description = $price = $color = $weight = $active = "";
$name_err = $description_err = $price_err = $color_err = $weight_err = $active_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate naam
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


    

     // Validate prijs
     $input_price = trim($_POST["price"]);
     if(empty($input_price)){
         $price_err = "Please enter the price amount.";     
     } elseif(!ctype_digit($input_price)){
         $price_err = "Please enter a positive integer value.";
     } else{
         $price = $input_price;
     }



    // Validate kleur
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
          $active_err = "Please enter boolean active or not.";     
      } else{
          $active = $input_active;
      }




    
   
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($description_err) && empty($price_err) && empty($color_err) && empty($weight_err) && empty($active_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO product (name, description, price, color, weight, active) VALUES (?, ?, ?, ?, ?, ?)";
         
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
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>creer hier uw product.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                            <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>