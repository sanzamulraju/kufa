<?php
require_once('../../db-connect.php');
session_start();
$id = $_GET['id'];

$old_image_query = "SELECT brand_img FROM brands WHERE id=$id";
$old_image_query_db = mysqli_query($db_connect, $old_image_query);
$old_image = mysqli_fetch_assoc($old_image_query_db)['brand_img'];
$file_path = "../uploads/brands/" . $old_image;
unlink($file_path);

$brand_delete_query = "DELETE  FROM brands WHERE id='$id'";
$brand_delete_query_db = mysqli_query($db_connect, $brand_delete_query);
header('location:./brand_list.php');