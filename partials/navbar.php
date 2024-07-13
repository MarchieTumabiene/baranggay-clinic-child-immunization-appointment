<nav class="navbar navbar-expand-lg navbar-light sticky-top" style="background: #fff;z-index: 1;">
    <div class="container">
        <button type="button" class="navbar-toggler " id="sidebar-toggler"><i class="fa fa-bars"></i></button>

        <ul class="ms-auto navbar-nav">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['USERNAME'] ?></a>
                <ul class="dropdown-menu dropdown-menu-end">

                    <li class="dropdown-item">
                        <a href="#" onclick="showMessage('Are you sure you want to logout?', 'info', '?logout')" class="text-dark text-decoration-none"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

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