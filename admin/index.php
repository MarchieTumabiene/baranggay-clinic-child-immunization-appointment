<?php 

    $request = isset($_GET['page']) ? strtolower(clean($_GET['page'])) : 'dashboard';
    $auth = isset($_GET['auth']) ? strtolower(clean($_GET['auth'])) : 'dashboard';
    $viewPageUser = 'admin/';

    if($auth == 1 && $request == 'dashboard'){
        require __DIR__ . $viewPageUser . 'home.php';
    }


