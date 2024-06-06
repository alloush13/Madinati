<?php
if (empty($servicesRejected)) {
    echo
    '
<div class="alert alert-primary text-center" role="alert" dir="rtl">
<h4 class="alert-heading"> لا يوجد خدمات بانتظار قبولها</h4>
</div>
';
} else {
    $id2 = 0;
    foreach ($servicesRejected as $service) {

        echo '
        <div class="row">
        <div class="card request-card mb-3 col-8 p-0" style="max-width: 740px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../' . $service['photo_url'] . '" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">' . $service['name'] . '</h5>
                        <p class="card-text details overflow-y-auto">' . $service['details'] . '</p>
                        <div class="row">
                            <div class="col-8">
                                <p class="card-text"><small class="text-body-secondary"> تاريخ الطلب ' . $service['date'] . '</small></p>
                                <p class="card-text"><small class="text-body-secondary"> سعر الخدمة '. $service['price'].'</small></p>
                            </div>

                        </div>
                        
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
        
        ';
    }
}
