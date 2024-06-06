<?php
    if (empty($servicesAccepted)){
        echo
        '
    <div class="alert alert-primary text-center" role="alert" dir="rtl">
    <h4 class="alert-heading"> لا يوجد خدمات حاليا</h4>
    </div>
    ';
    }else{
        $id=0;
        foreach ($servicesAccepted as $service) {
            $id++;
            echo'
            <div class="row" dir="rtl">
            <div class="card request-card mb-3 col-8 p-0" style="max-width: 750px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="../'.$service['photo_url'].'" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">'. $service['name'].'</h5>
                            <p class="card-text details overflow-y-auto">'. $service['details'].'</p>
                            <div class="d-inline-block">
                               
                                <p class="card-text"><small class="text-body-secondary"> سعر الخدمة '. $service['price'].'</small></p>
                            </div>
                            <div class="d-inline-block">
                            <form class="m-auto" action="services.php" method="POST" style="max-width: 50vw;">
                                <input type="hidden" name="id_scheduled_package" value="'.$service["id_scheduled_package"].'" >
                                <div class="d-flex flex-row  mx-auto">
                                    <a href="/madinati/guide/update-services.php?id='.$service["id_scheduled_package"].'"class="btn btn-dark mx-2">تعديل</a>
                                    <button type="submit" class="btn btn-dark xm-2" name="submit-delete">حذف </button>
                                </div>

                            </form>
                            </div>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
            
            ';
        }
    }
    
                
                ?>