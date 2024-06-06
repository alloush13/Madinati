<div>

  <h3 class="text-center">طلبات إضافة المرشد السياحي</h3>
  <hr>
  <table class="table table-success table-striped" dir="rtl">
    <thead>
      <tr>
        <th scope="col">الاسم الأول</th>
        <th scope="col">الاسم الأخير</th>
        <th scope="col">البريد الالكتروني</th>
        <th scope="col">الجنس</th>
        <th scope="col">سنوات الخبرة</th>
        <th scope="col">رقم الهاتف</th>
        <th scope="col">العنوان</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($guides as $guide) {
        if ($guide['gender']=="M")$gender="ذكر";else $gender="أنثى";
        echo '
        <tr>
        <td>' . $guide['first_name'] . '</td>
        <td>' . $guide['last_name'] . '</td>
        <td>' . $guide['email'] . '</td>
        <td>' . $gender . '</td>
        <td>' . $guide['experience'] . '</td>
        <td>' . $guide['phone'] . '</td>
        <td>' . $guide['address'] . '</td>
        <td>
            <form class="d-inline-block"  action="/madinati/admin/dashboard/add-guide-requests.php" method="POST">
                <input type="hidden" name="id_tourist_guide" value="'.$guide["id_tourist_guide"].'" >
              <div class="d-flex justify-content-between" style="width: 120px;">
                    <button type="submit" name="submit-guide-request-accept" class="btn btn-dark">قبول</button>
                    <button type="submit" name="submit-guide-request-rejected" class="btn btn-danger ">رفض</button>
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