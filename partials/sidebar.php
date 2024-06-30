<?php 
    $url = implode(explode('/barangay_immunization', strtolower($_SERVER['REQUEST_URI'])));
    $active = "text-dark bg-light";
    $inactive = "text-light";
?>
<div class="col-lg-2 col-10 bg-primary px-0" style="height: 100vh;">
    <h4 class="text-light mx-3">
        <a href="" class="text-decoration-none text-light">
            Barangay Immunization 
            <span style="font-size: 15px; font-weight: normal;">Appointment System</span>
        </a>
    </h4>

        <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= $url == '/index.php' ? $active : $inactive ?>"> <i class="fa fa-home"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="appointments.php" class="nav-link <?= str_contains($url, '/appointments.php') || $url == '/create-appointment.php' || str_contains($url, '/edit-appointment.php')  ? $active : $inactive ?>"> <i class="fa fa-calendar-check"></i> Appointments</a>
                </li>

                <li class="nav-item">
                    <a href="current-appointment.php" class="nav-link <?= $url == '/current-appointment.php' ? $active : $inactive ?>"> <i class="fa fa-check-circle"></i> Current</a>
                </li>

                <li class="nav-item">
                    <a href="appointment-record.php" class="nav-link <?= $url == '/appointment-record.php' ? $active : $inactive ?>"> <i class="fa fa-folder-open"></i> Records</a>
                </li>
              
                <li class="nav-item">
                    <a href="?action=logout" class="nav-link text-light" onclick="return confirm('Are you sure you want to logout?')"> <i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
</div>