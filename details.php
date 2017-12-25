<?php
$page = 'details';
$title = 'details';
$css = <<<EOT
    <!--page level css -->
        <link href="assets/css/datetimepicker/bootstrap.css" rel="stylesheet" media="screen">

        <link href="assets/css/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
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

            if ($source == "detail_add") {
              include "include/details/detail_add.php";

            // } else if ($source == "detail_edit") {
            //   include "include/details/detail_edit.php";

            } else if ($source == "check") {
              include "include/details/CheckData.php";

            } else if ($source == "result") {
              include "include/details/Result.php";

            // } else if ($source == "view_times") {
            //   include "include/details/view_times.php";

            } else if ($source == "pdf") {
              include "include/details/_pdf.php";
              
            } else {
              include "include/details/view_all_details.php";
            }
        ?>
      </div>
<?php
  include 'include/_footer.php';
?>

<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
<?php if ($source == "detail_add") { ?>
  <script type="text/javascript" src="assets/js/plugins/datetimepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
  <script type="text/javascript" src="assets/js/plugins/datetimepicker/bootstrap-datetimepicker.th.js" charset="UTF-8"></script>
  <script type="text/javascript">
      $('.form_datetime').datetimepicker({
          language:  'th',
          weekStart: 1,
          todayBtn:  1,
          autoclose: 1,
          todayHighlight: 1,
          startView: 2,
          forceParse: 0,
          format: 'yyyy-mm-dd hh:ii',
          showMeridian: 1,
      }).datepicker("setDate", "0");
  </script>
<?php } ?>
</body>
</html>
