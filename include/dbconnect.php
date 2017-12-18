<?php
  $host = "localhost";
  $username = "root";
  $pass = "";
  $dbname = "php_meeting";

  $conn = mysqli_connect($host,$username,$pass,$dbname);

  if (mysqli_connect_errno()) {
    echo "Failed to Connect : " .mysqli_connect_errno();
  }
  mysqli_set_charset($conn, 'utf8');
  date_default_timezone_set("Asia/Bangkok");
