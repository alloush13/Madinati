<?php

if (empty($requestsAccepted)){
    echo
    '
<div class="alert alert-primary text-center" role="alert" dir="rtl">
<h4 class="alert-heading"> لا يوجد طلبات حاليا</h4>
</div>
';
}else{


    $id = 0;
    foreach ($requestsAccepted as $request) {
        $id++;
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
                        <div class="col-4" id="accordionExample">
                            <div class="accasaordion-item">
    
                                <button type="button" class="btn btn-outline-dark" data-bs-toggle="collapse" data-bs-target="#collapse' . $id . '" aria-expanded="true" aria-controls="collapseOne">إضافة تقييم</button>
    
                                <div id="collapse' . $id . '" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <form class="m-auto" action="requests.php" method="POST" style="max-width: 50vw;">
                                    <input type="hidden" name="id_scheduled_package" value="' . $request["id_scheduled_package"] . '" >
                                        <div class="form-floating  mt-4 border border-4  rounded">
                                            <textarea class="form-control" name="review_text" placeholder="Leave a comment here" id="floatingTextarea' . $id . '" style="height: 100px"></textarea>
                                            <label for="floatingTextarea' . $id . '">review</label>
                                        </div>
                                        <div class="d-grid gap-2 col-6 mx-auto mt-2">
                                            <button type="submit" class="btn btn-dark" name="submit">إضافة </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
    
                    </div>
                        
                        ';
    }
    

}