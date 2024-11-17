<?php
require './partials/header.php';
$today = date('Y-m-d');
$get_child = $conn->query("SELECT * FROM appointments");
$count_dont_show = [];
$count_show = [];
if ($get_child->num_rows > 0) {
  foreach ($get_child as $child) {
      $id = $child['id'];
      $check_child_immunization = $conn->query("SELECT i.*, a.c_fname, a.c_mname, a.c_lname FROM immunization i INNER JOIN appointments a ON i.appoint_id = a.id WHERE appoint_id = '$id' ");
      foreach ($check_child_immunization as $key => $value) {
          if ($value['newborn_screening'] == $today) {
              if ($value['stat_1'] == 1) {
                  $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['BCG'] == $today) {
              if ($value['stat_2'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['DRT'] == $today) {
              if ($value['stat_3'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['CRV'] == $today) {
              if ($value['stat_4'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['HEPATITIS_B'] == $today) {
              if ($value['stat_5'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['MEASLES'] == $today) {
              if ($value['stat_6'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['VITAMIN_A'] == $today) {
              if ($value['stat_7'] == 1) {
                $count_dont_show[] = 1;
              }else{
                $count_show[] = 1;
              }
          }

          if ($value['DEWORMING'] == $today) {
              if ($value['stat_9'] == 1) {
                $count_dont_show[] = 1; 
              }else{
                $count_show[] = 1;
              }
          }
      }
  }
}
?>
<div class="container-fluid">

  <div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
      <?php require './partials/navbar.php' ?>


      <div class="p-4">
        <div class="row g-3">
         
         
                <?php
                if($barangay == 'admin'){
                  $get_barangayAdmins = $conn->query("SELECT * FROM admin");
                  $adminsCount = 0;
                  foreach ($get_barangayAdmins as $key => $value) {
                    $adminCount++;
                  }

                  ?>
                   <div class="col-lg-4">

                    <div class="card shadow-sm rounded-0 p-3 h-100">
                      <div class="card-body">
                      <h1><?= $adminsCount ?></h1>
                        <p class="mb-0"><i class="fa fa-user"></i> Barangay Admins</p>
                      </div>
                    </div>

                  </div>
                  <?php 
                }
                ?>

                <?php
                if($barangay == 'admin'){
                  $get_barangayAdmins = $conn->query("SELECT COUNT(*) AS COUNT, barangay FROM appointments GROUP BY barangay");
                  $adminsCount = 0;
                  foreach ($get_barangayAdmins as $key => $value) {
                    ?>
                     <div class="col-lg-4">

                      <div class="card shadow-sm rounded-0 p-3 h-100">
                        <div class="card-body">
                        <h1><?= $value['COUNT'] ?></h1>
                          <p class="mb-0"><i class="fa fa-user"></i> <?= strtoupper($value['barangay']) ?></p>
                        </div>
                      </div>

                      </div>
                    <?php 
                  }
                }
                ?>

<!-- 
          <div class="col-lg-4">

            <div class="card shadow-sm rounded-0 p-3 h-100">
              <div class="card-body">

                <?php
                if($barangay == 'admin'){
                  $get_appointments = $conn->query("SELECT * FROM appointments WHERE status = 1");
                }else{
                  $get_appointments = $conn->query("SELECT * FROM appointments WHERE status = 1 AND barangay = '$barangay'");
                }
                ?>
                <h1><?= $get_appointments->num_rows ?></h1>
                <p class="mb-0"><i class="fa fa-calendar-check"></i> Appointments</p>
              </div>
            </div>

          </div>

          <div class="col-lg-4">

            <div class="card shadow-sm rounded-0 p-3 h-100">
              <div class="card-body">
                <?php
                $get_records = $conn->query("SELECT * FROM appointments WHERE status = 1 AND barangay = '$barangay'");
                if($barangay == 'admin'){
                  $get_records = $conn->query("SELECT * FROM appointments WHERE status = 1");
                }
                ?>
                <h1><?= $get_records->num_rows ?></h1>
                <p class="mb-0"><i class="fa fa-check-circle"></i> Immunization Records</p>
              </div>
            </div>

          </div>

          <div class="col-lg-4">

            <div class="card shadow-sm rounded-0 p-3 h-100">
              <div class="card-body">
                <?php
                $get_appoint_records = $conn->query("SELECT * FROM appointments WHERE status = 2");
                if($barangay == 'admin'){
                  $get_records = $conn->query("SELECT * FROM appointments WHERE status = 2");
                }
                ?>
                <h1><?= $get_appoint_records->num_rows ?></h1>
                <p class="mb-0"><i class="fa fa-folder-open"></i> Appointment Records</p>
              </div>
            </div>

          </div>

          <div class="col-lg-4">
             <div class="card h-100">
              <div class="card-body">
                <h1><?= array_sum($count_show) ?></h1>
                <p class="mb-0"><i class="fa fa-user-check"></i> Immunized</p>
              </div>
             </div>
          </div>

          <div class="col-lg-4">
             <div class="card h-100">
              <div class="card-body">
                <h1><?= array_sum($count_dont_show) ?></h1>
                <p class="mb-0"><i class="fa fa-user-xmark"></i> Not Immunized</p>
              </div>
             </div>
          </div> -->

          <div class="col-12">
            <div class="card">
              <div class="card-body">
              <canvas id="barChart" height="100px"></canvas>
              </div>
            </div>
          </div>

        </div>
      </div>

      <footer class="py-3 text-center">
          <p class="text-secondary">&copy; Barangay Immunization 2024</p>
      </footer>

    </div>

  </div>

</div>

<?php 
  // Assuming $conn is your database connection
  $appoint_by_barangay = $conn->query("SELECT COUNT(*) AS RECORD, barangay FROM appointments GROUP BY barangay");
  $count = [];
  $barangays = [];
  foreach ($appoint_by_barangay as $value) {
    $count[] = $value['RECORD'];
    $barangays[] = $value['barangays'];
  }
?>

<script>
  var xValues = [<?php echo json_encode($barangays); ?>];
  var yValues = <?php echo json_encode($data); ?>; // Convert PHP array to JSON
  var barColors = ["#0d6efd", "#0d6efd", "#0d6efd"];

  new Chart("barChart", {
    type: "bar",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      legend: {
        display: false
      },
      title: {
        display: false,
        text: "Records"
      }
    }
  });
</script>
<?php
require './partials/footer.php';
