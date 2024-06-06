
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">تواصل مع المرشد</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="m-auto" action="package.php" method="POST" style="max-width: 50vw;">
      <input type="hidden" value="<?php  if(isset($guide)) echo $guide[0]["email"] ?>" name="to">
      <input type="hidden" value="<?php  if(isset($user)) echo $user[0]["email"] ?>" name="from">
      <input type="hidden" value="<?php  if(isset($packageId)) echo $packageId ?>" name="package-id">
        <h4 class="mt-3 text-center"> إرسال بريد الكتروني</h4>
        <div class="col-12 col-md-12 mx-auto">
                        <input type="text" class="form-control border border-5" name="subject" placeholder="Subject">
                    </div>
        <div class="form-floating  mt-4 border border-4  rounded">
            <textarea class="form-control" name="message_text"placeholder="Leave a Message here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Message</label>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto mt-2">
        <button type="submit" class="btn btn-dark" name="submit-mail">إرسال </button>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">رجوع</button>
      </div>
    </div>
  </div>
</div>