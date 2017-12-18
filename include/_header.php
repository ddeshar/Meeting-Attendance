<?php
	include "dbconnect.php";
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include 'session.php';
?>
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
        <style>
            th, td, p, a, h1, h2, h3,h4,h5,h6, .h2{
                font-family: 'Kanit', sans-serif !important;
                /* line-height: 1.6em; */
            }
            a{
                /* font-size: 1.4em; */
            }
            label{
                /* font-size: 1.6em; */
                /* display: block; */
            }
        </style>
		<!-- end of global css -->
		<?php echo isset ($css) ?  $css : '' ?>
    <title><?php echo $title; ?> | Newa Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    -->
  </head>
