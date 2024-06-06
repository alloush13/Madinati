<?php
session_start();
include "../config/database.php";
include "../config/validate.php";

$error = "";
$pageName = "login";
if (isset($_POST['submit'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password =$_POST['password'];
    $cPassword = $_POST['c_password'];
    $experience = $_POST['experience'];
    $type = $_POST['type'];
    $_SESSION['id'] = "";
    
    $validate = validateSignup($_POST);
    if ($validate["err"]) {
        $error = $validate["msg"];
    } else {
        if ($type == "user") {
            if(checkUnique($conn,"users","email",$email)){
                $sql = "INSERT INTO users (first_name,last_name,email,password,phone,address,gender)
                VALUES('$firstName','$lastName','$email','$password','$phone','$address','$gender')";
            mysqli_query($conn, $sql);
            }else{
                $error = "البريد الالكتروني موجود مسبقا";
            }
           
        } else if ($type == "guide") {
            if(checkUnique($conn,"tourist_guides","email",$email)){
                $sql = "INSERT INTO tourist_guides (first_name,last_name,email,password,experience,phone,address,gender)
                VALUES('$firstName','$lastName','$email','$password','$experience','$phone','$address','$gender')";
        mysqli_query($conn, $sql);
            }else{
                $error = "البريد الالكتروني موجود مسبقا";
            }
            
        }

        if( !strlen($error>0))
        header("Location: http://localhost/madinati/index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../public/css/style.css" />

</head>

<body class="bg-body-secondary pt-7">
    <?php include '../includes/navbar.php' ?>
    <?php include '../includes/signup-form.php' ?>


    <script src="../public/js/bootstrap.bundle.min.js"></script>
    <script src="../public/js/script.js"></script>
    <script>
        var e = document.getElementById("type-select");
        var i = document.getElementById("input-experience");

        function onChange() {
            var value = e.value;
            if (value == 'guide') {
                i.classList.remove('d-none');
                i.classList.add('d-block');
            } else {
                i.classList.remove('d-block');
                i.classList.add('d-none');
            }

        };

        e.onchange = onChange;
    </script>
</body>

</html>