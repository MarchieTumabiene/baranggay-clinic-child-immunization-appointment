<div class="p-4">
    <div class="card">
        <div class="card-body">
            <h5>Child Info</h5>
            <?php 
                $child_name = $row['child'];
                $mother_name = $row['mother'];
                $dob = new DateTime($row['date_birth']);
                $today   = new DateTime('today');
                $year = $dob->diff($today)->y;
                $month = $dob->diff($today)->m;
                $day = $dob->diff($today)->d;
                $age = $year."year".", " . $month."months"." ".$day."days";
                $weight = $row['weight'];
                $height = $row['height'];
                $bhw = $row['bhw'];
                $barangay = $row['barangay'];
            ?>

            <div class="d-flex gap-2">
                <div>
                    <p>Name</p>
                    <p>Age</p>
                    <p>Weight</p>
                    <p>Height</p>
                    <p>Mother</p>
                    <p>Barangay</p>
                    <p>BHW</p>
                </div>
                <div>
                    <p>: <?= $child_name ?></p>
                    <p>: <?= $age ?></p>
                    <p>: <?= $weight ?> kl</p>
                    <p>: <?= $height ?> cm</p>
                    <p>: <?= $mother_name ?></p>
                    <p>: <?= $barangay ?></p>
                    <p>: <?= $settings['bhw'] ?? '' ?></p>
                </div>
            </div>
        </div>
    </div>
</div>