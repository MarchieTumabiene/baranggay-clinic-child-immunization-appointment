<?php 

    $request = isset($_GET['page']) ? strtolower(clean($_GET['page'])) : 'home';
    $auth = isset($_GET['auth']) ? strtolower(clean($_GET['auth'])) : 'home';
    $viewPageUser = 'admin/';

    if($request == 'dashboard'){
        require __DIR__ . $viewPageUser . 'home.php';
    }


