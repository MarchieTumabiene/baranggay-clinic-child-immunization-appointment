<?php
require './partials/header.php';
$today = date('Y-m-d');


require 'function/save-settings.php';

?>
<div class="container-fluid">

  <div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
      <?php require './partials/navbar.php' ?>


      <div class="p-4">
        <form method="POST" class="card" enctype="multipart/form-data">
            <div class="card-body">
                <h5>Barangay BHW & Nurse</h5>
                <hr>

                <label for="">BHW</label>
                <input type="text" name="bhw" class="form-control my-2" value="<?= $settings['bhw'] ?? '' ?>" required>

                <label for="">Nurse</label>
                <input type="text" name="nurse" class="form-control my-2" value="<?= $settings['nurse'] ?? '' ?>" required>

                <label for="">Nurse Signature</label>
                <input type="file" name="nurse_signature" class="form-control my-2">

                <div class="row">
                    <div class="col-lg-4">
                        <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?? '' ?>" alt="" class="w-100 my-3">
                    </div>
                </div>
                
                <button type="submit" name="save" class="btn btn-primary">Save</button>
            </div>
        </form>
      </div>

      <footer class="py-3 text-center">
          <p class="text-secondary">&copy; Barangay Immunization 2024</p>
      </footer>

    </div>

  </div>

</div>
<?php
require './partials/footer.php';
