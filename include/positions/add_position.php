<?php
  if (isset($_POST["btnsubmit"])) {
    $position_name = $_POST["position_name"];

    $sql = "INSERT INTO positions (position_name) VALUES('$position_name')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='positions.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }
?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">เพิ่ม ตำแหน่ง</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
