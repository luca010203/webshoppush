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
        $sql = "SELECT * FROM user where id = ?";
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
                            <h2 class="pull-left">klanten Details</h2></p>
                        </div>
                        <div class="form-group">
                            <label >ID</label>
                            <p class="form-control-static"><?php echo $data['id'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>Firstname</label>
                            <p class="form-control-static"><?php echo $data['firstname'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>middlename</label>
                            <p class="form-control-static"><?php echo $data['middlename'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>lastname</label>
                            <p class="form-control-static"><?php echo $data['lastname'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>birthdate</label>
                            <p class="form-control-static"><?php echo $data['birthdate'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>e-mail</label>
                            <p class="form-control-static"><?php echo $data['e-mailadres'];?></p>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>password</label>
                            <p class="form-control-static"><?php echo $data['password'];?></p>
                        </div>
                        <p><a href="index.php" class="btn btn-primary">Back</a></p>
                  <?php echo '<td><a href="../../config/actions.php?del='.$data['id'].'" class="btn btn-sm btn-danger">Delete</a></td>'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

