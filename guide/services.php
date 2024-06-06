<?php

session_start();
include "../config/database.php";
include "../includes/check-login.php";
$pageName = "services";

isRole("guide");


$id_guide = $_SESSION['id'];
$sql = "  select * from tourist_guide_requests where id_tourist_guide = '$id_guide' and status = 'WaitingAccept'";
$result = mysqli_query($conn, $sql);
$servicesWaitingAccept = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$sql = "select * from scheduled_packages where id_tourist_guide = '$id_guide'";
$result = mysqli_query($conn, $sql);
$servicesAccepted = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$sql = "  select * from tourist_guide_requests where id_tourist_guide = '$id_guide' and status = 'rejected'";
$result = mysqli_query($conn, $sql);
$servicesRejected = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

if(isset($_POST['submit-delete']))
{

    $id_scheduled_package = $_POST['id_scheduled_package'];
    
    
    $sql = "delete from scheduled_packages where id_scheduled_package = '$id_scheduled_package'";
     mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/guide/services.php?section=accepted");

}
if(isset($_POST['submit-delete-request']))
{

    $id_guide_request = $_POST['id_guide_request'];
    
    
    $sql = "delete from tourist_guide_requests where id_guide_request = '$id_guide_request'";
     mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/guide/services.php");

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Services</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include '../includes/navbar.php' ?>

    <div class="container ">
        <h2 dir="rtl">خدماتي</h2>
        <hr>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class=" btn btn-dark mx-2 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"> المقبولة</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-dark mx-2" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">بانتظار القبول</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-dark mx-2" id="pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">المرفوضة</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent" dir="rtl">
            <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                <?php include '../includes/guide/services-accepted.php' ?> 
            </div>

            <div class="tab-pane fade   " id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                <?php include '../includes/guide/services-waiting-accept.php' ?> 
            </div>
            <div class="tab-pane fade   " id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab" tabindex="0">
                <?php include '../includes/guide/services-rejected.php' ?> 
            </div>

        </div>
    </div>



    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>