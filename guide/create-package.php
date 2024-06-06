<?php

session_start();
$pageName = "add-package";
include "../includes/check-login.php";
include "../config/database.php";
include "../config/validate.php";
isRole("guide");
$error="";


if(isset($_POST["submit"])) {


    $id_tourist_guide = $_SESSION['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $date =date("Y-m-d H:i:s");
    $status = "WaitingAccept";
    $photoUrl = ""; 
    $uploadOk = false;
    $fileName =time(). $_FILES['photo']['name'];
    
    $dir =  strstr(__DIR__, 'madinati',true)."/madinati/public/images/packages/".$fileName;
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $dir)) {
        $photoUrl = "public/images/packages/".$fileName;
        $uploadOk = true;

    } 

    $validate = validateCreatePackage($_POST);
    if ($validate["err"]) {
        $error = $validate["msg"];
    }elseif(!$uploadOk){
        $error="يرجى إدخال صورة للحزمة بشكل صحيح";
    }else{
        $sql = "insert into tourist_guide_requests (id_tourist_guide,name,price,date,details,photo_url,status)
        values('$id_tourist_guide','$name','$price','$date','$details','$photoUrl','$status')";
        mysqli_query($conn, $sql);
        header("Location: http://localhost/madinati/index.php");
    }

    
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Package</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include '../includes/navbar.php' ?>
    <?php include '../includes/create-package-form.php' ?>



    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>