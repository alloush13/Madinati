<?php

session_start();
include "./config/database.php";
include "./includes/check-login.php";
isRole("user");
$pageName = "services";
$funds =0;
$sql = "select SP.*,CONCAT(TG.first_name,' ',TG.last_name) as guide_name,TG.email,TG.phone   from scheduled_packages SP inner join tourist_guides TG on(SP.id_tourist_guide = TG.id_tourist_guide)";
$result = mysqli_query($conn, $sql);
$packages = mysqli_fetch_all($result, MYSQLI_ASSOC);


mysqli_free_result($result);


if(isset($_POST['submit']))
{
    $id_user = $_SESSION['id'];
    $id_scheduled_package = $_POST['id_scheduled_package'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $details =  $_POST['details'];
    $date =date("Y-m-d H:i:s");
    $status = "WaitingAccept";
    
    $sql = "INSERT INTO user_requests (id_user,id_scheduled_package,name,price,details,date,status)
    VALUES('$id_user','$id_scheduled_package','$name','$price','$details','$date','$status')";
     mysqli_query($conn,$sql);

    
    header("Location: http://localhost/madinati/services.php");

    
}
if(isset($_POST['submit-msg']))
{ 
  header("Location: http://localhost/madinati/services.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Package</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include './includes/navbar.php' ?>

    <div class="container">

    
    <div class="row d-flex justify-content-center">
        
    <?php
    $id=0;
    foreach ($packages as $package) {
    $id++;
        echo 
        '
        <div class="col-4 mb-3">
        <div class="card service-card "  dir="rtl">
        <div class="service-image">
            <img src="./'.$package["photo_url"].'" class="card-img-top" alt="...">
        </div>

        <div class="card-body">
            <h5 class="card-title">'.$package["name"].'</h5>
            <p class="card-text  ">'.$package["details"].'</p>
        </div>
        <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex justify-content-between">
            <p class="my-auto"> السعر : '.$package["price"].'</p>
          <form class="d-inline d-flex justify-content-end"  action="/madinati/services.php" method="POST">
        <input type="hidden" name="id_scheduled_package" value="'.$package["id_scheduled_package"].'" >
        <input type="hidden" name="name" value="'.$package["name"].'" >
        <input type="hidden" name="price" value="'.$package["price"].'" >
        <input type="hidden" name="details" value="'.$package["details"].'" >
          <button type="submit" name="submit" class=" btn btn-outline-success ">شراء</button>
        </form>
            </li>
            <li class="list-group-item d-flex justify-content-start">
            <p class=" fw-bold mx-2 my-0">  صاحب الحزمة  :  </p>' .$package["guide_name"]. '
            </li>
            <li class="list-group-item d-flex justify-content-start">
            <p class=" fw-bold mx-2 my-0">  رقم التواصل  : </p>' .$package["phone"]. '
            </li>

            <a href="/madinati/package.php?id='.$package["id_scheduled_package"].'" class="list-group-item text-center btn btn-outline-success">عرض تفاصيل الحزمة</a>
        </ul>

    </div>
    </div>
   
    



    <div class="modal fade" id="reviews'.$id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">تقييمات الحزمة</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        
        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">رجوع</button>
        </div>
      </div>
    </div>
   </div>





    
 <div class="modal fade" id="communication'.$id.'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
   <div class="modal-content">
     <div class="modal-header">
       <h1 class="modal-title fs-5" id="staticBackdropLabel">إرسال بريد</h1>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
     </div>
     <div class="modal-body">
     <form class="m-auto" action="/madinati/services.php" method="POST" style="max-width: 50vw;">
       <h4 class="mt-3 text-center">إنشاء رسالة للمرشد السياحي</h4>

       <div class="form-floating  mt-4 border border-2  rounded">
           <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea3" style="height: 100px"></textarea>
           <label for="floatingTextarea3">Message</label>
       </div>
       <div class="d-grid gap-2 col-6 mx-auto mt-2">
       <button type="submit" class="btn btn-dark" name="submit-msg">إرسال </button>
       </div>
   </form>
     </div>
     <div class="modal-footer">
       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
     </div>
   </div>
 </div>
</div>
        ';


    }
  
    ?>
 </div>
 </div>


    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>