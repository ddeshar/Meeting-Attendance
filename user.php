<?php
$page = 'user';
$title = 'user';
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

          switch ($source) {
            case 'user_add';
            include "include/users/user_add.php";
            break;

            case 'user_edit':
            include "include/users/user_edit.php";
            break;

            default:
            include "include/users/view_all_users.php";
            break;
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
