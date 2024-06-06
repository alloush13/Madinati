<?php

session_start();
include "../config/database.php";
include "../includes/check-login.php";
$pageName = "requests";

isRole("user");

$id_user = $_SESSION['id'];
$sql = "select * ,(select photo_url from scheduled_packages SP where SP.id_scheduled_package = UR.id_scheduled_package)as photo_url
         from user_requests UR where id_user = '$id_user' and status = 'WaitingAccept'";
$result = mysqli_query($conn, $sql);
$requestsWaitingAccept = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$sql = "select * ,(select photo_url from scheduled_packages SP where SP.id_scheduled_package = UR.id_scheduled_package)as photo_url
         from user_requests UR where id_user = '$id_user' and status = 'rejected'";
$result = mysqli_query($conn, $sql);
$requestsRejected = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

$sql = "select * ,(select photo_url from scheduled_packages SP where SP.id_scheduled_package = UR.id_scheduled_package)as photo_url
         from user_requests UR where id_user = '$id_user' and status = 'Accepted'";
$result = mysqli_query($conn, $sql);
$requestsAccepted = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);

if(isset($_POST['submit']))
{

    $id_scheduled_package = $_POST['id_scheduled_package'];
    
    $review_text = $_POST['review_text'];
    $sql = "INSERT INTO reviews (id_user,id_scheduled_package,review_text)
    VALUES('$id_user','$id_scheduled_package','$review_text')";
     mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/user/requests.php");

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
        <h2 dir="rtl">طلبات الحزم </h2>
        <hr>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class=" btn btn-dark mx-2 active" id="pills-accept-tab" data-bs-toggle="pill" data-bs-target="#pills-accept" type="button" role="tab" aria-controls="pills-accept" aria-selected="true"> المقبولة</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-dark mx-2" id="pills-waiting-tab" data-bs-toggle="pill" data-bs-target="#pills-waiting" type="button" role="tab" aria-controls="pills-waiting" aria-selected="false">بانتظار القبول</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="btn btn-dark mx-2" id="pills-rejected-tab" data-bs-toggle="pill" data-bs-target="#pills-rejected" type="button" role="tab" aria-controls="pills-rejected" aria-selected="false">المرفوضة</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent" dir="rtl">
            <div class="tab-pane fade show active" id="pills-accept" role="tabpanel" aria-labelledby="pills-accept-tab" tabindex="0">
                <?php include '../includes/user/requests-accepted.php' ?>   
            </div>

            <!-- WaitingAccept -->

            <div class="tab-pane fade" id="pills-waiting" role="tabpanel" aria-labelledby="pills-waiting-tab" tabindex="0">   
                <?php include '../includes/user/requests-waiting-accept.php' ?> 
            </div>


            <!-- rejected -->
            <div class="tab-pane fade" id="pills-rejected" role="tabpanel" aria-labelledby="pills-rejected-tab" tabindex="0">
                <?php include '../includes/user/requests-rejected.php' ?> 
            </div>
            

        </div>
    </div>



    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>