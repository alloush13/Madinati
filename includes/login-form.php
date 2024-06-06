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
    <div class="col-lg-4">
      <img src="../public/images/bg-login.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-lg-8">
      <div class="card-body">

        <form class="row g-3" action=<?php echo $formAction ?> method="POST">
          <h4 class="mt-3 text-center">
            <?php echo $title ?>
          </h4>

          <div class="d-none d-xl-block" style="height: 50px;"></div>
          <div class="col-12 col-md-9 mx-auto">
            <input type="email" class="form-control border border-4" name="email" placeholder="البريد الالكتروني">
          </div>
          <div class="col-12 col-md-9  mx-auto">
            <input type="password" class="form-control border border-4" name="password" placeholder="كلمة المرور">
          </div>
          <div class="d-grid gap-2 col-6 mx-auto">
          <?php
          if ($accountType != "admin")
            echo '
                  
                  <div class="col-12  mx-auto">
                    <select class="form-select border border-4" aria-label="Default select example" name="type">
                      <option selected>نوع الحساب</option>
                      <option value="user">مستخدم</option>
                      <option value="guide">مرشد سياحي</option>
                    </select>
                  </div>
                  '

          ?>


          <button type="submit" class="btn btn-dark" name="submit">تسجيل الدخول</button>

          <?php
          if ($accountType != "admin")
            echo '
                <p class="text-center"><a href="/madinati/auth/signup.php" class="link-dark">إنشاء حساب جديد</a></p>
                <p class="text-center"><a href="/madinati/auth/admin-login.php" class="link-dark">تسجيل دخول المدير</a></p>
                '
          ?>
          
      </div>

      </form>

    </div>
  </div>
</div>
</div>