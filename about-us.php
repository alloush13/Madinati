<?php

session_start();
$pageName = "about-us";

if (!isset($_SESSION['id']))
    $_SESSION['id'] = "";
if (!isset($_SESSION['role']))
    $_SESSION['role'] = "guest";
if($_SESSION['role'] == "admin" ||$_SESSION['role'] == "guide")
    header("Location: http://localhost/madinati/index.php"); 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About-Us</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./public/css/style.css" />

</head>

<body  class="bg-light bg-gradient pt-5">
    <?php include './includes/navbar.php' ?>

    <div class="card mt-4" style="max-width: 850px;">
        <div class="row g-0">
            <div class="col-lg-4 col-12">
                <img src="./public/images/bg.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-lg-8 col-12"dir="rtl">
                <div class="card-body">
                    <h5 class="card-title" >من نحن</h5>
                    <p class="card-text">
                    نحن شركة سياحية رائدة مقرّها في قلب المدينة المنورة، نفتخر بتقديم تجارب سياحية فريدة ومميزة لزوارنا الكرام من المملكة العربية السعودية. تتميز شركتنا بخبرة عميقة في مجال السياحة والسفر، حيث نقدم خدماتنا بشغف واهتمام يعكس الروح الضيافية الفريدة لهذه المدينة المقدسة.
                    </p>
                    <br>
                    <p class="card-text">
                    تتضمن خدماتنا باقة شاملة من الجولات السياحية والبرامج السفرية المصممة خصيصًا لتلبية احتياجات زوارنا الكرام من المملكة العربية السعودية. سواء كنت ترغب في استكشاف المعالم الدينية الرائعة أو التمتع بالثقافة المحلية الغنية، فإننا نقدم لك تجربة فريدة تتجاوز توقعاتك.
                    </p>
                    <br>
                    <p class="card-text">
                    إذا كنتم تبحثون عن شركة سياحية موثوقة لتنظيم رحلتكم إلى المدينة المنورة، فلا تترددوا في الاتصال بنا. دعونا نأخذكم في رحلة استكشافية لا تُنسى في أرض السلام والتأمل.
                    </p>


                </div>
            </div>
        </div>
    </div>

    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>