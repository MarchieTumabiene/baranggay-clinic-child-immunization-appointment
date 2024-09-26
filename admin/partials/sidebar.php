<?php 
    $url = implode(explode('/barangay_immunization', strtolower($_SERVER['REQUEST_URI'])));
    $active = "text-dark bg-light";
    $inactive = "text-light";
?>
<style>
    .nav .flex-column li a figure{
        width: 16px !important;
    }
    .nav.flex-column li .active img{
        filter: brightness(0) saturate(100%) !important;
    }
</style>
<div class="col-lg-2 col-10 d-lg-block d-none bg-primary px-0 dont-print" style="height: 100vh;z-index: 100 !important;" id="menu">
<a href="#" class="position-absolute top-0 fs-1 end-0 m-3 text-light d-lg-none d-block" id="close-sidebar"><i class="fa fa-xmark"></i></a>
    <h4 class="text-light mx-3">
        <a href="" class="text-decoration-none text-light">
            Barangay Immunization 
            <span style="font-size: 15px; font-weight: normal;">Appointment System</span>
        </a>
    </h4>

        <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="index.php" class="nav-link d-flex g-2 <?= $url == '/admin/index.php' ? $active : $inactive ?>"> <figure class="me-1"><img src="../assets/img/home.png"/></figure> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="appointments.php" class="nav-link d-flex <?= str_contains($url, '/admin/appointments.php') || str_contains($url, '/admin/create-appointment.php') || str_contains($url, '/admin/edit-appointment.php')  ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/appointment.png"/></figure> Appointments</a>
                </li>

                <li class="nav-item">
                    <a href="immunization.php" class="nav-link d-flex <?= str_contains($url, '/admin/immunization.php') || str_contains($url, '/admin/view-immunization.php') ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/immunization.png"/></figure> Immunization</a>
                </li>

                <li class="nav-item">
                    <a href="records.php" class="nav-link d-flex <?= $url == '/admin/records.php' || str_contains($url ,'/view-record') ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/record.png"/></figure> Records</a>
                </li>

                <li class="nav-item">
                    <a href="settings.php" class="nav-link <?= $url == '/admin/settings.php' ? $active : $inactive ?>"> <i class="fa fa-gear"></i> Settings</a>
                </li>
              
                <li class="nav-item">
                    <a href="#" class="nav-link text-light" onclick="showMessage('Are you sure you want to logout?', 'info', '?logout')"> <i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
</div>

