<?php
$today = date('Y-m-d');
$get_child = $conn->query("SELECT * FROM appointments");
$new_born = [];
$BCG = [];
$DRT = [];
$CRV = [];
$HEPATITIS_B = [];
$MEASLES = [];
$VITAMIN_A = [];
$DEWORMING = [];
if ($get_child->num_rows > 0) {
    foreach ($get_child as $child) {
        $id = $child['id'];
        $check_child_immunization = $conn->query("SELECT i.*, a.c_fname, a.c_mname, a.c_lname FROM immunization i INNER JOIN appointments a ON i.appoint_id = a.id WHERE appoint_id = '$id'");
        foreach ($check_child_immunization as $key => $value) {
            if ($value['newborn_screening'] == $today) {
                if ($value['stat_1'] == 1) {
                    $new_born[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['BCG'] == $today) {
                if ($value['stat_2'] == 1) {
                    $BCG[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['DRT'] == $today) {
                if ($value['stat_3'] == 1) {
                    $DRT[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['CRV'] == $today) {
                if ($value['stat_4'] == 1) {
                    $notifications[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['HEPATITIS_B'] == $today) {
                if ($value['stat_5'] == 1) {
                    $HEPATITIS_B[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['MEASLES'] == $today) {
                if ($value['stat_6'] == 1) {
                    $MEASLES[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['VITAMIN_A'] == $today) {
                if ($value['stat_7'] == 1) {
                    $VITAMIN_A[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }

            if ($value['DEWORMING'] == $today) {
                if ($value['stat_9'] == 1) {
                    $DEWORMING[] = [
                        'child' => $value['c_lname'] . ', ' . $value['c_fname'] . ' ' . $value['c_mname'],
                        'id' => $value['appoint_id'],
                        'count' => 1
                    ];
                }
            }
        }
    }
}

$merged_new_born = [];
$merge_BCG = [];
$merge_DRT = [];
$merge_CRV = [];
$merge_HEPATITIS_B = [];
$merge_MEASLES = [];
$merge_VITAMIN_A = [];
$merge_DEWORMING = [];
foreach ($new_born as $n_born) {
    $id = $n_born['id'];
    if (isset($merged_new_born[$id])) {
        $merged_new_born[$id]['count'] += $n_born['count'];
    } else {
        $merged_new_born[$id] = $n_born;
    }
}

foreach ($BCG as $bcg_data) {
    $id = $bcg_data['id'];
    if (isset($merge_BCG[$id])) {
        $merge_BCG[$id]['count'] += $bcg_data['count'];
    } else {
        $merge_BCG[$id] = $bcg_data;
    }
}

foreach ($CRV as $CRV_data) {
    $id = $CRV_data['id'];
    if (isset($merge_CRV[$id])) {
        $merge_CRV[$id]['count'] += $merge_CRV['count'];
    } else {
        $merge_CRV[$id] = $merge_CRV;
    }
}

foreach ($HEPATITIS_B as $HEPATITIS_B_data) {
    $id = $HEPATITIS_B_data['id'];
    if (isset($merge_HEPATITIS_B[$id])) {
        $merge_HEPATITIS_B[$id]['count'] += $merge_HEPATITIS_B['count'];
    } else {
        $merge_HEPATITIS_B[$id] = $merge_HEPATITIS_B;
    }
}

foreach ($MEASLES as $MEASLES_data) {
    $id = $MEASLES_data['id'];
    if (isset($merge_MEASLES[$id])) {
        $merge_MEASLES[$id]['count'] += $merge_MEASLES['count'];
    } else {
        $merge_MEASLES[$id] = $merge_MEASLES;
    }
}

foreach ($VITAMIN_A as $VITAMIN_A_data) {
    $id = $VITAMIN_A_data['id'];
    if (isset($merge_VITAMIN_A[$id])) {
        $merge_VITAMIN_A[$id]['count'] += $merge_VITAMIN_A['count'];
    } else {
        $merge_VITAMIN_A[$id] = $merge_VITAMIN_A;
    }
}

foreach ($DEWORMING as $DEWORMING_data) {
    $id = $DEWORMING_data['id'];
    if (isset($merge_DEWORMING[$id])) {
        $merge_DEWORMING[$id]['count'] += $merge_DEWORMING['count'];
    } else {
        $merge_DEWORMING[$id] = $merge_DEWORMING;
    }
}

$notifications = [
    count($merged_new_born),
    count($merge_BCG),
    count($merge_DRT),
    count($merge_CRV),
    count($merge_HEPATITIS_B),
    count($merge_MEASLES),
    count($merge_VITAMIN_A),
    count($merge_DEWORMING)
];

$all_notifications = array_sum($notifications);
?>

<nav class="navbar navbar-expand-lg navbar-light sticky-top dont-print shadow-sm" style="background: #fff;z-index: 1;">
    <div class="container">
        <button type="button" class="navbar-toggler " id="sidebar-toggler"><i class="fa fa-bars"></i></button>

        <ul class="ms-auto navbar-nav gap-3">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-bell"></i> <?= $all_notifications ?></a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li class="dropdown-item py-0">
                        <span class="text-secondary" style="font-size: 12px !important;">Notifications (<?= $all_notifications ?>)</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <?php
                    foreach ($new_born as $n_born) {
                        $id = $n_born['id'];
                        if (isset($merged_new_born[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $bcg_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $n_born['child'] ?> didn't show in new born screening</a>
                            </li>
                        <?php
                        } else {
                            $merged_new_born[$id] = $n_born;
                        }
                    }

                    foreach ($BCG as $bcg_data) {
                        $id = $bcg_data['id'];
                        if (isset($merge_BCG[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $bcg_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $bcg_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_BCG[$id] = $bcg_data;
                        }
                    }

                    foreach ($DRT as $DRT_data) {
                        $id = $DRT_data['id'];
                        if (isset($merge_DRT[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $DRT_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $DRT_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_DRT[$id] = $DRT_data;
                        }
                    }


                    foreach ($CRV as $CRV_data) {
                        $id = $CRV_data['id'];
                        if (isset($merge_CRV[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $CRV_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $CRV_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_CRV[$id] = $CRV_data;
                        }
                    }

                    foreach ($HEPATITIS_B as $HEPATITIS_B_data) {
                        $id = $HEPATITIS_B_data['id'];
                        if (isset($merge_HEPATITIS_B[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $HEPATITIS_B_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $HEPATITIS_B_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_HEPATITIS_B[$id] = $HEPATITIS_B_data;
                        }
                    }

                    foreach ($MEASLES as $MEASLES_data) {
                        $id = $MEASLES_data['id'];
                        if (isset($merge_MEASLES[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $MEASLES_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $MEASLES_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_MEASLES[$id] = $MEASLES_data;
                        }
                    }

                    foreach ($VITAMIN_A as $VITAMIN_A_data) {
                        $id = $VITAMIN_A_data['id'];
                        if (isset($merge_VITAMIN_A[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $VITAMIN_A_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $VITAMIN_A_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_VITAMIN_A[$id] = $VITAMIN_A_data;
                        }
                    }

                    foreach ($DEWORMING as $DEWORMING_data) {
                        $id = $DEWORMING_data['id'];
                        if (isset($merge_DEWORMING[$id])) {
                        ?>
                            <li class="dropdown-item">
                                <a href="view-immunization.php?id=<?= $DEWORMING_data['id'] ?>" class="text-decoration-none text-muted"><i class="fa fa-xmark-circle text-danger"></i> <?= $DEWORMING_data['child'] ?> didn't show</a>
                            </li>
                        <?php
                        } else {
                            $merge_DEWORMING[$id] = $DEWORMING_data;
                        }
                    }

                    ?>

                </ul>
            </li>
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