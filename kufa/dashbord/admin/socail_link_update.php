<?php

require_once('../../db-connect.php');
session_start();
$id =  $_SESSION['auth_id'];
$facebook = htmlspecialchars(trim($_POST['facebook']));
$twitter = htmlspecialchars(trim($_POST['twitter']));
$instagram =  htmlspecialchars(trim($_POST['instagram']));
$linkedin =  htmlspecialchars(trim($_POST['linkedin']));

$flag = false;

if ($facebook & $twitter & $instagram & $linkedin) {
    if (filter_var($facebook & $twitter & $instagram & $linkedin, FILTER_VALIDATE_URL)) {
    }
} else {
    $flag = true;
    $_SESSION['socail_links_error'] = 'Please Enter Link';
}
if ($flag) {
    header('location:./socail_links.php');
} else {
    $social_link_update_query = "UPDATE aouths SET facebook='$facebook',twitter='$twitter',instagram='$instagram',linkedin='$linkedin' WHERE id='$id'";
    $social_link_update_bd = mysqli_query($db_connect, $social_link_update_query);
    $_SESSION['success'] = 'Social Links Update Successfully';
    header('location:./socail_links.php');
}
