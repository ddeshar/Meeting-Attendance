<?php
  if (isset($_POST["btnsubmit"])) {
    $nationalid = $_POST["nationalid"];
    $wat = $_POST["wat"];
    $position = $_POST["position"];
    $name = $_POST["name"];
    $chaya = $_POST["chaya"];
    $lastname = $_POST["lastname"];
    $dob = $_POST["dob"];
    $dou = $_POST["dou"];
    $img = $_FILES["photo"]["name"];

    if($img){
      $upload_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/'; // upload directory
      $tmp_dir = $_FILES['photo']['tmp_name'];
      
      $temp = explode(".", $_FILES["photo"]["name"]);
      $newfilename = round(microtime(true)) . '.' . end($temp);
      move_uploaded_file($tmp_dir,$upload_dir.$newfilename);
    }else{
      $newfilename = "";
    }

    $sql = "INSERT INTO members (`nationalid`, `wat`, `position`, `name`, `chaya`, `lastname`, `dob`, `dou`, `photo`) VALUES('$nationalid','$wat','$position','$name','$chaya','$lastname','$dob','$dou','$newfilename')";
    // echo $sql; exit;
    $result = mysqli_query($conn, $sql);

    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='members.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
  }
?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">เพิ่ม สมาชิก</h3>
      <div class="card-body">
        <?php include_once '_form.php'; ?>
      </div>
    </div>
  </div>
</div>
