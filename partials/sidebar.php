<?php 
    $url = implode(explode('/barangay_immunization', strtolower($_SERVER['REQUEST_URI'])));
    $active = "text-dark bg-light";
    $inactive = "text-light";
?>
<div class="col-lg-2 col-10 d-lg-block d-none bg-primary px-0 dont-print" style="height: 100vh;" id="menu">
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
                    <a href="appointments.php" class="nav-link <?= str_contains($url, '/appointments.php') || str_contains($url, '/create-appointment.php') || str_contains($url, '/edit-appointment.php')  ? $active : $inactive ?>"> <i class="fa fa-calendar-check"></i> Appointments</a>
                </li>

                <li class="nav-item">
                    <a href="immunization.php" class="nav-link <?= str_contains($url, '/immunization.php') || str_contains($url, '/view-immunization.php') ? $active : $inactive ?>"> <i class="fa fa-syringe"></i> Immunization</a>
                </li>

                <li class="nav-item">
                    <a href="records.php" class="nav-link <?= $url == '/records.php' || str_contains($url ,'/view-record') ? $active : $inactive ?>"> <i class="fa fa-folder-open"></i> Records</a>
                </li>
              
                <li class="nav-item">
                    <a href="?action=logout" class="nav-link text-light" onclick="return confirm('Are you sure you want to logout?')"> <i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
</div>

<script>
     let toggle = document.getElementById('sidebar-toggler')
    let sidebar = document.getElementById('menu')
    let close = document.getElementById('close-sidebar')

    toggle.onclick = () => {
        sidebar.classList.remove('d-none', 'd-lg-block')
        sidebar.classList.add('position-fixed', 'start-0', 'top-0')
    }

    close.onclick = () => {
        sidebar.classList.add('d-none', 'd-lg-block')
        sidebar.classList.remove('position-fixed', 'start-0', 'top-0')
    }
</script>