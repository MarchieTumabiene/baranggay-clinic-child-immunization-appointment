<?php
require './partials/header.php';
$get_barangayAdmins = $conn->query("SELECT * FROM admin");
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
                      
                          <a href="./create-appointment.php" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        
                    </div>
                    <div class="card-body table-responsive">

                        <table id="table">
                            <thead>
                                <th>#</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Barangay</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($get_barangayAdmins as $row) :
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $row['username'] ?? '' ?></td>
                                        <td><?= $row['email'] ?></td>
                                        <td><?= $row['barangay'] ?></td>
                                        <td class="d-flex align-items-center gap-2">
                                            <a href="#"  onclick="showMessage('Are you sure you want to delete this appointment?', 'question', '?action=delete-appointment&id=<?= $row['id'] ?>')" class="btn btn-secondary d-flex align-items-center gap-1" onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i> Delete</a>
                                            <?php 
                                             if (!$barangay == 'admin') {
                                                ?>
                                                <a href="edit-appointment.php?id=<?= $row['id'] ?>" class="btn btn-primary d-flex align-items-center gap-1"><i class="fa fa-edit"></i> Edit</a>
                                                <?php    
                                               }
                                            ?>
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
