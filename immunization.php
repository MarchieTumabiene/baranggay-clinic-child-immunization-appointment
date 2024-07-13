<?php
require './partials/header.php';
$get_appointments = $conn->query("SELECT 
        a.*, 
        CONCAT(p.m_fname, ' ', p.m_mname, ' ', p.m_lname) AS mother, 
        CONCAT(p.f_fname, ' ', p.f_mname, ' ', p.f_lname) AS father, 
        CONCAT(c_fname, ' ', c_mname, ' ', c_lname) AS child
    FROM 
    appointments a 
    INNER JOIN 
        appoint_parents p ON a.id = p.appoint_id
    WHERE 
        a.status = 1
    ");
?>
<div class="container-fluid">

    <div class="row">

        <?php require './partials/sidebar.php' ?>

        <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
            <?php require './partials/navbar.php' ?>

            

            <div class="p-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center gap-2 py-3">
                        <h5 class="mb-0"><i class="fa fa-syringe"></i> Immunization</h5>

                    </div>
                    <div class="card-body table-responsive">

                        <table id="table">
                            <thead>
                                <th>#</th>
                                <th>Mother</th>
                                <th>Father</th>
                                <th>Child</th>
                                <th>Barangay</th>
                                <th>Date</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_appointments as $row) :
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['mother'] ?></td>
                                        <td><?= $row['father'] ?></td>
                                        <td><?= $row['child'] ?></td>
                                        <td><?= $row['barangay'] ?></td>
                                        <td style="width: 150px;">
                                            <?php
                                            if ($row['date_appoint'] == '') {
                                            ?>
                                                <span class="text-secondary">None</span>
                                            <?php
                                            } else {
                                                echo date('m-d-y h:i', strtotime($row['date_appoint']));
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="view-immunization.php?id=<?= $row['id'] ?>" class="btn btn-primary d-flex align-items-center justify-content-between" style="width: 80px;"><i class="fa fa-file-lines"></i> View</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
<?php
require './partials/footer.php';
