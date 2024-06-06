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
            <div class="card-body shadow-lg">

                <form class="row g-3" action="/madinati/guide/update-services.php" method="POST" enctype="multipart/form-data" dir="rtl">
                    <h4 class="mt-3 text-center"> تعديل الحزمة</h4>
                    <input type="hidden" name="id_scheduled_package" value="<?php if ($id_scheduled_package != null) echo $id_scheduled_package  ?>">
                    <div class="row col-md-8">
                    
                    <div class="col-12  mx-auto">
                    <label for="name" class="form-label">اسم الحزمة</label>
                        <input type="text" id="name" class="form-control border border-5" value="<?php if (isset($name)) echo $name  ?>" name="name" placeholder="اسم الحزمة">
                    </div>
                    <div class="col-12  mx-auto">
                    <label for="price" class="form-label">سعر الحزمة</label>
                        <input type="number" id="price" class="form-control border border-5"value="<?php if (isset($price)) echo $price  ?>" name="price" placeholder="سعر الحزمة">
                    </div>
                    
                    <div class="col-12  mx-auto">
                    <label for="details" class="form-label">تفاصيل الحزمة</label>
                        <input type="text" id="details" class="form-control border border-5" value="<?php if (isset($details)) echo $details  ?>" name="details" placeholder="الوصف">
                    </div>
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                    <label for="photo-input" class="form-label">
                        <img src="../<?php  if ($photoUrl != null) echo $photoUrl  ?>" id="photo-img" class="img-fluid rounded-start" alt="...">
                    </label>
                    <input type="hidden" name="old_photo_url" value="<?php if ($photoUrl != null) echo $photoUrl  ?>">
                    <input class="form-control  border border-5  d-none" id="photo-input" value="<?php if ($photoUrl != null) echo $photoUrl  ?>" type="file" name="photo" placeholder="صورة الحزمة">
                    </div>
                    

                    <div class="d-grid gap-2 col-6 mx-auto mt-2">
                        <button type="submit" class="btn btn-dark" name="submit-update">طلب تعديل الحزمة</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>