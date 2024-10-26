<?php 
    require './partials/header.php';

echo "hello world";
    
        $reference_id = $_SESSION['REFERENCE_ID'];

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
            a.reference_id = '$reference_id'
        ");
      

    ?>
    <?php require './partials/navbar.php' ?>

    <div class="container">
        <?php 
            if (isset($_GET['view'])) {
                $view = $_GET['view'];
                if ($view == "immunization") {
                    require 'immunization-card.php';
                }else if ($view == 'child') {
                    require 'data-card.php';
                }
            }else{
                require 'immunization-card.php';
            }
        ?>
    </div>
    
<?php
require './partials/footer.php';
