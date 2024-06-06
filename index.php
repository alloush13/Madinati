<?php

 session_start();
 $pageName = "home";
 include('config/database.php');
if(!isset($_SESSION['id']))
$_SESSION['id']="";
if(!isset($_SESSION['role']))
$_SESSION['role']="guest";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Madinati</title>
        <link rel="stylesheet" href="./public/css/bootstrap.min.css" /> 
        <link rel="stylesheet" href="./public/css/style.css" />
        
    </head>
    
    <body>
    <?php include './includes/navbar.php'?>

        <div class="landing position-absolute"></div>
        
        <script src="./public/js/bootstrap.bundle.min.js"></script>
        <script src="./public/js/script.js"></script>
    </body>
    
</html>
