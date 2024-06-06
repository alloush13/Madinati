<?php

session_start();
$pageName = "requests";
include "../config/database.php";
include "../includes/check-login.php";
isRole("guide");

    

$id_guide = $_SESSION['id'];
$sql = "select * ,(select photo_url from scheduled_packages SP where SP.id_scheduled_package = UR.id_scheduled_package)as photo_url from user_requests UR 
            where UR.id_scheduled_package in (select SP.id_scheduled_package from scheduled_packages SP where SP.id_tourist_guide ='$id_guide' )
            and status = 'WaitingAccept'";
$result = mysqli_query($conn, $sql);
$requestsWaitingAccept = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


if(isset($_POST['submit-accepted']))
{
    $id_user_request = $_POST['id_user_request'];
    $sql = "update user_requests set status = 'Accepted' where id_user_request = '$id_user_request'";
    mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/guide/requests.php");
}
if(isset($_POST['submit-reject']))
{

    $id_user_request = $_POST['id_user_request'];
    $sql = "update user_requests set status = 'rejected' where id_user_request = '$id_user_request'";
     mysqli_query($conn,$sql);

    header("Location: http://localhost/madinati/guide/requests.php");

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


    <?php
     if (empty($requestsWaitingAccept)){
        echo
        '
    <div class="alert alert-primary text-center" role="alert" dir="rtl">
    <h4 class="alert-heading"> لا يوجد طلبات حاليا</h4>
    </div>
    ';
    }else{
        $id=0;
        foreach ($requestsWaitingAccept as $request) {
            $id++;
            echo'
            <div class="row" dir="rtl">
            <div class="card request-card mb-3 col-8 p-0" style="max-width: 740px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../'.$request['photo_url'].'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'. $request['name'].'</h5>
                            <p class="card-text details overflow-y-auto">'. $request['details'].'</p>
                            <div class="d-inline-block">
                                <p class="card-text"><small class="text-body-secondary"> تاريخ الطلب '. $request['date'].'</small></p>
                                <p class="card-text"><small class="text-body-secondary"> سعر الطلب '. $request['price'].'</small></p>
                            </div>
                            <div class="d-inline-block">
                            <form class="m-auto" action="requests.php" method="POST" style="max-width: 50vw;">
                                <input type="hidden" name="id_user_request" value="'.$request["id_user_request"].'" >
                                <div class="d-flex flex-row  mx-auto">
                                    <button type="submit" class="btn btn-dark mx-2" name="submit-accepted">قبول </button>
                                    <button type="submit" class="btn btn-dark xm-2" name="submit-reject">رفض </button>
                                </div>

                            </form>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            ';
        }
    }
               
                ?>

    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
</body>

</html>