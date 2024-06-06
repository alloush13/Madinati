<div>

    <h3 class="text-center">طلبات إضافة الحزم</h3>
    <hr>
    <table class="table table-success table-striped" dir="rtl">
        <thead>
            <tr>

                <th scope="col">اسم المرشد السياحي</th>
                <th scope="col">اسم الطلب</th>
                <th scope="col">السعر</th>
                <th scope="col">تفاصيل الطلب</th>
                <th scope="col">تاريخ الطلب</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($guideRequests as $guideRequest) {
                echo '
        <tr>
            <td>' . $guideRequest['guide_name'] . '</td>
            <td>' . $guideRequest['name'] . '</td>
            <td>' . $guideRequest['price'] . '</td>
            <td>' . $guideRequest['details'] . '</td>
            <td>' . $guideRequest['date'] . '</td>
            <td>
            <form class="d-inline-block"  action="add-package-requests.php" method="POST">
                <input type="hidden" name="id_guide_request" value="'.$guideRequest["id_guide_request"].'" >
                <div class="d-flex justify-content-between" style="width: 120px;">
                    <button type="submit" name="submit-accept" class="btn btn-dark">قبول</button>
                    <button type="submit" name="submit-rejected" class="btn btn-danger ">رفض</button>
                </div>
              
            </form>
            </td>
        </tr>
        ';
            }

            ?>

        </tbody>
    </table>

</div>