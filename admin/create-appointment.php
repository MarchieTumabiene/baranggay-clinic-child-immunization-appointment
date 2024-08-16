<?php
require './partials/header.php';
$message = null;
if (isset($_GET['message'])) {
    $message = $_GET['message'];
}

if (!isset($_GET['action'])) {
    unset($_SESSION['error']);
}

$message_error = null;
if (isset($_SESSION['error'])) {
    $message_error = $_SESSION['error'];
}


$barangays = [
    "Kodia",
    "Maalat",
    "San Agustin",
    "Malbago",
    "Tarong",
    "Talangnan",
    "Mancilang",
    "Kaongkod",
    "Bunakan",
    "Kangwayan",
    "Pili",
    "Tugas",
    "Poblacion",
    "Tabagak"
];


?>
<div class="container-fluid">

    <style>
        input,
        select {
            font-size: 13px !important;
            padding: 5px !important;
        }
    </style>
    <div class="row">

        <?php require './partials/sidebar.php' ?>

        <div class="col-lg-10 p-0" style="max-height: 100vh; overflow-y: auto;">
            <?php require './partials/navbar.php' ?>

            <div class="p-3">
                <div class="card">
                    <div class="card-header d-flex align-items-center gap-2">
                        <a href="./appointments.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                        <h5 class="mb-0"> Add Appointment</h5>

                    </div>
                    <div class="card-body table-responsive">



                        <form action="?action=create-appointment" method="post">

                            <h6 class="fw-bold">Barangay</h6>

                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <label for="">Clinic Barangay Family No.</label>
                                    <select name="barangay" class="form-select " required>
                                        <option selected value="" disabled>Select Barangay</option>
                                        <?php foreach ($barangays as $barangay) : ?>
                                            <?php if (isset($_POST['barangay'])) : ?>
                                                <?php if ($_POST['barangay'] == $barangay) : ?>
                                                    <option selected value="<?= $barangay ?>"><?= $barangay ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $barangay ?>"><?= $barangay ?></option>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <option value="<?= $barangay ?>"><?= $barangay ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="text-danger"><?= isset($_SESSION['barangay']) ? $_SESSION['barangay'] : '' ?></p>
                                </div>

                                <div class="col-lg-6">
                                    <label for="">Child's No.</label>
                                    <input type="text" name="child_no" class="form-control " value="<?= isset($_POST['child_no']) ? $_POST['child_no'] : '' ?>">
                                </div>

                            </div>

                            <!-- <h6 class="">Parent</h6> -->

                            <div class="row">

                                <div class="col-lg-6">
                                    <label for="" class="fw-bold">Mother</label>
                                    <div class="row g-2 ">
                                        <div class="col-lg-4">
                                            <input type="text" name="m_lname" class="form-control " value="<?= isset($_POST['m_lname']) ? $_POST['m_lname'] : '' ?>">
                                            <span style="font-size: 13px;">Last Name*</span>
                                            <p class="text-danger"><?= isset($_SESSION['error_m_lname']) ? $_SESSION['error_m_lname'] : '' ?></p>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="m_fname" class="form-control " value="<?= isset($_POST['m_fname']) ? $_POST['m_fname'] : '' ?>">
                                            <span style="font-size: 13px;">First Name*</span>
                                            <p class="text-danger"><?= isset($_SESSION['error_m_fname']) ? $_SESSION['error_m_fname'] : '' ?></p>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="m_mname" class="form-control " value="<?= isset($_POST['m_mname']) ? $_POST['m_mname'] : '' ?>">
                                            <span style="font-size: 13px;">Middle Name</span>
                                        </div>

                                        <!-- <div class="col-lg-6">
                                    <input type="text" name="m_education" class="form-control " value="<?= isset($_POST['m_education']) ? $_POST['m_education'] : '' ?>">
                                    <span style="font-size: 13px;">Educational Level</span>
                                </div> -->

                                        <div class="col-lg-6">
                                            <select name="m_education" class="form-select">
                                                <option value="" selected>Select Educational Level</option>
                                                <option value="No schooling completed" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'No schooling completed' ? 'selected' : '' : '' ?>>No schooling completed</option>
                                                <option value="Elementary" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'Elementary' ? 'selected' : '' : '' ?>>Elementary</option>
                                                <option value="High school, undergrad" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'High school, undergrad' ? 'selected' : '' : '' ?>>High school, undergrad</option>
                                                <option value="High school graduate" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'High school graduate' ? 'selected' : '' : '' ?>>High school graduate</option>
                                                <option value="College, undergrad" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'College, undergrad' ? 'selected' : '' : '' ?>>College, undergrad</option>
                                                <option value="Vocational" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'Vocational' ? 'selected' : '' : '' ?>>Vocational</option>
                                                <option value="Bachelor’s degree" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'Bachelor’s degree' ? 'selected' : '' : '' ?>>Bachelor’s degree</option>
                                                <option value="Master’s degree" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'Master’s degree' ? 'selected' : '' : '' ?>>Master’s degree</option>
                                                <option value="Doctorate degree" <?= isset($_POST['m_education']) ? $_POST['m_education'] == 'Doctorate degree' ? 'selected' : '' : '' ?>>Doctorate degree</option>
                                            </select>
                                            <span style="font-size: 13px;">Educational Level</span>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="text" name="m_occupation" class="form-control " value="<?= isset($_POST['m_occupation']) ? $_POST['m_occupation'] : '' ?>">
                                            <span style="font-size: 13px;">Occupation</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-lg-6">
                                    <label for="" class="fw-bold">Father</label>
                                    <div class="row g-2 ">
                                        <div class="col-lg-4">
                                            <input type="text" name="f_lname" class="form-control " value="<?= isset($_POST['f_lname']) ? $_POST['f_lname'] : '' ?>">
                                            <span style="font-size: 13px;">Last Name*</span>
                                            <p class="text-danger"><?= isset($_SESSION['error_f_lname']) ? $_SESSION['error_f_lname'] : '' ?></p>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="f_fname" class="form-control" value="<?= isset($_POST['f_fname']) ? $_POST['f_fname'] : '' ?>">
                                            <span style="font-size: 13px;">First Name*</span>
                                            <p class="text-danger"><?= isset($_SESSION['error_f_fname']) ? $_SESSION['error_f_fname'] : '' ?></p>
                                        </div>

                                        <div class="col-lg-4">
                                            <input type="text" name="f_mname" class="form-control " value="<?= isset($_POST['f_mname']) ? $_POST['f_mname'] : '' ?>">
                                            <span style="font-size: 13px;">Middle Name</span>
                                        </div>

                                        <div class="col-lg-6">
                                            <select name="f_education" class="form-select">
                                                <option value="" selected>Select Educational Level</option>
                                                <option value="No schooling completed" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'No schooling completed' ? 'selected' : '' : '' ?>>No schooling completed</option>
                                                <option value="Elementary" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'Elementary' ? 'selected' : '' : '' ?>>Elementary</option>
                                                <option value="High school, undergrad" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'High school, undergrad' ? 'selected' : '' : '' ?>>High school, undergrad</option>
                                                <option value="High school graduate" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'High school graduate' ? 'selected' : '' : '' ?>>High school graduate</option>
                                                <option value="College, undergrad" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'College, undergrad' ? 'selected' : '' : '' ?>>College, undergrad</option>
                                                <option value="Vocational" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'Vocational' ? 'selected' : '' : '' ?>>Vocational</option>
                                                <option value="Bachelor’s degree" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'Bachelor’s degree' ? 'selected' : '' : '' ?>>Bachelor’s degree</option>
                                                <option value="Master’s degree" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'Master’s degree' ? 'selected' : '' : '' ?>>Master’s degree</option>
                                                <option value="Doctorate degree" <?= isset($_POST['f_education']) ? $_POST['f_education'] == 'Doctorate degree' ? 'selected' : '' : '' ?>>Doctorate degree</option>
                                            </select>
                                            <span style="font-size: 13px;">Educational Level</span>
                                        </div>

                                        <div class="col-lg-6">
                                            <input type="text" name="f_occupation" class="form-control" value="<?= isset($_POST['f_occupation']) ? $_POST['f_occupation'] : '' ?>">
                                            <span style="font-size: 13px;">Occupation</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <h6 class="fw-bold mb-1 mt-2">Child</h6>

                            <label for="">Name</label>
                            <div class="row g-2">
                                <div class="col-lg-3">
                                    <input type="text" name="c_lname" class="form-control" value="<?= isset($_POST['c_lname']) ? $_POST['c_lname'] : '' ?>" required>
                                    <span style="font-size: 13px;">Last Name*</span>
                                    <p class="text-danger"><?= isset($_SESSION['error_c_lname']) ? $_SESSION['error_c_lname'] : '' ?></p>
                                </div>

                                <div class="col-lg-3">
                                    <input type="text" name="c_fname" class="form-control" value="<?= isset($_POST['c_fname']) ? $_POST['c_fname'] : '' ?>" required>
                                    <span style="font-size: 13px;">First Name*</span>
                                    <p class="text-danger"><?= isset($_SESSION['error_c_fname']) ? $_SESSION['error_c_fname'] : '' ?></p>
                                </div>

                                <div class="col-lg-3">
                                    <input type="text" name="c_mname" class="form-control" value="<?= isset($_POST['c_mname']) ? $_POST['c_mname'] : '' ?>">
                                    <span style="font-size: 13px;">Middle Name</span>
                                </div>

                                <div class="col-lg-3">
                                <!-- <label>Gender*</label> -->
                            <div>
                                <input type="radio" class="form-check-input" name="gender" value="Male" checked>
                                <span class="me-2">Male</span>
                                <input type="radio" class="form-check-input" name="gender" value="Female">
                                <span>Female</span>
                            </div>
                            <span style="font-size: 13px;">Gender *</span>
                                </div>

                            </div>
                            

                            

                            <div class="row g-2">

                                <div class="col-lg-3">
                                    <label>Birth Date*</label>
                                    <input type="date" class="form-control " name="date_birth" value="<?= isset($_POST['date_birth']) ? $_POST['date_birth'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_date_birth']) ? $_SESSION['error_date_birth'] : '' ?></p>
                                </div>

                                <div class="col-lg-3">
                                    <label>Date First Seen*</label>
                                    <input type="date" class="form-control " name="date_seen" value="<?= isset($_POST['date_seen']) ? $_POST['date_seen'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_date_seen']) ? $_SESSION['error_date_seen'] : '' ?></p>
                                </div>

                            

                                <div class="col-lg-2">
                                    <label>Birth Weight*</label>
                                    <input type="text" name="birth_weight" class="form-control " value="<?= isset($_POST['birth_weight']) ? $_POST['birth_weight'] : '' ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_birth_weight']) ? $_SESSION['error_birth_weight'] : '' ?></p>
                                </div>

                                <div class="col-lg-2">
                                    <label>Latest Weight*</label>
                                    <input type="text" name="weight" class="form-control " value="<?= isset($_POST['weight']) ? $_POST['weight'] : '' ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_weight']) ? $_SESSION['error_weight'] : '' ?></p>
                                </div>

                                <div class="col-lg-2 mt-auto">
                                    <label>Latest Height*</label>
                                    <input type="text" name="height" class="form-control " value="<?= isset($_POST['height']) ? $_POST['height'] : '' ?>" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_height']) ? $_SESSION['error_height'] : '' ?></p>
                                </div>

                                <div class="col-lg-3 mt-auto">
                                    <label>Place of Delivery*</label>
                                    <input type="text" name="place_delivery" class="form-control " value="<?= isset($_POST['place_delivery']) ? $_POST['place_delivery'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_place_delivery']) ? $_SESSION['error_place_delivery'] : '' ?></p>
                                </div>

                                <div class="col-lg-3 mt-auto">
                                    <label>Birth Registered at Local Civil Registry (Date)</label>
                                    <input type="date" name="birth_registered" class="form-control " value="<?= isset($_POST['birth_registered']) ? $_POST['birth_registered'] : '' ?>">
                                    <p class="text-danger"><?= isset($_SESSION['error_birth_registered']) ? $_SESSION['error_birth_registered'] : '' ?></p>
                                </div>

                                <div class="col-3 mt-auto">
                                    <label>Complete Address of Family (House No., Street, City/Province)*</label>
                                    <input type="text" name="address" class="form-control " value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_address']) ? $_SESSION['error_address'] : '' ?></p>

                                </div>

                                <div class="col-lg-3 mt-auto">
                                    <label class="fw-bold">Contact Number*</label>
                                    <input type="tel" class="form-control " pattern="[0-9]{12}" maxlength="12" minlength="12" placeholder="+639000000000" name="contact_num" onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" value="<?= isset($_POST['contact_num']) ? $_POST['contact_num'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_contact_num']) ? $_SESSION['error_contact_num'] : '' ?></p>
                                </div>

                                <div class="col-lg-3 mt-auto">
                                    <label class="fw-bold">Date and Time Appointed*</label>
                                    <input type="datetime-local" min="<?= date('Y-m-d 08:00:00') ?>" max="<?= date('05:00:00 PM') ?>" class="form-control " name="date_appoint" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['date_appoint']) ? $_POST['date_appoint'] : '' ?>" required>
                                    <p class="text-danger"><?= isset($_SESSION['error_date_appoint']) ? $_SESSION['error_date_appoint'] : '' ?></p>
                                </div>

                                <div class="col-3 mt-auto">
                                    <label >Recommend Vitamins / Feeding</label>
                                    <input type="text" name="recommendation" class="form-control " value="<?= isset($_POST['recommendation']) ? $_POST['recommendation'] : '' ?>">
                                    <p class="text-danger"><?= isset($_SESSION['error_recommendation']) ? $_SESSION['error_recommendation'] : '' ?></p>

                                </div>

                                <div class="col-3 mt-auto">
                                    <label >Nurse*</label>
                                    <input type="text" name="nurse" class="form-control " value="<?= isset($_POST['nurse']) ? $_POST['nurse'] : $settings['nurse'] ?>" readonly required>
                                    <p class="text-danger"><?= isset($_SESSION['error_nurse']) ? $_SESSION['error_nurse'] : '' ?></p>

                                </div>

                                <div class="col-3 mt-auto">
                                    <label >BHW*</label>
                                    <input type="text" name="bhw" class="form-control " value="<?= isset($_POST['bhw']) ? $_POST['bhw'] : $settings['bhw'] ?>" readonly required>
                                    <p class="text-danger"><?= isset($_SESSION['error_bhw']) ? $_SESSION['error_bhw'] : '' ?></p>

                                </div>

                            </div>

                            <?php if ($message !== null) : ?>
                                <div class="alert alert-success fs-3 py-2">
                                    <?= $message ?>
                                </div>
                            <?php endif; ?>

                            <?php if ($message_error !== null) : ?>
                                <div class="alert alert-danger py-2 fs-3">
                                    <?= $message_error ?>
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Submit</button>

                            <p class="text-success mt-2"><?= isset($success) ? $success : '' ?></p>

                        </form>

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
