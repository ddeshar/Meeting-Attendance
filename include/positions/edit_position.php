<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $pid = $_POST["pid"];
    $position_name = $_POST["position_name"];

    $sql = "UPDATE positions SET position_name='$position_name' WHERE position_id='$pid'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขสินค้าสำเร็จ');";
      echo "window.location='positions.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }else{
    $position_id = $_GET["id"];
    $sql = "SELECT * FROM positions WHERE position_id='$position_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
      $pid = $row["position_id"];
      $position_name = $row["position_name"];
    }else{
      $pid = "";
      $position_name = "";
    }
  }
?>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">แก้ ตำแหน่ง</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
