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

              <?php 
                $get_appointments = $conn->query("SELECT * FROM appointments WHERE status = 1");
              ?>
              <h1><?= $get_appointments->num_rows ?></h1>
              <p class="mb-0"><i class="fa fa-calendar-check"></i> Appointments</p>
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card shadow-sm rounded-0 p-3">
            <div class="card-body">
              <?php 
                $get_records = $conn->query("SELECT * FROM immunization");
              ?>
              <h1><?= $get_records->num_rows ?></h1>
              <p class="mb-0"><i class="fa fa-check-circle"></i> Immunization Records</p>
            </div>
          </div>

        </div>

        <div class="col-lg-4">

          <div class="card shadow-sm rounded-0 p-3">
            <div class="card-body">
              <?php 
                $get_appoint_records = $conn->query("SELECT * FROM appointments");
              ?>  
              <h1><?= $get_appoint_records->num_rows ?></h1>
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
