<?php
require './partials/header.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $get_appointments = $conn->query("SELECT 
        a.*, 
        CONCAT(p.m_fname, ' ', p.m_mname, ' ', p.m_lname) AS mother, 
        CONCAT(p.f_fname, ' ', p.f_mname, ' ', p.f_lname) AS father, 
        CONCAT(c_fname, ' ', c_mname, ' ', c_lname) AS child,
        p.m_education,
        p.m_occupation,
        p.f_education,
        p.f_occupation
    FROM 
    appointments a 
    INNER JOIN 
        appoint_parents p ON a.id = p.appoint_id
    left JOIN 
        immunization i ON a.id = i.appoint_id
    WHERE 
        a.id = $id
    ");
    $row = $get_appointments->fetch_array();
}
if (isset($_GET['id'])) {
    ?>
    <div class="container-fluid">

<div class="row">

    <?php require './partials/sidebar.php' ?>

    <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
        <?php require './partials/navbar.php' ?>

        <div class="p-4">
            <div class="mb-3 dont-print">
                <a href="immunization.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                <!-- <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#add"><i class="fa fa-plus"></i> Add</button> -->
            </div>

            <div class="card" id="card">
                <div class="card-body table-responsive p-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <img src="./assets/img/DOH_Logo.png" alt="" style="width: 70px;">
                        <h5 class="text-center">EARLY CHILDHOOD CARE AND DEVELOPMENT CARD</h5>
                        <img src="./assets/img/sentrong_sigla.jpg" alt="" style="width: 70px;">
                    </div>

                    <table class="table table-bordered mt-4 border-secondary">
                        <tr>
                            <td>
                                CLINIC BARANGAY FAMILY NO.
                                <span class="ms-2"><?= $row['barangay'] ?></span>
                            </td>
                            <td>
                                CHILD'S NO.
                                <span class="ms-2"><?= $row['child_no'] ?></span>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                CHILD'S NAME
                                <span class="ms-2"><?= $row['child'] ?></span>


                                <span class="mx-3 float-end">SEX:
                                    <span class="ms-2 <?= $row['gender'] == 'Male' ? 'border rounded-circle px-1 border-dark' : '' ?>">M</span>
                                    <span class="ms-2 <?= $row['gender'] == 'Female' ? 'border rounded-circle px-1 border-dark' : '' ?>">F</span>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <p class="mb-1">
                                    MOTHER'S NAME <span class="ms-2"><?= $row['mother'] ?></span>
                                </p>
                                <p class="mb-1">
                                    EDUCATIONAL LEVEL <span class="ms-2"><?= $row['m_education'] ?></span>
                                </p>
                                <p class="mb-1">
                                    OCCUPATION <span class="ms-2"><?= $row['m_occupation'] ?></span>
                                </p>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2">
                                <p class="mb-1">
                                    FATHER'S NAME <span class="ms-2"><?= $row['father'] ?></span>
                                </p>
                                <p class="mb-1">
                                    EDUCATIONAL LEVEL <span class="ms-2"><?= $row['f_education'] ?></span>
                                </p>
                                <p class="mb-1">
                                    OCCUPATION <span class="ms-2"><?= $row['f_occupation'] ?></span>
                                </p>
                            </td>
                        </tr>



                    </table>

                    <table class="table table-bordered mt-4 border-secondary">
                        <tr>
                            <td colspan="7" class="text-center">
                                ESSENTIAL HEALTH AND NUTRITION SERVICES
                            </td>
                        </tr>

                        <?php
                        $get_1st = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 0, 1");
                        $data_1st = $get_1st->fetch_array();

                        $get_2nd = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 1, 1");
                        $data_2nd = $get_2nd->fetch_array();

                        $get_3rd = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 2, 1");
                        $data_3rd = $get_3rd->fetch_array();

                        $get_4th = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 3, 1");
                        $data_4th = $get_4th->fetch_array();

                        $get_5th = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 4, 1");
                        $data_5th = $get_5th->fetch_array();

                        $get_6th = $conn->query("SELECT stat_1,stat_2,stat_3,stat_4,stat_5,stat_6,stat_7,stat_8,stat_9,stat_10,id, 
                        DATE_FORMAT(newborn_screening, '%m-%d-%y') AS newborn_screening,
                        DATE_FORMAT(BCG, '%m-%d-%y') AS BCG,
                        DATE_FORMAT(DRT, '%m-%d-%y') AS DRT,
                        DATE_FORMAT(CRV, '%m-%d-%y') AS CRV,
                        DATE_FORMAT(HEPATITIS_B, '%m-%d-%y') AS HEPATITIS_B,
                        DATE_FORMAT(MEASLES, '%m-%d-%y') AS MEASLES,
                        DATE_FORMAT(VITAMIN_A, '%m-%d-%y') AS VITAMIN_A,
                        DATE_FORMAT(VITAMIN_K, '%m-%d-%y') AS VITAMIN_K,
                        DATE_FORMAT(DEWORMING, '%m-%d-%y') AS DEWORMING,
                        DATE_FORMAT(DENTAL_CHECK_UP, '%m-%d-%y') AS DENTAL_CHECK_UP
                    FROM immunization WHERE appoint_id = $id LIMIT 5, 1");
                        $data_6th = $get_6th->fetch_array();
                        ?>

                        <tr>
                            <td></td>
                            <td>1st</td>
                            <td>2nd</td>
                            <td>3rd</td>
                            <td>4th</td>
                            <td>5th</td>
                            <td>6th</td>
                        <tr>
                            <td colspan="1">NEWBORN SCREENING</td>
                            <td><?= $data_1st['newborn_screening'] ?? '' ?> 
                                <?php
                                if ($data_1st['stat_1'] == 1) {
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_1st['id'] ?>&appoint=<?= $id ?>&stat=stat_1')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>BCG (at birth)</td>
                            <td><?= $data_1st['BCG'] ?? '' ?> </td>
                            <td><?= $data_2nd['BCG'] ?? '' ?>
                               
                                <?php
                                if ($data_2nd['stat_2'] == 1) {
                                ?>
                                 <button type="button" class="btn btn-primary p-1 py-0" style="font-size: 10px;" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_2nd['id'] ?>&appoint=<?= $id ?>&stat=stat_2')"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_3rd['BCG'] ?? '' ?></td>
                            <td><?= $data_4th['BCG'] ?? '' ?></td>
                            <td><?= $data_5th['BCG'] ?? '' ?></td>
                            <td><?= $data_6th['BCG'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>DRT (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['DRT'] ?? '' ?></td>
                            <td><?= $data_2nd['DRT'] ?? '' ?></td>
                            <td><?= $data_3rd['DRT'] ?? '' ?>
                                
                                <?php
                                if ($data_3rd['stat_3'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_3rd['id'] ?>&appoint=<?= $id ?>&stat=stat_3')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_4th['DRT'] ?? '' ?></td>
                            <td><?= $data_5th['DRT'] ?? '' ?></td>
                            <td><?= $data_6th['DRT'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>CRV (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['CRV'] ?? '' ?></td>
                            <td><?= $data_2nd['CRV'] ?? '' ?></td>
                            <td><?= $data_3rd['CRV'] ?? '' ?></td>
                            <td><?= $data_4th['CRV'] ?? '' ?>
                                
                                <?php
                                if ($data_4th['stat_4'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_4th['id'] ?>&appoint=<?= $id ?>&stat=stat_4')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_5th['CRV'] ?? '' ?></td>
                            <td><?= $data_6th['CRV'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>HEPATITIS B (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_2nd['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_3rd['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_4th['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_5th['HEPATITIS_B'] ?? '' ?>
                                
                                <?php
                                if ($data_5th['stat_5'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_5th['id'] ?>&appoint=<?= $id ?>&stat=stat_5')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_6th['HEPATITIS_B'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>MEASLES (9mos.)</td>
                            <td><?= $data_1st['MEASLES'] ?? '' ?></td>
                            <td><?= $data_2nd['MEASLES'] ?? '' ?></td>
                            <td><?= $data_3rd['MEASLES'] ?? '' ?></td>
                            <td><?= $data_4th['MEASLES'] ?? '' ?></td>
                            <td><?= $data_5th['MEASLES'] ?? '' ?></td>
                            <td><?= $data_6th['MEASLES'] ?? '' ?>
                                
                                <?php
                                if ($data_6th['stat_6'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_6th['id'] ?>&appoint=<?= $id ?>&stat=stat_6')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td>VITAMIN A (start at 6mos.)</td>
                            <td><?= $data_1st['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_2nd['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_3rd['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_4th['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_5th['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_6th['VITAMIN_A'] ?? '' ?>
                                
                                <?php
                                if ($data_6th['stat_7'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_6th['id'] ?>&appoint=<?= $id ?>&stat=stat_7')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td>VITAMIN K</td>
                            <td><?= $data_1st['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_2nd['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_3rd['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_4th['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_5th['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_6th['VITAMIN_K'] ?? '' ?>
                                
                                <?php
                                if ($data_6th['stat_8'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_6th['id'] ?>&appoint=<?= $id ?>&stat=stat_8')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td>DEWORMING</td>
                            <td><?= $data_1st['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_2nd['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_3rd['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_4th['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_5th['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_6th['DEWORMING'] ?? '' ?>
                                
                                <?php
                                if ($data_6th['stat_9'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_6th['id'] ?>&appoint=<?= $id ?>&stat=stat_9')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td>DENTAL CHECK-UP</td>
                            <td><?= $data_1st['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_2nd['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_3rd['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_4th['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_5th['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_6th['DENTAL_CHECK_UP'] ?? '' ?>
                                
                                <?php
                                if ($data_6th['stat_10'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showMessage('Are you sure?', 'question', '?action=update-immunization&update=<?= $data_6th['id'] ?>&appoint=<?= $id ?>&stat=stat_10')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        </td>

                        </tr>



                    </table>
                </div>

                <div class="card-footer text-end dont-print">
                    <button type="button" id="downloadBtn" class="btn btn-primary"><i class="fa fa-download"></i> Save</button>
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
}

?>

<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Immuzation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="?action=add-immunization&id=<?= $row['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <label for="">NEWBORN SCREENING</label>
                    <input type="date" name="newborn_screening" class="form-control my-2">
                    <label for="">BCG (at birth)</label>
                    <input type="date" name="BCG" class="form-control my-2">
                    <label for="">DRT (6wks, 10wks, 14wks old)</label>
                    <input type="date" name="DRT" class="form-control my-2">
                    <label for="">CRV (6wks, 10wks, 14wks old)</label>
                    <input type="date" name="CRV" class="form-control my-2">
                    <label for="">HEPATITIS B (6wks, 10wks, 14wks old)</label>
                    <input type="date" name="HEPATITIS_B" class="form-control my-2">
                    <label for="">MEASLES (9mos.)</label>
                    <input type="date" name="MEASLES" class="form-control my-2">
                    <label for="">VITAMIN A (start at 6mos.)</label>
                    <input type="date" name="VITAMIN_A" class="form-control my-2">
                    <label for="">VITAMIN K</label>
                    <input type="date" name="VITAMIN_K" class="form-control my-2">
                    <label for="">DEWORMING</label>
                    <input type="date" name="DEWORMING" class="form-control my-2">
                    <label for="">DENTAL CHECK-UP</label>
                    <input type="date" name="DENTAL_CHECK_UP" class="form-control my-2">
                    <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script> -->
<script>
 document.getElementById('downloadBtn').addEventListener('click', function() {
    // Select the card element you want to capture
    var card = document.querySelector('.card');
    var button = document.getElementById('downloadBtn');
    
    // Hide the download button
    button.classList.add("d-none");

    // Use html2canvas to capture the card
    html2canvas(card, {
        scrollX: 0,
        scrollY: -window.scrollY,
        useCORS: true, // To handle CORS issues with external images
        backgroundColor: null, // Transparent background
    }).then(canvas => {
        // Convert the canvas to a data URL
        var imgData = canvas.toDataURL('image/png');

        // Create a temporary link element
        var link = document.createElement('a');
        link.href = imgData;
        link.download = 'card.png';

        // Trigger the download
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }).finally(() => {
        // Show the button again after download
        button.classList.remove("d-none");
    });
});


    </script>
<?php
require './partials/footer.php';
