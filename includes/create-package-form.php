<?php
    if (strlen($error > 0)) {
        echo '
            <div class="text-center">
                <div class="alert alert-danger w-50 m-auto my-2" role="alert">'
                . $error . '
                </div>
            </div>';
          }
?>
<div class="card" style="max-width: 60vw;">
    <div class="row g-0">
        <div class="col-12">
            <img src="../public/images/clanek_003.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-12">
            <div class="card-body shadow-lg">

                <form class="row g-3" action="/madinati/guide/create-package.php" method="POST" enctype="multipart/form-data">
                    <h4 class="mt-3 text-center">إنشاء حزمة جديد</h4>

                    <div class="col-12 col-md-4 mx-auto">
                        <input type="text" class="form-control border border-5" value="<?php if (isset($name)) echo $name  ?>" name="name" placeholder="اسم الحزمة">
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                        <input type="number" class="form-control border border-5"value="<?php if (isset($price)) echo $price  ?>" name="price" placeholder="سعر الحزمة">
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                    <input class="form-control  border border-5" value="<?php if ($photo != null) echo $photo  ?>" type="file" name="photo" placeholder="صورة الحزمة">
                    </div>
                    <div class="col-12  mx-auto">
                        <input type="text" class="form-control border border-5" value="<?php if (isset($details)) echo $details  ?>" name="details" placeholder="الوصف">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto mt-2">
                        <button type="submit" class="btn btn-dark" name="submit">طلب إضافة الحزمة</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>