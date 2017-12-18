<?php
require_once 'include/permission/admin.php';

  if (isset($_POST["btnsubmit"])) {

    $login_firstname = $_POST['firstname'];
    $login_lastname = $_POST['lastname'];
    $login_username = $_POST['username'];
    $login_password = $_POST['password'];
    $login_email = $_POST['email'];
    $login_status = $_POST['status'];

    //เข้ารหัส รหัสผ่าน
    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $hash_login_password = hash_hmac('sha256', $login_password, $salt);

    $imgFile = $_FILES['avatar']['name'];
    $tmp_dir = $_FILES['avatar']['tmp_name'];
    $imgSize = $_FILES['avatar']['size'];

    $upload_dir = $_SERVER['DOCUMENT_ROOT'].'/assets/images/users/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $avatar = rand(1000,1000000).".".$imgExt;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
      // Check file size '5MB'
      if($imgSize < 5000000)				{
        move_uploaded_file($tmp_dir,$upload_dir.$avatar);
      }
      else{
        $errMSG = "Sorry, your file is too large.";
      }
    }
    else{
      $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    $query = "INSERT INTO tbl_users (firstname,lastname,username,password,email,status,avatar)
    VALUES ('$login_firstname','$login_lastname','$login_username','$hash_login_password','$login_email','$login_status','$avatar')";
    
    // echo $query; exit;
    
    $result = mysqli_query($conn,$query);

    if ($result) {
      echo "<script type='text/javascript'>";
      echo "alert('เพิมเสร็จแล้ว');";
      echo "window.location='user.php';";
      echo "</script>";
    }else{
      die("Query Failed" . mysqli_error($conn));
    }
    
  }

?>
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h3 class="card-title">Add User555</h3>
      <div class="card-body">
        <form action="" method="post" class="form-horizontal" enctype="multipart/form-data">
          <div class="form-group">
            <label class="control-label col-md-3">Firstname :</label>
            <div class="col-md-8">
              <input class="form-control" name="firstname" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Lastname :</label>
            <div class="col-md-8">
              <input class="form-control" name="lastname" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Username :</label>
            <div class="col-md-8">
              <input class="form-control" name="username" type="text">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">Password :</label>
            <div class="col-md-8">
              <input class="form-control col-md-8" name="password" type="password">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3">E-mail :</label>
            <div class="col-md-8">
              <input class="form-control" name="email" type="email">
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label" for="select">Status</label>
            <div class="col-lg-8">
              <select class="form-control" name="status" id="select">
                <option value="0" >user</option>
                <option value="100" >member</option>
                <option value="500" >admin</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-3">Avatar :</label>
            <div class="col-md-8">
              <input class="form-control" name="avatar" type="file">
            </div>
          </div>

          <div class="card-footer">
            <div class="row">
              <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary icon-btn" type="submit" name="btnsubmit" value="send"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add User</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
