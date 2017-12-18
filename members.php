<?php
$page = 'members';
$title = 'members';
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

          switch ($source) {
            case 'add_member';
            include "include/members/member_add.php";
            break;

            case 'edit_member':
            include "include/members/member_edit.php";
            break;
                        
            case 'member_detail':
            include "include/members/member_detail.php";
            break;

            case 'wat':
            include "include/members/view_all_members.php";
            break;
            
            case 'position':
            include "include/members/view_all_members.php";
            break;
            
            default:
            include "include/members/view_all_members.php";
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
        yearOffset:543
    }).datepicker("setDate", "0");
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript">

    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
</script>



</body>
</html>
