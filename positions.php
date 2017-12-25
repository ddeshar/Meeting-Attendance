<?php
$page = 'positions';
$title = 'positions';
$css = <<<EOT
    <!--page level css -->

    <!--end of page level css-->
EOT;
  include 'include/_header.php';
  include 'include/_navbar.php';
  include 'include/_menuleft.php';
?>
      <div class="content-wrapper">
        <?php
          if (isset($_GET['source'])) {
            $source = $_GET['source'];
          } else {
            $source = '';
          }

            if ($source == "product_add") {
              include "include/positions/add_position.php";

            } else if ($source == "product_edit") {
              include "include/positions/edit_position.php";
              
            } else {
              include "include/positions/view_positions.php";
            }
        ?>
      </div>


<?php
  include 'include/_footer.php';
?>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>

</body>
</html>
