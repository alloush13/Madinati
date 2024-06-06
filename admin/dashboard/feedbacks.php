<?php

session_start();
$pageName = "dashboard";
include "../../includes/check-login.php";
include "../../config/database.php";

isRole("admin");
$sql = 'select id_feedback,feedback_text, (select concat(first_name," ",last_name)from users U where U.id_user = F.id_user ) as user_name from feedbacks F ';
$result = mysqli_query($conn, $sql);
$feedbacks = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);


if (isset($_POST['submit-delete'])) {

    $sql = "delete from  feedbacks";
    mysqli_query($conn, $sql); 
    header("Location: http://localhost/madinati/admin/dashboard/feedbacks.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head >
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


        <div class="my-2" id="divToPrint">
        
            <?php
            if (empty($feedbacks)) {
                echo
                '
                <div class="alert alert-primary text-center" role="alert" dir="rtl">
                    <h4 class="alert-heading"> لا يوجد اقتراحات حاليا</h4>
                </div>
                ';
            } else {
                include "../../includes/feedback-show.php";
            }


            ?>
        </div>
    </div>

    

    <script src="../../public/js/bootstrap.bundle.min.js"></script>
    <script src="../../public/js/script.js"></script>
    
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=600,height=800');
       popupWin.document.open();
       popupWin.document.write(`
       <html>
        <body onload="window.print()">
        <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../public/css/style.css" />
             ${divToPrint.innerHTML}
            </body>
        </html>
        `);
        popupWin.document.close();
            }
 </script>
</body>

</html>

