<?php
if (empty($servicesWaitingAccept)) {
    echo
    '
<div class="alert alert-primary text-center" role="alert" dir="rtl">
<h4 class="alert-heading"> لا يوجد خدمات بانتظار قبولها</h4>
</div>
';
} else {
    $id2 = 0;
    foreach ($servicesWaitingAccept as $service) {

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
                            <div class="col-4">
                            <form class="m-auto" action="services.php" method="POST" style="max-width: 50vw;">
                                <input type="hidden" name="id_guide_request" value="'.$service["id_guide_request"].'" >
                                <div class="d-flex flex-row  mx-auto">
                                
                                    <button type="submit" class="btn btn-dark xm-2" name="submit-delete-request">حذف الطلب</button>
                                </div>

                            </form>
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
