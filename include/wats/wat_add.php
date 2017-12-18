<?php
  if (isset($_POST["btnsubmit"])) {
    $wat_name = $_POST["wat_name"];

    $sql = "INSERT INTO wats (wat_name) VALUES('$wat_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='wats.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }
?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">เพิ่ม ชื่อวัด</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
