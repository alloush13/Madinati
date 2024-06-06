<?php 
session_start();
$pageName = "login";
include "../config/database.php";
include "../config/validate.php";
$error ="";
$title ="تسجيل الدخول ";
$formAction ="/madinati/auth/login.php";
$accountType ="user";
$loginLink = '<p class="text-center"><a href="/madinati/auth/admin-login.php" class="link-dark">تسجيل دخول المدير</a></p>';
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    $validate = validateLogin($_POST);

   
    if($validate["err"]){
        $error = $validate["msg"];
    }else
    {
        if($type == "user"){
            $result = checkLogin($conn,"users",$email,$password);
            $result["role"]="user";
        }
            
        if($type == "guide"){
            $result = checkLogin($conn,"tourist_guides",$email,$password);
            $result["role"]="guide";
        }
            

        if($result["err"]){
            $error = $result["msg"];
        }else{
            $_SESSION['role']=$result["role"];
            $_SESSION['id']=$result["id"];
            $_SESSION['email']=$email;
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