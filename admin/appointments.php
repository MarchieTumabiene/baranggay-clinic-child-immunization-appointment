<?php
require '../partials/headers.php';
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
        a.status = 1 AND a.barangay = '$barangay'
    ");

    if ($barangay == 'admin') {
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
    }
?>
<div class="container-fluid">

    <div class="row">

        <?php require './partials/sidebar.php' ?>

        <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
            <?php require './partials/navbar.php' ?>

            <div class="p-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center gap-2">
                        <h5 class="mb-0"><i class="fa fa-calendar-check"></i> Appointments</h5>
                       <?php 
                        if ($barangay != 'admin') {
                         ?>
                          <a href="./create-appointment.php" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                         <?php    
                        }
                       ?>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="table">
                            <thead>
                                <th>#</th>
                                <th>Ref. #</th>
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
                                        <td><?= $row['reference_id'] ?? '' ?></td>
                                        <td><?= $row['mother'] ?></td>
                                        <td><?= $row['father'] ?></td>
                                        <td><?= $row['child'] ?></td>
                                        <td><?= $row['barangay'] ?></td>
                                        <td><?= $row['date_appoint'] ?></td>
                                        <td class="d-flex align-items-center gap-2">
                                            <a href="#"  onclick="showMessage('Are you sure you want to delete this appointment?', 'question', '?action=delete-appointment&id=<?= $row['id'] ?>')" class="btn btn-secondary d-flex align-items-center gap-1" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</a>
                                            <a href="edit-appointment.php?id=<?= $row['id'] ?>" class="btn btn-primary d-flex align-items-center gap-1"><i class="fa fa-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

            
      <footer class="py-3 text-center">
          <p class="text-secondary">&copy; Barangay Immunization 2024</p>
      </footer>

        </div>

    </div>

</div>
<?php
require './partials/footer.php';
