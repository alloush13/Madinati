<?php

session_start();
include "./config/database.php";
$pageName = "connect-us";
if (!isset($_SESSION['id']))
    $_SESSION['id'] = "";
if (!isset($_SESSION['role']))
    $_SESSION['role'] = "guest";
if($_SESSION['role'] == "admin" ||$_SESSION['role'] == "guide")
    header("Location: http://localhost/madinati/index.php"); 
if(isset($_POST['submit']))
{
    $id_user = $_SESSION['id'];
    $feedback_text =  $_POST['feedback_text'];
    $sql = "INSERT INTO feedbacks (id_user,feedback_text)
    VALUES('$id_user','$feedback_text')";
    mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/index.php");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connect-Us</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/css/style.css" />

</head>

<body class="bg-light bg-gradient">
    <?php include './includes/navbar.php' ?>


    <div class="container pt-5">
        <h3 class="mt-5 text-center">تواصل معنا</h3>

        <div class="row mt-3 justify-content-center">
            <div class="col-12 col-md-4 mt-5">
                <div class="card" style="max-width: 530px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./public/images/email-icon.png" style="height: 100px;" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Email</h5>
                                <p class="card-text">www.madinati.com</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-5">
                <div class="card" style="max-width: 530px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./public/images/phone-icon.png" style="height: 100px;" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Phone</h5>
                                <p class="card-text">+966 999999999</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-5">
                <div class="card" style="max-width: 530px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="./public/images/facebook-icon.png" style="height: 100px;" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Facebook</h5>
                                <p class="card-text">Madinati</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
                if($_SESSION['role'] == "user" )
                    echo '
                
        <form class="m-auto" action="/madinati/connect-us.php" method="POST" style="max-width: 50vw;">
        <h4 class="mt-3 text-center">هل لديك اقتراحات ؟</h4>

        <div class="form-floating  mt-4 border border-4  rounded">
            <textarea class="form-control" name="feedback_text"placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100p1x"></textarea>
            <label for="floatingTextarea2">Feedback</label>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-2">
        <button type="submit" class="btn btn-dark" name="submit">إرسال </button>
        </div>
    </form>


                        '
                ?>

    </div>

    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>
