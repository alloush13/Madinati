<div>

  <h3 class="text-center">اقتراحات المستخدمين</h3>
  <hr>
  <table class="table table-success table-striped" dir="rtl">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">اسم المستخدم</th>
        <th scope="col">الاقتراح</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($feedbacks as $feedback) {
        echo '
        <tr>
        <th scope="row">' . $feedback['id_feedback'] . '</th>
        <td>' . $feedback['user_name'] . '</td>
        <td>' . $feedback['feedback_text'] . '</td>
      </tr>
        ';
      }

      ?>

    </tbody>
  </table>
  <div class="text-center my-2">
        <input type="button" class="btn btn-dark px-5" value="print" onclick="PrintDiv();" />
        <form class="d-inline-block"  action="feedbacks.php" method="POST">
            <button type="submit" name="submit-delete" class="btn btn-dark">حذف جميع التقتراحات</button>
        </form>
  </div>
  
</div>