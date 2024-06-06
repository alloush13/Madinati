<?php

session_start();
$pageName = "dashboard";
include "../../includes/check-login.php";
include "../../config/database.php";

isRole("admin");
$sql = 'select * from tourist_guides where status = "NotActivated"';
$result = mysqli_query($conn, $sql);
$guides = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);


if (isset($_POST['submit-guide-request-accept'])) {
    $id_tourist_guide = $_POST['id_tourist_guide'];

    $sql2 = "update tourist_guides set status = 'Activated' where id_tourist_guide = $id_tourist_guide";
    mysqli_query($conn, $sql2);

    header("Location: http://localhost/madinati/admin/dashboard/add-guide-requests.php");
}
if (isset($_POST['submit-guide-request-rejected'])) {
    $id_tourist_guide = $_POST['id_tourist_guide'];

    $sql2 = "update tourist_guides set status = 'Blocked' where id_tourist_guide = $id_tourist_guide";
    mysqli_query($conn, $sql2);

    header("Location: http://localhost/madinati/admin/dashboard/add-guide-requests.php");
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
                if (empty($guides))
                {
                    echo
                    '
                <div class="alert alert-primary text-center" role="alert" dir="rtl">
                    <h4 class="alert-heading"> لا يوجد طلبات حاليا</h4>
                </div>
                ';
                }else
                {
                    include "../../includes/guides-requests-show.php";
                }
                    

                ?>
            
                
            </div>
    </div>



    <script src="../../public/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/script.js"></script>
</body>

</html>