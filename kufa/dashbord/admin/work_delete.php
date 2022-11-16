<?php
require_once('../../db-connect.php');
session_start();
$id = $_GET['id'];

$old_image_query = "SELECT work_img FROM works WHERE id=$id";
$old_image_query_db = mysqli_query($db_connect, $old_image_query);
$old_image = mysqli_fetch_assoc($old_image_query_db)['work_img'];
$file_path = "../uploads/works/" . $old_image;
unlink($file_path);

$work_delete_query = "DELETE  FROM works WHERE id='$id'";
$work_delete_query_db = mysqli_query($db_connect, $work_delete_query);
header('location:./work_list.php');
