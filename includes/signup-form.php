<div class="card" style="max-width: 65vw;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="../public/images/bg-login.jpg" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">

                <form class="row g-3" action="signup.php" method="POST">
                    <h4 class="mt-3 text-center">إنشاء حساب جديد</h4>
                                        
                    <?php 
                    if (strlen($error>0))
                    {
                        echo '
                            <div class="alert alert-danger" role="alert">'
                            .$error.'
                                    </div>';
                    }
                    ?>
                    <div class="col-12 col-md-6 mx-auto">
                        <input type="text" class="form-control border border-4" value="<?php if (isset($firstName)) echo $firstName  ?>"  name="first_name" placeholder="الاسم الأول">
                    </div>
                    <div class="col-12 col-md-6 mx-auto">
                        <input type="text" class="form-control border border-4" value="<?php if (isset($lastName)) echo $lastName  ?>" name="last_name" placeholder="الاسم الأخير">
                    </div>
                    <div class="col-12 col-md-8 mx-auto">
                        <input type="text" class="form-control border border-4" value="<?php if (isset($phone)) echo $phone  ?>" name="phone" placeholder="رقم الجوال">
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                        <select class="form-select border border-4" aria-label="Default select example"  name="gender">
                            <option selected>الجنس</option>
                            <option value="M">ذكر</option>
                            <option value="F">أنثى</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-8 mx-auto">
                        <input type="text" class="form-control border border-4" value="<?php if (isset($address)) echo $address  ?>"  name="address" placeholder="العنوان">
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                        <select class="form-select border border-4" aria-label="Default select example"  name="type" id="type-select">
                            <option selected>نوع الحساب</option>
                            <option value="user">مستخدم</option>
                            <option value="guide">مرشد سياحي</option>
                        </select>
                    </div>
                    
                    <div class="col-12 col-md-8 mx-auto">
                        <input type="email" class="form-control border border-4" name="email" value="<?php if (isset($email)) echo $email  ?>"  placeholder="البريد الالكتروني">
                    </div>
                    <div class="col-12 col-md-4 mx-auto">
                        <input type="number" class="form-control border border-4 d-none" id="input-experience" name="experience" placeholder="سنوات الخبرة">
                    </div>
                    <div class="col-12 col-md-9  mx-auto">
                        <input type="password" class="form-control border border-4" name="password" placeholder="كلمة المرور">
                    </div>
                    <div class="col-12 col-md-9  mx-auto">
                        <input type="password" class="form-control border border-4" name="c_password" placeholder="تأكيد كلمة المرور">
                    </div>

                    <div class="d-grid gap-2 col-6 mx-auto mt-2">
                        <button type="submit" class="btn btn-dark" name="submit">إنشاء حساب</button>
                        <p class="text-center"><a href="/madinati/auth/login.php" class="link-dark">لدي حساب مسبقا</a></p>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

