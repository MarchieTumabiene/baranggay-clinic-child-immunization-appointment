<div class="p-4">
           

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
                    FROM immunization WHERE appoint_id = $ids LIMIT 0, 1");
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
                    FROM immunization WHERE appoint_id = $ids LIMIT 1, 1");
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
                    FROM immunization WHERE appoint_id = $ids LIMIT 2, 1");
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
                    FROM immunization WHERE appoint_id = $ids LIMIT 3, 1");
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
                    FROM immunization WHERE appoint_id = $ids LIMIT 4, 1");
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
                    FROM immunization WHERE appoint_id = $ids LIMIT 5, 1");
                        $data_6th = $get_6th->fetch_array();
                        ?>

                        <tr>
                            <td></td>
                            <td>1st</td>
                            <td>2nd</td>
                            <td>3rd</td>
                            <!-- <td>4th</td>
                            <td>5th</td>
                            <td>6th</td> -->
                        <tr>
                            <td colspan="1">NEWBORN SCREENING</td>
                            <td><?= $data_1st['newborn_screening'] ?? '' ?> 
                                <?php
                                if ($data_1st['stat_1'] == 1) {
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                  
                                <?php
                                } else if ($data_1st['stat_1'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_1'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_1'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_1'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td></td>
                            <td></td>
                            <!-- <td></td>
                            <td></td>
                            <td></td> -->
                        </tr>
                        <tr>
                            <td>BCG (at birth)</td>
                            <td><?= $data_1st['BCG'] ?? '' ?> 
                            <?php
                                if ($data_1st['stat_2'] == 1) {
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_2'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_2'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_2'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_2'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                        </td>
                            <td>
                               
                             
                            </td>
                            <td><?= $data_3rd['BCG'] ?? '' ?></td>
                            
                         

                        </tr>
                        <tr>
                            <td>DRT (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['DRT'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_3'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_3'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_3'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_3'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_3'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                        </td>
                            <td><?= $data_2nd['DRT'] ?? '' ?> 
                            <?php
                                if ($data_2nd['stat_3'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                }else if ($data_2nd['stat_3'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_3'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_3'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_3'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_3rd['DRT'] ?? '' ?>
                                
                                <?php
                                if ($data_3rd['stat_3'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_3rd['stat_3'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_3'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_3'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_3'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <!-- <td><?= $data_4th['DRT'] ?? '' ?></td>
                            <td><?= $data_5th['DRT'] ?? '' ?></td>
                            <td><?= $data_6th['DRT'] ?? '' ?></td> -->

                        </tr>
                        <tr>
                            <td>CRV (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['CRV'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_4'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_4'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_4'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_4'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_4'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                        
                            </td>
                            <td><?= $data_2nd['CRV'] ?? '' ?> 
                            <?php
                                if ($data_2nd['stat_4'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_2nd['stat_4'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_4'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_4'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_4'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                        </td>
                            <td><?= $data_3rd['CRV'] ?? '' ?>  <?php
                                if ($data_3rd['stat_4'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_3rd['stat_4'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_4'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_4'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_4'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>

                        </tr>
                        <tr>
                            <td>HEPATITIS B (6wks, 10wks, 14wks old)</td>
                            <td><?= $data_1st['HEPATITIS_B'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_5'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_5'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_5'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_5'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_5'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_2nd['HEPATITIS_B'] ?? '' ?>
                            <?php
                                if ($data_2nd['stat_5'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_2nd['stat_5'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_5'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_5'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_5'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_3rd['HEPATITIS_B'] ?? '' ?>  <?php
                                if ($data_3rd['stat_5'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_3rd['stat_5'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_5'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_5'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_3rd['stat_5'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>

                        </tr>
                        <tr>
                            <td>VITAMIN A (start at 6mos.)
                                <p>VITAMIN K</p>
                            </td>
                            <td><?= $data_1st['VITAMIN_A'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_7'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_7'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_7'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_7'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_7'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                        </td>
                            <td><?= $data_2nd['VITAMIN_A'] ?? '' ?>
                            <?php
                                if ($data_2nd['stat_7'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                }  else if ($data_2nd['stat_7'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_7'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_7'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_2nd['stat_7'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_3rd['VITAMIN_A'] ?? '' ?>
                          
                        </td>
                        </tr>
                        <tr>
                            <td>MEASLES (9mos.)</td>
                            <td><?= $data_1st['MEASLES'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_6'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_6'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_6'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_6'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_6'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_2nd['MEASLES'] ?? '' ?></td>
                            <td><?= $data_3rd['MEASLES'] ?? '' ?>
                            
                        </td>
                        </tr>
                     
                        <!-- <tr>
                            <td>VITAMIN K</td>
                            <td><?= $data_1st['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_2nd['VITAMIN_K'] ?? '' ?></td>
                            <td><?= $data_3rd['VITAMIN_K'] ?? '' ?>
                        </td> -->

                        </tr>
                        <tr>
                            <td>And Other vaccines / vitamins(1 year above)</td>
                            <td><?= $data_1st['DEWORMING'] ?? '' ?>  <?php
                                if ($data_1st['stat_9'] == 1) {
                                
                                ?>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else if ($data_1st['stat_9'] == 2) {
                                    ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_9'] == 3) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Stagnant</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_9'] == 4) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Overweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }else if ($data_1st['stat_9'] == 5) {
                                    ?>
                                    <p class="mb-0 text-danger" style="font-size: 10px;">Underweight</p>
                                    <img src="../assets/img/nurse-signature/<?= $settings['nurse_signature'] ?>" alt="" style="width: 100px;">
                                <?php
                                }
                                ?></td>
                            <td></td>
                            <td>
                        </td>

                        </tr>
                        <!-- <tr>
                            <td>DENTAL CHECK-UP(1 year above)</td>
                            <td><?= $data_1st['DENTAL_CHECK_UP'] ?? '' ?>
                            <?php
                                if ($data_1st['stat_10'] == 1) {
                                
                                ?>
                                <button type="button" onclick="showAlert('Click status if you done immunized?', 'question', '?action=update-immunization&update=<?= $data_1st['id'] ?>&appoint=<?= $ids ?>&stat=stat_10')" class="btn btn-primary p-1 py-0 m-0" style="font-size: 10px;"><i class="fa fa-edit"></i></button>
                                    <p class="mb-0" style="font-size: 10px;">Pending</p>
                                <?php
                                } else {
                                ?>
                                    <p class="mb-0 text-success" style="font-size: 10px;">Finished</p>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $data_2nd['DENTAL_CHECK_UP'] ?? '' ?></td>
                            <td><?= $data_3rd['DENTAL_CHECK_UP'] ?? '' ?>
                        </td>

                        </tr> -->
                        </td>

                        </tr>



                    </table>
                </div>

                <!-- <div class="card-footer text-end dont-print">
                    <button type="button" id="downloadBtn" class="btn btn-primary"><i class="fa fa-download"></i> Save</button>
                </div> -->
            </div>
</div>