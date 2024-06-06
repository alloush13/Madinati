<?php

session_start();
$pageName = "dashboard";
include "../../includes/check-login.php";
include "../../config/database.php";

isRole("admin");
$sql = 'select id_guide_request,name,price,details,date,status, (select concat(first_name," ",last_name)from tourist_guides T where T.id_tourist_guide = R.id_tourist_guide ) as guide_name from tourist_guide_requests R where R.status ="WaitingAccept"';
$result = mysqli_query($conn, $sql);
$guideRequests = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

if (isset($_POST['submit-accept'])) {
    $id_guide_request = $_POST['id_guide_request'];

    $sql = "update tourist_guide_requests set status = 'accepted' where id_guide_request = $id_guide_request";
    mysqli_query($conn, $sql);
    $sql = "select * from tourist_guide_requests  where id_guide_request = $id_guide_request";
    $result = mysqli_query($conn, $sql);
    $guideRequest = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_free_result($result);

    $id_tourist_guide = $guideRequest[0]['id_tourist_guide'];
    $name = $guideRequest[0]['name'];
    $price = $guideRequest[0]['price'];
    $details = $guideRequest[0]['details'];
    $photo_url = $guideRequest[0]['photo_url'];

    $sql = "insert into scheduled_packages (id_tourist_guide,name,price,details,photo_url)
            values('$id_tourist_guide','$name','$price','$details','$photo_url')";
    mysqli_query($conn, $sql);
    header("Location: http://localhost/madinati/admin/dashboard/add-package-requests.php");
}
if (isset($_POST['submit-rejected'])) {
    $id_guide_request = $_POST['id_guide_request'];

    $sql = "update tourist_guide_requests set status = 'rejected' where id_guide_request = $id_guide_request";
    mysqli_query($conn, $sql);
    header("Location: http://localhost/madinati/admin/dashboard/add-package-requests.php");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../public/css/style.css" />

</head>

<body class="pt-7">
    <?php include '../../includes/navbar.php' ?>
    <div class="container-fluid ">
        <h2 dir="rtl">لوحة التحكم</h2>
        <hr>
        <ul class="nav nav-underline" dir="rtl">
            <li class="nav-item">
                <a class="btn btn-outline-dark mx-2" aria-current="page" href="/madinati/admin/dashboard/add-guide-requests.php">طلبات إضافة المرشد السياحي</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-dark mx-2" href="/madinati/admin/dashboard/add-package-requests.php">طلبات إضافة الحزم </a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-dark mx-2" href="/madinati/admin/dashboard/feedbacks.php">الاقتراحات</a>
            </li>

        </ul>


        <div class="my-2">
            <?php
            if (empty($guideRequests)) {
                echo
                '
                <div class="alert alert-primary text-center" role="alert" dir="rtl">
                    <h4 class="alert-heading"> لا يوجد طلبات حاليا</h4>
                </div>
                ';
            } else {
                include "../../includes/add-package-requests-show.php";
            }
            ?>
        </div>
    </div>



    <script src="../../public/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/script.js"></script>
</body>

</html>