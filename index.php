<?php
require './partials/header.php';
?>
<div class="container-fluid">

  <div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
      <?php require './partials/navbar.php' ?>


      <div class="p-4">
        <div class="row g-3">
         

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
                $get_records = $conn->query("SELECT * FROM immunization WHERE stat_10 = 1 GROUP BY appoint_id");
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
                $get_appoint_records = $conn->query("SELECT * FROM appointments WHERE status = 2");
                ?>
                <h1><?= $get_appoint_records->num_rows ?></h1>
                <p class="mb-0"><i class="fa fa-folder-open"></i> Appointment Records</p>
              </div>
            </div>

          </div>

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

<script>
  var xValues = ["Appointments", "Immunization Records", "Appointment Records"];
			var yValues = [<?= $get_appointments->num_rows ?>, <?= $get_records->num_rows ?>, <?= $get_appoint_records->num_rows ?>];
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
