<?php
$page = 'members';
$title = 'members';
$css = <<<EOT
    <!--page level css -->
        <link href="assets/css/datepicker.css" rel="stylesheet" media="screen">
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

            if ($source == "add_member") {
              include "include/members/member_add.php";

            } else if($source == "edit_member"){
              include "include/members/member_edit.php";

            } else if($source == "member_detail"){
              include "include/members/member_detail.php";

            }else if($source == "position" && $source == "wat"){
              include "include/members/view_all_members.php";

            }else{
              include "include/members/view_all_members.php";
            }
          
        ?>
      </div>


<?php
  include 'include/_footer.php';
?>
<script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<?php 
echo $source;
if($source == "add_member" || $source == "edit_member"){ ?>
  <!-- preview pic before upload -->
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
  <!-- Thai date picker -->
    <script src="assets/js/plugins/datepicker/bootstrap-datepicker-custom.js"></script>
    <script src="assets/js/plugins/datepicker/locales/bootstrap-datepicker.th.min.js" charset="UTF-8"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: true,
                todayBtn: true,
                language: 'th',             //เปลี่ยน label ต่างของ ปฏิทิน ให้เป็น ภาษาไทย   (ต้องใช้ไฟล์ bootstrap-datepicker.th.min.js นี้ด้วย)
                thaiyear: true              //Set เป็นปี พ.ศ.
            });  //กำหนดเป็นวันปัจุบัน
            // }).datepicker("setDate", "0");  //กำหนดเป็นวันปัจุบัน
        });
    </script>
<?php } ?>  
</body>
</html>
