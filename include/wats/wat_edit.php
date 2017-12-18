<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $pid = $_POST["pid"];
    $wat_name = $_POST["wat_name"];

    $sql = "UPDATE wats SET wat_name='$wat_name' WHERE wat_id='$pid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขสินค้าสำเร็จ');";
      echo "window.location='wats.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }else{
    $wat_id = $_GET["id"];
    $sql = "SELECT * FROM wats WHERE wat_id='$wat_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pid = $row["wat_id"];
      $wat_name = $row["wat_name"];
    }else{
      $pid = "";
      $wat_name = "";
    }
  }
?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">แก้ ชื่อวัด</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
