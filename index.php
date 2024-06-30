<?php
require './partials/header.php';
?>
<div class="container-fluid">

  <div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-4" style="max-height: 100vh; overflow-y: auto;">

      <div class="row">

        <div class="col-lg-4">

          <div class="card shadow-sm rounded-0 p-3">
            <div class="card-body">

              <h1>10</h1>
              <p class="mb-0"><i class="fa fa-calendar-check"></i> Appointments</p>
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card shadow-sm rounded-0 p-3">
            <div class="card-body">

              <h1>2</h1>
              <p class="mb-0"><i class="fa fa-check-circle"></i> Current Appointments</p>
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card shadow-sm rounded-0 p-3">
            <div class="card-body">

              <h1>10</h1>
              <p class="mb-0"><i class="fa fa-folder-open"></i> Appointment Records</p>
            </div>
          </div>

        </div>

      </div>

    </div>

  </div>

</div>
<?php
require './partials/footer.php';
