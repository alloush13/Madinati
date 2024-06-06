<?php

?>

<nav class="navbar navbar-expand-lg bg-body-tertiary shadow-lg fixed-top" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/madinati">Madinati</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav" dir="rtl">
                <a class="nav-link <?php if ($pageName == 'home') echo "active" ?> " aria-current="page" href="/madinati">الصفحة الرئيسية</a>
                <?php
                if ($_SESSION['role'] == "guest") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'login') echo "active";
                    echo '" href="/madinati/auth/login.php">تسجيل الدخول</a>';
                }

                ?>
                <?php
                if ($_SESSION['role'] != "guest")
                    echo '<a class="nav-link" href="/madinati/auth/logout.php">تسجيل الخروج</a>'
                ?>
                <?php
                if ($_SESSION['role'] == "admin") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'dashboard') echo "active";
                    echo '" href="/madinati/admin/dashboard/add-guide-requests.php">لوحة التحكم</a>';
                }

                ?>

                <?php
                if ($_SESSION['role'] == "guide") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'add-package') echo "active";
                    echo '" href="/madinati/guide/create-package.php">إضافة حزمة</a>';
                }

                ?>


                <?php
                if ($_SESSION['role'] == "user" || $_SESSION['role'] == "guide") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'requests') echo "active";
                    echo '" href="/madinati/' . $_SESSION['role'] . '/requests.php">الطلبات</a>';
                }

                ?>

                <?php
                if ($_SESSION['role'] == "guide") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'services') echo "active";
                    echo '" href="/madinati/guide/services.php">خدماتي</a>';
                }

                ?>
                <?php
                if ($_SESSION['role'] == "user") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'services') echo "active";
                    echo '" href="/madinati/services.php">الخدمات</a>';
                }

                ?>
                <?php
                if ($_SESSION['role'] == "user" || $_SESSION['role'] == "guest") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'about-us') echo "active";
                    echo '" href="/madinati/about-us.php">من نحن</a>';
                }

                ?>
                <?php
                if ($_SESSION['role'] == "user" || $_SESSION['role'] == "guest") {
                    echo '<a class="nav-link ';
                    if ($pageName == 'connect-us') echo "active";
                    echo '" href="/madinati/connect-us.php">تواصل معنا</a>';
                }

                ?>


            </div>
        </div>
    </div>
</nav>