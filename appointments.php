<?php
require './partials/header.php';
$get_appointments = $conn->query("SELECT *, CONCAT(p_fname, ' ', p_mname, ' ', p_lname) AS parent, CONCAT(c_fname, ' ', c_mname, ' ', c_lname) AS child FROM appointments");
?>
<div class="container-fluid">

  <div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-4" style="max-height: 100vh; overflow-y: auto;">

        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <h5 class="mb-0"><i class="fa fa-calendar-check"></i> Appointments</h5>
                <a href="./create-appointment.php" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            </div>
            <div class="card-body table-responsive">

                <table id="table">
                    <thead>
                        <th>#</th>
                        <th>Parent</th>
                        <th>Child</th>
                        <th>Date</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        <?php
                        $i = 1;
                         foreach($get_appointments as $row): 
                            ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row['parent'] ?></td>
                                <td><?= $row['child'] ?></td>
                                <td><?= $row['date'] ?></td>
                                <td>
                                    <a href="?action=delete-appointment&id=<?= $row['id'] ?>" class="btn btn-secondary" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</a>
                                    <a href="edit-appointment.php?id=<?= $row['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
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
<?php
require './partials/footer.php';
