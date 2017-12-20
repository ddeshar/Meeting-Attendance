<?php
  if (isset($_POST["btnsubmit"])) {
    $subject = $_POST["subject"];
    $agenda = $_POST["agenda"];
    $president = $_POST["president"];
    $date = $_POST["date"];
    $note = $_POST["note"];
    $invite = $_POST['invite'];
    
    $sql = "INSERT INTO detail (subject,`agenda`,`president`,`date`,`note`) VALUES('$subject','$agenda','$president','$date','$note')";
    $result = mysqli_query($conn, $sql);
    
    $last_id = mysqli_insert_id($conn);
    
    $sqlinvite = 'INSERT INTO meeting_mem (meeting_nationalid, meeting_detail_id) VALUES ';
      $tmp = array();
        foreach ($invite as $invite_id => $void) {
          $tmp[] = "($void, $last_id)";
        }
    $sqlinvite .= implode("\n,   ", $tmp).';';    
    $resultinvite = mysqli_query($conn, $sqlinvite);

    if ($resultinvite) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='details.php';";
      echo "</script>";
    }else{
      die("Query Failed " . mysqli_error($conn));
    }
  }
?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">เพิ่ม ข้อมูลวาระการประชุม</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>