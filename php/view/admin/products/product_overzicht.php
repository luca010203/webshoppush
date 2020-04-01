<?php 


// include("../config/config.php")
//   session_start(); 

?>
<?php
    require 'database.php';
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: index.php");
    } else {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM product where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View User : bishrulhaq.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin-top: 20px;">
                    <div class="card-body">
                        <div class="page-header">
                            <h1><?php echo $data['name'];?></p>
                        </div>
                        <div class="form-group">
                            <label >ID</label>
                            <p class="form-control-static"><?php echo $data['id'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Name</label>
                            <p class="form-control-static"><?php echo $data['name'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Description</label>
                            <p class="form-control-static"><?php echo $data['description'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Category_id</label>
                            <p class="form-control-static"><?php echo $data['category_id'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Price</label>
                            <p class="form-control-static"><?php echo $data['price'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Color</label>
                            <p class="form-control-static"><?php echo $data['color'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Weight</label>
                            <p class="form-control-static"><?php echo $data['weight'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Active</label>
                            <p class="form-control-static"><?php echo $data['active'];?></p>
                        </div>
                        <p><a href="products.php" class="btn btn-primary">Back</a></p>
                  <?php echo '<td><a href="../../config/actions.php?del='.$data['id'].'" class="btn btn-sm btn-danger">Delete</a></td>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

