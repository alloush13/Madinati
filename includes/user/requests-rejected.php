<?php

if (empty($requestsRejected)){
    echo
    '
<div class="alert alert-primary text-center" role="alert" dir="rtl">
<h4 class="alert-heading"> لا يوجد طلبات حاليا</h4>
</div>
';
}else{

    $id2 = 0;
    foreach ($requestsRejected as $request) {
    
        echo '
                        <div class="row">
                        <div class="card request-card mb-3 col-8 p-0" style="max-width: 740px;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="../' . $request['photo_url'] . '" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">' . $request['name'] . '</h5>
                                        <p class="card-text details overflow-y-auto">' . $request['details'] . '</p>
                                        <p class="card-text"><small class="text-body-secondary"> تاريخ الطلب ' . $request['date'] . '</small></p>
                                        <p class="card-text"><small class="text-body-secondary"> سعر الطلب ' . $request['price'] . '</small></p>
    
    
    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        ';
    }
    
}