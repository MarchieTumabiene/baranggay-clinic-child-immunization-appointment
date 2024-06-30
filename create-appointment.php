<?php
require './partials/header.php';
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

                    <form action="?action=create-appointment" method="post">

                        <label class="fw-bold">Parent Name</label>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <input type="text" name="p_lname" class="form-control " value="<?= isset($_POST['p_lname']) ? $_POST['p_lname'] : '' ?>">
                                <span style="font-size: 13px;">Last Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_p_lname']) ? $_SESSION['error_p_lname'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="p_fname" class="form-control " value="<?= isset($_POST['p_fname']) ? $_POST['p_fname'] : '' ?>">
                                <span style="font-size: 13px;">First Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_p_fname']) ? $_SESSION['error_p_fname'] : '' ?></p>
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="p_mname" class="form-control mt-3" value="<?= isset($_POST['p_mname']) ? $_POST['p_mname'] : '' ?>">
                                <span style="font-size: 13px;">Middle Name</span>
                            </div>
                        </div>

                        <label class="fw-bold">Child Name</label>
                        <div class="row my-3">
                            <div class="col-lg-6">
                                <input type="text" name="c_lname" class="form-control" value="<?= isset($_POST['c_lname']) ? $_POST['c_lname'] : '' ?>">
                                <span style="font-size: 13px;">Last Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_c_lname']) ? $_SESSION['error_c_lname'] : '' ?></p>
                            </div>

                            <div class="col-lg-6">
                                <input type="text" name="c_fname" class="form-control" value="<?= isset($_POST['c_fname']) ? $_POST['c_fname'] : '' ?>">
                                <span style="font-size: 13px;">First Name*</span>
                                <p class="text-danger"><?= isset($_SESSION['error_c_fname']) ? $_SESSION['error_c_fname'] : '' ?></p>
                            </div>

                            <div class="col-lg-12">
                                <input type="text" name="c_mname" class="form-control mt-3" value="<?= isset($_POST['c_mname']) ? $_POST['c_mname'] : '' ?>">
                                <span style="font-size: 13px;">Middle Name</span>
                            </div>
                        </div>

                        <label class="fw-bold">Immunization Date</label>
                        <input type="date" class="form-control my-2" name="date" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['date']) ? $_POST['date'] : '' ?>">
                        <p class="text-danger"><?= isset($_SESSION['error_date']) ? $_SESSION['error_date'] : '' ?></p>

                        <label class="fw-bold">Email Account</label>
                        <input type="email" class="form-control my-2" name="email" min="<?= date('Y-m-d') ?>" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
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
