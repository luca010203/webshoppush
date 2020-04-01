<?php
require_once("config/connect.php");

// session_start(); 
$_SESSION['views'] = 1; // store session data
echo "Pageviews = ". $_SESSION['views']; //retrieve data
?>
<!DOCTYPE html>
<h1>welkom</h1>