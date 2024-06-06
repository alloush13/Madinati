<?php

session_start();

include "./config/database.php";
include "./includes/check-login.php";
isRole("user");
$pageName = "services";

if (isset($_GET['id'])) {
    $packageId = $_GET['id'];
    if ($packageId > 0) {
        $sql = "select * from scheduled_packages  where id_scheduled_package =$packageId";
        $result = mysqli_query($conn, $sql);
        $package = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);

        $id_tourist_guide=$package[0]['id_tourist_guide'];
        $sql = "select * from tourist_guides where id_tourist_guide = $id_tourist_guide";
        $result = mysqli_query($conn, $sql);
        $guide = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
         
        $sql = "select  review_text ,(select CONCAT(U.first_name,' ',U.last_name) from users U where U.id_user =R.id_user) as user_name
         from reviews R where id_scheduled_package =$packageId";
         $result = mysqli_query($conn, $sql);
        $reviews = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_free_result($result);
    }



    

    
}

if(isset($_POST['submit-mail'])){
 
  $to      = $_POST['to'];
  $subject = $_POST['subject'];
  $message ='
  From :  '.$_SESSION['email'] .'
  '. $_POST['message_text'];

  $headers = array(
    'From' => $_SESSION['email']
);
      mail($to, $subject, $message, $headers);
      header("Location: http://localhost/madinati/package.php?id=".$_POST['package-id'] );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Details</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/css/style.css" />

</head>

<body class="bg-light bg-gradient pt-5">
    <?php include './includes/navbar.php' ?>
    <?php include './includes/send-mail-form.php' ?>

    <?php
    if(isset($package))
    echo '
    <div class="card my-5" style="max-width: 90%;">
    <div class="row g-0">
      <div class="col-md-4">
        <img  src="./' . $package[0]["photo_url"] . '" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8" dir="rtl">
        <div class="card-body">
          <h5 class="card-title">' . $package[0]["name"] . '</h5>
          <p class="card-text">' . $package[0]["details"] . '</p>
          <p class="card-text d-inline "><small class="text-body-secondary"> السعر : ' . $package[0]["price"] . '</small></p>
          
        <button type="button" class="btn btn-outline-dark d-inline  mx-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              تواصل مع المرشد
        </button>
        </div>
      </div>
    </div>
  </div>


';


    ?>

    <div class="container ">
        <h3 dir="rtl">تقييمات الحزمة</h3>
        <hr>
        <?php
    if(isset($package))
    foreach ($reviews as $review) {
        echo '
        <div class="card border-dark mb-3" dir="rtl" style="max-width: 90%;">
        <div class="card-header">'.$review["user_name"].'</div>
        <div class="card-body">
          <p class="card-text">'.$review["review_text"].'</p>
        </div>
      </div>
        ';
        
        
    }
    ?>

    </div>
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>