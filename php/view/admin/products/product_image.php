<?php
require_once '../../../config/connect.php';
// require("../../dashboard/navbar.php");
?>
<div class="container">
<?php
if(isset($_POST['addnew'])){
    if( empty($_POST['product_id']))
    {
        echo "Please fillout all required fields";
    }else{
        $product_id = $_POST['product_id'];
        $target_dir = "img/";  
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); 
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        $active = $_POST['active'];
        $sql = "INSERT INTO product_image(product_id,image,active)
        VALUES('$product_id','$target_file','$active')";

        if( $con->query($sql) === TRUE){
            echo "<div class='alert alert-success'>Successfully added new user</div>";
        }else{
            echo "<div class='alert alert-danger'>Error: There was an error while adding new user</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="box">
        <h3><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Image</h3>
        <form method="post" enctype="multipart/form-data">
        <label for="product_id">product_id:</label>
        <input type="text" id="product_id" name="product_id" class="form-control"><br>
        <br>
        <label for="image">image:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <br>
        <label for="active">active:</label>
        <input type="text" name="active" id="active" class="form-control"><br>
        <br>
        <input type="submit" name="addnew" class="btn btn-success" value="Add New">
        </form>
    </div>
    </div>
    </div>
</div>
</body>
</html>