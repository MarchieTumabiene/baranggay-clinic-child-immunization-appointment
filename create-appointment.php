<?php
require './partials/header.php';
$message = null;
if (isset($_GET['message'])) {
    $message = $_GET['message'];
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
    "Kangwayan"
  ];
?>
<div class="container-fluid">

    <div class="row">

        <?php require './partials/sidebar.php' ?>

        <div class="col-lg-10 p-4" style="max-height: 100vh; overflow-y: auto;">

            <div class="card">
                <div class="card-header d-flex align-items-center gap-2">
                    <a href="./appointments.php" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                    <h5 class="mb-0"> Add Appointment</h5>

                </div>
                <div class="card-body table-responsive">

                    <?php if($message !== null): ?>
                        <div class="alert alert-success py-2">
                            <?= $message ?>
                        </div>
                    <?php endif; ?>

                    <form action="?action=create-appointment" method="post">

                        <h6 class="fw-bold">Barangay</h6>

                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Clinic Barangay Family No.</label>
                                <select name="barangay" class="form-select my-3" required>
                                    <option selected value="" disabled>Select Barangay</option>
                                    <?php foreach($barangays as $barangay): ?>
                                        <option value="<?= $barangay ?>"><?= $barangay ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p class="text-danger"><?= isset($_SESSION['barangay']) ? $_SESSION['barangay'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <label for="">Child's No.</label>
                                <input type="text" name="child_no" class="form-control my-3">
                            </div>

                        </div>

                        <h6 class="">Parent</h6>

                        <label for="" class="fw-bold">Mother</label>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <input type="text" name="m_lname" class="form-control " value="<?= isset($_POST['m_lname']) ? $_POST['m_lname'] : '' ?>">
                                <span style="font-size: 13px;">Last Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_m_lname']) ? $_SESSION['error_m_lname'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="m_fname" class="form-control " value="<?= isset($_POST['m_fname']) ? $_POST['m_fname'] : '' ?>">
                                <span style="font-size: 13px;">First Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_m_fname']) ? $_SESSION['error_m_fname'] : '' ?></p>
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="m_mname" class="form-control mt-3" value="<?= isset($_POST['m_mname']) ? $_POST['m_mname'] : '' ?>">
                                <span style="font-size: 13px;">Middle Name</span>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="m_education" class="form-control mt-3" value="<?= isset($_POST['m_education']) ? $_POST['m_education'] : '' ?>">
                                <span style="font-size: 13px;">Educational Level</span>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="m_occupation" class="form-control mt-3" value="<?= isset($_POST['m_occupation']) ? $_POST['m_occupation'] : '' ?>">
                                <span style="font-size: 13px;">Occupation</span>
                            </div>
                        </div>

                        <label for="" class="fw-bold">Father</label>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <input type="text" name="f_lname" class="form-control " value="<?= isset($_POST['f_lname']) ? $_POST['f_lname'] : '' ?>">
                                <span style="font-size: 13px;">Last Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_f_lname']) ? $_SESSION['error_f_lname'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="f_fname" class="form-control " value="<?= isset($_POST['f_fname']) ? $_POST['f_fname'] : '' ?>">
                                <span style="font-size: 13px;">First Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_f_fname']) ? $_SESSION['error_f_fname'] : '' ?></p>
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="f_mname" class="form-control mt-3" value="<?= isset($_POST['f_mname']) ? $_POST['f_mname'] : '' ?>">
                                <span style="font-size: 13px;">Middle Name</span>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="f_education" class="form-control mt-3" value="<?= isset($_POST['f_education']) ? $_POST['f_education'] : '' ?>">
                                <span style="font-size: 13px;">Educational Level</span>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="f_occupation" class="form-control mt-3" value="<?= isset($_POST['f_occupation']) ? $_POST['f_occupation'] : '' ?>">
                                <span style="font-size: 13px;">Occupation</span>
                            </div>
                        </div>

                        <h6 class="fw-bold">Child</h6>

                        <label for="">Name</label>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <input type="text" name="c_lname" class="form-control" value="<?= isset($_POST['c_lname']) ? $_POST['c_lname'] : '' ?>" required>
                                <span style="font-size: 13px;">Last Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_c_lname']) ? $_SESSION['error_c_lname'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="c_fname" class="form-control" value="<?= isset($_POST['c_fname']) ? $_POST['c_fname'] : '' ?>" required>
                                <span style="font-size: 13px;">First Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_c_fname']) ? $_SESSION['error_c_fname'] : '' ?></p>
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="c_mname" class="form-control mt-3" value="<?= isset($_POST['c_mname']) ? $_POST['c_mname'] : '' ?>">
                                <span style="font-size: 13px;">Middle Name</span>
                            </div>
                        </div>

                        <label>Gender*</label>
                        <div class="my-3">
                            <input type="radio" class="form-check-input" name="gender" value="Male" checked>
                            <span class="me-2">Male</span>
                            <input type="radio" class="form-check-input" name="gender" value="Female">
                            <span>Female</span>
                        </div>

                        <label>Date First Seen*</label>
                        <input type="date" class="form-control my-3" name="date_seen" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['date_seen']) ? $_POST['date_seen'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_date_seen']) ? $_SESSION['error_date_seen'] : '' ?></p>

                        <label>Birth Date*</label>
                        <input type="date" class="form-control my-3" name="date_birth" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['date_birth']) ? $_POST['date_birth'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_date_birth']) ? $_SESSION['error_date_birth'] : '' ?></p>


                        <label>Birth Weight*</label>
                        <input type="text" name="birth_weight" class="form-control my-3" value="<?= isset($_POST['birth_weight']) ? $_POST['birth_weight'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_birth_weight']) ? $_SESSION['error_birth_weight'] : '' ?></p>

                        <label>Place of Delivery*</label>
                        <input type="text" name="place_delivery" class="form-control my-3" value="<?= isset($_POST['place_delivery']) ? $_POST['place_delivery'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_place_delivery']) ? $_SESSION['error_place_delivery'] : '' ?></p>

                        <label>Birth Registered at Local Civil Registry (Date)</label>
                        <input type="date" name="birth_registered" class="form-control my-3" value="<?= isset($_POST['birth_registered']) ? $_POST['birth_registered'] : '' ?>">
                        <p class="text-danger"><?= isset($_SESSION['error_birth_registered']) ? $_SESSION['error_birth_registered'] : '' ?></p>

                        <label>Complete Address of Family (House No., Street, City/Province)*</label>
                        <input type="text" name="address" class="form-control my-3" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_address']) ? $_SESSION['error_address'] : '' ?></p>

                        <label class="fw-bold">Email Account*</label>
                        <input type="email" class="form-control my-3" name="email" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" required>
                        <p class="text-danger"><?= isset($_SESSION['error_email']) ? $_SESSION['error_email'] : '' ?></p>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        <p class="text-success mt-2"><?= isset($success) ? $success : '' ?></p>

                    </form>

                </div>
            </div>

        </div>

    </div>

</div>
<?php
require './partials/footer.php';
