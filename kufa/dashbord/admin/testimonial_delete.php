<?php
require_once('../../db-connect.php');
session_start();
$id = $_GET['id'];

$old_image_query = "SELECT image FROM testimonials WHERE id=$id";
$old_image_query_db = mysqli_query($db_connect, $old_image_query);
$old_image = mysqli_fetch_assoc($old_image_query_db)['image'];
$file_path = "../uploads/images/" . $old_image;
unlink($file_path);

$testimonial_delete_query = "DELETE  FROM testimonials WHERE id='$id'";
$testimonial_delete_query_db = mysqli_query($db_connect, $testimonial_delete_query);
header('location:./testimonial_list.php');
