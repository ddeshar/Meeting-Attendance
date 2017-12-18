<?php
  require_once 'include/permission/admin.php';
  // Form Submit
  if (isset($_POST["btnEdit"])) {
    $pid        = $_POST["pid"];
    $nationalid = $_POST["nationalid"];
    $wat        = $_POST["wat"];
    $position   = $_POST["position"];
    $name       = $_POST["name"];
    $chaya      = $_POST["chaya"];
    $lastname   = $_POST["lastname"];
    $dob        = $_POST["dob"];
    $dou        = $_POST["dou"];
    $imgFile        = $_FILES["photo"]["name"];

    if($imgFile){
      $temp = explode(".", $_FILES["photo"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      $tmp_dir = $_FILES['photo']['tmp_name'];
      $upload_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/'; // upload directory
      move_uploaded_file($tmp_dir,$upload_dir.$newfilename);
      
      $qry=mysqli_query($conn,"SELECT photo FROM members WHERE nationalid = '$pid'");
      $row=mysqli_fetch_assoc($qry);
      $delimg = $row['photo'];
      move_uploaded_file($tmp_dir,$upload_dir.$newfilename);
      unlink($upload_dir.$delimg);
    }else{
      $query = "SELECT photo FROM members WHERE nationalid = '$pid'";
      $select_image = mysqli_query($conn,$query);
        while($row = mysqli_fetch_array($select_image)) {
          $newfilename = $row['photo'];
        }
    }

    $sql = "UPDATE `members` SET `wat` = '$wat', `position` = '$position', `name` = '$name', `chaya` = '$chaya', `lastname` = '$lastname', `dob` = '$dob', `dou` = '$dou', `photo` = '$newfilename' WHERE `members`.`nationalid` = '$pid'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('แก้ไขสินค้าสำเร็จ');";
      echo "window.location='members.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }else{
    $nationalid = $_GET["id"];
    $sql = "SELECT
              wats.wat_name,
              positions.position_name,
              members.nationalid,
              members.`name`,
              members.chaya,
              members.lastname,
              members.photo,
              members.position,
              members.wat,
              members.dob,
              members.dou
            FROM
              members
            INNER JOIN positions ON members.position = positions.position_id
            INNER JOIN wats ON members.wat = wats.wat_id
            WHERE members.nationalid = '$nationalid'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_array($result);
          $national_id  = $row["nationalid"];
          $name         = $row["name"];
          $chaya        = $row["chaya"];
          $lastname     = $row["lastname"];
          $watid          = $row["wat"];
          $wat          = $row["wat_name"];
          $positionid     = $row["position"];
          $position     = $row["position_name"];
          $dob          = $row["dob"];
          $dou          = $row["dou"];
          $photo     = $row["photo"];
          $pid          = $row["nationalid"];
    }else{
          $national_id  = "";
          $name         = "";
          $chaya        = "";
          $lastname     = "";
          $watid        = "";
          $positionid   = "";
          $wat          = "";
          $position     = "";
          $dob          = "";
          $dou          = "";
          $photo     = "";
          $pid          = "";
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
