<?php 
session_start();
include "../config/database.php";
include "../config/validate.php";
$error ="";
$pageName = "login";
$title ="تسجيل دخول المدير";
$formAction ="/madinati/auth/admin-login.php";
$accountType ="admin";

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $validate = validateLogin($_POST);
    if($validate["err"]){
        $error = $validate["msg"];
    }else
    {
        $result = checkLogin($conn,"admins",$email,$password);
        if($result["err"]){
            $error = $result["msg"];
        }else{
            $_SESSION['role']="admin";
            $_SESSION['id']=$result["id"];
            header("Location: http://localhost/madinati/index.php");
        }
          
    }
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include '../includes/navbar.php' ?>
    <?php include '../includes/login-form.php' ?>


    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>