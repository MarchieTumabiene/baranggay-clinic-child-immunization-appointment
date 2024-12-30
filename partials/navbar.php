<?php 
    
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top dont-print" style="background: #fff;z-index: 1;" >
    <div class="container-fluid">

        <h1 class="navbar-brand" >Barangay Immunization</h1>

        <button type="button" class="navbar-toggler " data-bs-toggle="collapse" data-bs-target="#sidebar"><i class="fa fa-bars"></i></button>

        <div class="navbar-collapse collapse" id="sidebar">
            <ul class="ms-auto navbar-nav gap-lg-3">
            <li class="nav-item">
                    <a href="?view=immunization" class="nav-link <?= isset($_GET['view']) ? $_GET['view'] == 'immunization' ? 'active' : ''  : 'active' ?>">Immunizaition</a>
                </li>
                <li class="nav-item">
                    <a href="?view=child" class="nav-link  <?= isset($_GET['view']) ? $_GET['view'] == 'child' ? 'active' : ''  : '' ?>">Child</a>
                </li>
                
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-light" data-bs-toggle="dropdown"><i class="fa fa-gear"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end">

                        <li class="dropdown-item">
                            <a href="#" onclick="showMessage('Are you sure you want to logout?', 'info', '?logout')" class="text-dark text-decoration-none"><i class="fa fa-sign-out"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    //  let toggle = document.getElementById('sidebar-toggler')
    // let sidebar = document.getElementById('menu')
    // let close = document.getElementById('close-sidebar')

    // toggle.onclick = () => {
    //     sidebar.classList.remove('d-none', 'd-lg-block')
    //     sidebar.classList.add('position-fixed', 'start-0', 'top-0')
    // }

    // close.onclick = () => {
    //     sidebar.classList.add('d-none', 'd-lg-block')
    //     sidebar.classList.remove('position-fixed', 'start-0', 'top-0')
    // }
</script>