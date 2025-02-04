<?php 
    $url = implode(explode('/barangay_immunization', strtolower($_SERVER['REQUEST_URI'])));
    $active = "text-dark bg-light active";
    $inactive = "text-light";
?>
<style>
    .nav .flex-column li a figure{
        width: 16px !important;
    }
    .nav.flex-column li .active img{
        filter: brightness(0) saturate(100%) !important;
    }
    .nav.flex-column li a img{
        filter: brightness(0) saturate(100%) invert(100%) sepia(100%) saturate(0%) hue-rotate(292deg) brightness(104%) contrast(101%);
    }
</style>
<div class="col-lg-2 col-10 d-lg-block d-none bg-primary px-0 dont-print" style="height: 100vh;z-index: 100 !important;" id="menu">
<a href="#" class="position-absolute top-0 fs-1 end-0 m-3 text-light d-lg-none d-block" id="close-sidebar"><i class="fa fa-xmark"></i></a>
    <h4 class="text-light mx-3">
        <a href="index" class="text-decoration-none text-light">
            <div class="row mb-0 gy-0">
                <div class="col-3 h-100">
                    <img src="../assets/img/<?= $_SESSION['LOGO'] ?>" alt="" class="w-100 mt-3"> 
                </div>
                <div class="col-9">
                Barangay Immunization 
                </div>
            </div>
            <br>
            <hr class="mt-0 mb-0" />
            <span style="font-size: 15px; font-weight: normal;">Barangay: <span class="fw-bold"><?= strtoupper($barangay) ?></span></span>
            <hr class="mt-1" />
        </a>
    </h4>

        <ul class="nav flex-column mt-3">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link d-flex g-2 <?= str_contains($url,'/admin/dashboard') ? $active : $inactive ?>"> <figure class="me-1"><img src="../assets/img/home.png"/></figure> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="appointments.php" class="nav-link d-flex <?= str_contains($url, '/admin/appointments') || str_contains($url, '/admin/create-appointment') || str_contains($url, '/admin/edit-appointment')  ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/appointment.png"/></figure> Appointments</a>
                </li>

                <li class="nav-item">
                    <a href="immunization.php" class="nav-link d-flex <?= str_contains($url, '/admin/immunization') || str_contains($url, '/admin/view-immunization') ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/immunization.png"/></figure> Immunization</a>
                </li>

                <li class="nav-item">
                    <a href="record.php" class="nav-link d-flex <?= str_contains($url, '/admin/record') || str_contains($url ,'/view-record') ? $active : $inactive ?>">  <figure class="me-1"><img src="../assets/img/record.png"/></figure> Records</a>
                </li>

               <?php 
                if($barangay != 'admin'){
                    ?>
                    <li class="nav-item">
                        <a href="settings.php" class="nav-link <?= str_contains($url, '/admin/settings') ? $active : $inactive ?>"> <i class="fa fa-gear"></i> Settings</a>
                    </li>
                    <?php 
                }else{
                    ?>
                    <li class="nav-item">
                        <a href="admins.php" class="nav-link <?= str_contains($url, '/admin/admins') ? $active : $inactive ?>"> <i class="fa fa-users"></i> Barangay Admins</a>
                    </li>
                    <?php 
                }
               ?>
              
                <li class="nav-item">
                    <a href="#" class="nav-link text-light" onclick="showMessage('Are you sure you want to logout?', 'info', '?logout')"> <i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
</div>

