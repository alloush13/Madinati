<?php

session_start();
include "../config/database.php";
include "../includes/check-login.php";
include "../config/validate.php";
$pageName = "services";

isRole("guide");

$id_tourist_guide = $_SESSION['id'];
$error="";

if (isset($_GET['id'])) {
    $id_scheduled_package = $_GET['id'];
    if ($id_scheduled_package > 0) {
        $sql = "select * from scheduled_packages  where id_scheduled_package =$id_scheduled_package and id_tourist_guide = $id_tourist_guide";
        $result = mysqli_query($conn, $sql);
        $package = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
        $name =$package[0]['name'];
        $price =$package[0]['price'];
        $details =$package[0]['details'];
        $photoUrl =$package[0]['photo_url'];
         
    }
}


if(isset($_POST['submit-update']))
{

    

    $id_scheduled_package = $_POST['id_scheduled_package'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details = $_POST['details'];
    $date =date("Y-m-d H:i:s");
    $status = "WaitingAccept";
    $photoUrl =$_POST['old_photo_url'];
    if( $_FILES['photo']['size']>0){
        $fileName =time(). $_FILES['photo']['name'];
        $dir =  strstr(__DIR__, 'madinati',true)."/madinati/public/images/packages/".$fileName;
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $dir)) {
            $photoUrl = "public/images/packages/".$fileName;
        }
    }
    $validate = validateCreatePackage($_POST);
    if ($validate["err"]) {
        $error = $validate["msg"];
    }else{
        $sql = "insert into tourist_guide_requests (id_tourist_guide,name,price,date,details,photo_url,status)
        values('$id_tourist_guide','$name','$price','$date','$details','$photoUrl','$status')";
        mysqli_query($conn, $sql);
        $sql = "delete from scheduled_packages where id_scheduled_package = '$id_scheduled_package'";
        mysqli_query($conn,$sql);
        header("Location: http://localhost/madinati/guide/services.php");
    }
    

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Requests</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include '../includes/navbar.php' ?>

    <div class="container ">
        <h2 dir="rtl">تعديل الحزمة</h2>
        <hr>
        <?php include '../includes/update-package-form.php' ?>


    </div>


    <script>


const inputImg = document.getElementById('photo-input')
const img = document.getElementById('photo-img')

function getImg(event){

     const file = event.target.files[0]; 
     let url = window.URL.createObjectURL(file);
     img.src = url
     console.log
}

inputImg?.addEventListener('change', getImg)

    </script>
    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>