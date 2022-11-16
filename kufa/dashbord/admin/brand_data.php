<?php
require_once('../../db-connect.php');
session_start();
$id = $_SESSION['auth_id'];
//$id = $_POST['id'];
$brand_status = htmlspecialchars(trim($_POST['brand_status']));
$brand_img = $_FILES['brand_img'];

$flag = false;

if (isset($_POST['add_brand'])) {
    //$id = $_POST['id'];
        if ($brand_img['name']) {
            $image_name = $brand_img['name'];
            $explode_image_name = explode('.', $brand_img['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $brand_img['tmp_name'];
                $filepath = "../uploads/brands/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $admins_query = "INSERT INTO brands (brand_status,brand_img) VALUES ('$brand_status','$new_image_name' )";
                mysqli_query($db_connect, $admins_query);
                $_SESSION['success'] = 'Brand Image Added Successfully';
                header('location:./brand_add.php');
            } else {
                $flag = true;
                $_SESSION['img_error'] = 'Image Type Error';
            }
        } else {
            $flag = true;
            $_SESSION['img_error'] = 'image not found';
        }
    
}

//if ($flag = true) {
    header('location:./brand_add.php');
//}

 
if (isset($_POST['update_brand'])) {
    $id = $_POST['id'];
        if ($brand_img['name']) {
            //old image
            $old_image_query = "SELECT brand_img FROM brands WHERE id=$id";
            $old_image_query_db = mysqli_query($db_connect, $old_image_query);
            $old_image = mysqli_fetch_assoc($old_image_query_db)['brand_img'];
            $filepath = "../uploads/brands/" . $old_image;
            unlink($filepath);
            ///new image
            $image_name = $brand_img['name'];
            $explode_image_name = explode('.', $brand_img['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $brand_img['tmp_name'];
                $filepath = "../uploads/brands/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $brand_update_query = "UPDATE brands SET brand_status='$brand_status',brand_img='$new_image_name' WHERE id=$id";
                $brand_update_bd = mysqli_query($db_connect, $brand_update_query);
                $_SESSION['success'] = 'brand Update Successfully';
                header("location:./brand_update.php?id={$id}");
            } else {
                $_SESSION['image_error'] = 'Image Type Error';
                header("location:./brand_update.php");
            }
        }
    } 

 