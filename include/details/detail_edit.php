<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $pid        = $_POST["pid"];
    $subject    = $_POST["subject"];
    $agenda     = $_POST["agenda"];
    $president  = $_POST["president"];
    $date       = $_POST["date"];
    $note       = $_POST["note"];

    $sql = "UPDATE detail SET `subject`='$subject',`agenda`='$agenda',`president`='$president',`date`='$date',`note`='$note' WHERE detail_id='$pid'";
    // echo $sql, exit;
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขสินค้าสำเร็จ');";
      echo "window.location='details.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }else{
    $detail_id = $_GET["id"];
    $sql = "SELECT * FROM detail WHERE detail_id='$detail_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pid        = $row["detail_id"];
      $subject    = $row["subject"];
      $agenda     = $row["agenda"];
      $president  = $row["president"];
      $date       = $row["date"];
      $note       = $row["note"];
    }else{
      $pid        = "";
      $subject    = "";
      $agenda     = "";
      $president  = "";
      $date       = "";
      $note       = "";;
    }
  }
?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">แก้ ข้อมูลวาระการประชุม</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
