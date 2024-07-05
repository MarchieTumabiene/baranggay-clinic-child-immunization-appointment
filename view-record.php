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
?>
<div class="container-fluid">

    <div class="row">

        <?php require './partials/sidebar.php' ?>

        <div class="col-lg-10 p-4" style="max-height: 100vh; overflow-y: auto;">

            <div class="mb-3 dont-print">
                <a href="records.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
            </div>

            <div class="card">
                <div class="card-body table-responsive">
                    <h5 class="text-center">EARLY CHILDHOOD CARE AND DEVELOPMENT CARD</h5>

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
                        $get_1st = $conn->query("SELECT 
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

                        $get_2nd = $conn->query("SELECT 
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

                        $get_3rd = $conn->query("SELECT 
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

                        $get_4th = $conn->query("SELECT 
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

                        $get_5th = $conn->query("SELECT 
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

                        $get_6th = $conn->query("SELECT 
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
                            <td><?= $data_1st['newborn_screening'] ?? '' ?></td>
                            <td><?= $data_2nd['newborn_screening'] ?? '' ?></td>
                            <td><?= $data_3rd['newborn_screening'] ?? '' ?></td>
                            <td><?= $data_4th['newborn_screening'] ?? '' ?></td>
                            <td><?= $data_5th['newborn_screening'] ?? '' ?></td>
                            <td><?= $data_6th['newborn_screening'] ?? '' ?></td>
                        </tr>
                        <tr>
                            <td>BCG (at birth)</td>
                            <td><?= $data_1st['BCG'] ?? '' ?></td>
                            <td><?= $data_2nd['BCG'] ?? '' ?></td>
                            <td><?= $data_3rd['BCG'] ?? '' ?></td>
                            <td><?= $data_4th['BCG'] ?? '' ?></td>
                            <td><?= $data_5th['BCG'] ?? '' ?></td>
                            <td><?= $data_6th['BCG'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>DRT (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['DRT'] ?? '' ?></td>
                            <td><?= $data_2nd['DRT'] ?? '' ?></td>
                            <td><?= $data_3rd['DRT'] ?? '' ?></td>
                            <td><?= $data_4th['DRT'] ?? '' ?></td>
                            <td><?= $data_5th['DRT'] ?? '' ?></td>
                            <td><?= $data_6th['DRT'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>CRV (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['CRV'] ?? '' ?></td>
                            <td><?= $data_2nd['CRV'] ?? '' ?></td>
                            <td><?= $data_3rd['CRV'] ?? '' ?></td>
                            <td><?= $data_4th['CRV'] ?? '' ?></td>
                            <td><?= $data_5th['CRV'] ?? '' ?></td>
                            <td><?= $data_6th['CRV'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>HEPATITIS B (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_2nd['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_3rd['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_4th['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_5th['HEPATITIS_B'] ?? '' ?></td>
                            <td><?= $data_6th['HEPATITIS_B'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>MEASLES (9mos.)</td>
                            <td><?= $data_1st['MEASLES'] ?? '' ?></td>
                            <td><?= $data_2nd['MEASLES'] ?? '' ?></td>
                            <td><?= $data_3rd['MEASLES'] ?? '' ?></td>
                            <td><?= $data_4th['MEASLES'] ?? '' ?></td>
                            <td><?= $data_5th['MEASLES'] ?? '' ?></td>
                            <td><?= $data_6th['MEASLES'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>VITAMIN A (start at 6mos.)</td>
                            <td><?= $data_1st['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_2nd['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_3rd['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_4th['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_5th['VITAMIN_A'] ?? '' ?></td>
                            <td><?= $data_6th['VITAMIN_A'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>VITAMIN K</td>
                            <td><?= $data_1st['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_2nd['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_3rd['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_4th['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_5th['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_6th['VITAMIN_K'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>DEWORMING</td>
                            <td><?= $data_1st['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_2nd['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_3rd['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_4th['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_5th['DEWORMING'] ?? '' ?></td>
                            <td><?= $data_6th['DEWORMING'] ?? '' ?></td>

                        </tr>
                        <tr>
                            <td>DENTAL CHECK-UP</td>
                            <td><?= $data_1st['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_2nd['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_3rd['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_4th['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_5th['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_6th['DENTAL_CHECK_UP'] ?? '' ?></td>

                        </tr>
                        </td>

                        </tr>



                    </table>
                </div>

                <div class="card-footer text-end dont-print">
                    <button type="button" onclick="print()" class="btn btn-primary"><i class="fa fa-print"></i> Print</button>
                </div>

            </div>

        </div>

    </div>

</div>

<?php
require './partials/footer.php';
