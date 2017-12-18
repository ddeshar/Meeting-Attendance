<?php
if (isset($_SESSION['is_user'])) {
    echo "Hello! {$s_login_username} This page is not for you";
    exit;
}else if (isset($_SESSION['is_member'])) {
    echo "Hello! {$s_login_username} This page is not for you";
    exit;
}else if (isset($_SESSION['is_admin'])) {

}
