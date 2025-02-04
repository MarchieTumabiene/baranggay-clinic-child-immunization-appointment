
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/dataTable.js"></script>
  <script src="../assets/js/bootstrap.js"></script>

  <?php 
      if (isset($_GET['logout'])) {
        session_destroy();

        $status = 1;
        $updateStatus = $conn->prepare("UPDATE admin SET status = ? WHERE id = ?");
        $updateStatus->bind_param("ii", $status, $_SESSION['ID']);
        if($updateStatus->execute()){
          ?>
          <script>
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: "Logged out succesfully",
                    showConfirmButton: false,
                    timer: 1500
                  }).then(() => {
                    window.location.href = "https://www.madridejosbarangayimmunization.com/"
                  })
                </script>
          <?php
        }
      }
  ?>
  <script>
    function showMessage(x, y, z) {
        Swal.fire({
            title: `<strong> ${x} </strong>`,
            icon: y,
            showCloseButton: true,
            showCancelButton: true,
            focusConfirm: false,
            confirmButtonText: `Yes`,
            confirmButtonColor: "#0d6efd",
            cancelButtonText: `No`,
            iconColor: '#0d6efd',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = z
            }
        });
    }
  </script>
  <script>
    $(document).ready(function(){
      $("#table").DataTable();
    })
  </script>

</body>
</html>