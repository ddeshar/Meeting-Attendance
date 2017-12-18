<?php
require 'include/dbconnect.php';

  if(isset($_POST['btn-login'])){

    $login_username = mysqli_real_escape_string($conn,$_POST['username']);
    $login_password = mysqli_real_escape_string($conn,$_POST['password']);

    $salt = 'tikde78uj4ujuhlaoikiksakeidke';
    $hash_login_password = hash_hmac('sha256', $login_password, $salt);

    $sql = "SELECT * FROM tbl_users WHERE username=? AND password=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt,"ss", $login_username,$hash_login_password);
    mysqli_execute($stmt);
    $result_user = mysqli_stmt_get_result($stmt);

    if ($result_user->num_rows == 1) {
        session_start();
        $row_user = mysqli_fetch_array($result_user,MYSQLI_ASSOC);
        $_SESSION['user_id'] = $row_user['user_id'];

        if ($row_user['status'] == 500) {
          $_SESSION['is_admin'] = 500;
          $_SESSION['login_username'] = $row_user['login_username'];
          $_SESSION['avatar'] = $row_user['avatar'];
          header("Location: admin.php");

        }elseif ($row_user['status'] == 100) {
          $_SESSION['is_member'] = 100;
          $_SESSION['login_username'] = $row_user['login_username'];
          $_SESSION['avatar'] = $row_user['avatar'];
          header("Location: member.php");

        }elseif ($row_user['status'] == 0) {
          $_SESSION['is_user'] = 0;
          $_SESSION['login_username'] = $row_user['login_username'];
          $_SESSION['avatar'] = $row_user['avatar'];
          header("Location: user.php");
        }
    } else{
      // $error = "die('Query Failed' . mysqli_error($conn))";

      $error =  "sorry ผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Vali Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Newa</h1>
      </div>
      <div class="login-box">
        <form class="login-form" action="index.php" method="post">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ลงชื่อเข้าใช้</h3>
          
          <div class="form-group">
            <label class="control-label">ชื่อผู้ใช้</label>
            <input class="form-control" name="username" type="text" placeholder="Email" autofocus>
          </div>
          <div class="form-group">
            <label class="control-label">รหัสผ่าน</label>
            <input class="form-control" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label class="semibold-text">
                  <input type="checkbox"><span class="label-text">อยู่ในระบบ</span>
                </label>
              </div>
              <!-- <p class="semibold-text mb-0"><a data-toggle="flip">Forgot Password ?</a></p> -->
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" name="btn-login"><i class="fa fa-sign-in fa-lg fa-fw"></i>ลงชื่อเข้าใช้</button>
          </div>
        </form>
        <form class="forget-form" action="#">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email">
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
          </div>
          <div class="form-group mt-20">
            <p class="semibold-text mb-0"><a data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>
  </body>
  <script src="assets/js/jquery-2.1.4.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/plugins/pace.min.js"></script>
  <script src="assets/js/main.js"></script>
</html>
