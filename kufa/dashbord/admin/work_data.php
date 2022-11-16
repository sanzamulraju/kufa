<?php
require_once('../../db-connect.php');
session_start();
$id = $_SESSION['auth_id'];
$id = $_POST['id'];
$work_title = htmlspecialchars(trim($_POST['work_title']));
$work_heading = htmlspecialchars(trim($_POST['work_heading']));
$work_description = htmlspecialchars(trim($_POST['work_description']));
$work_status = htmlspecialchars(trim($_POST['work_status']));
$work_img = $_FILES['work_img'];

$flag = false;

if (isset($_POST['add_work'])) {
    $id = $_POST['id'];
    if ($work_title & $work_heading & $work_description) {  
        if ($work_img['name']) {
            $image_name = $work_img['name'];
            $explode_image_name = explode('.', $work_img['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $work_img['tmp_name'];
                $filepath = "../uploads/works/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $admins_query = "INSERT INTO works (work_title, work_heading, work_description,work_status,work_img) VALUES ('$work_title', '$work_heading', '$work_description', '$work_status','$new_image_name')";
                mysqli_query($db_connect, $admins_query);
                $_SESSION['success'] = 'Works Added Successfully';
                header('location:./work_add.php');
            } else {
                $flag = true;
                $_SESSION['img_error'] = 'Image Type Error';
            }
        } else {
            $flag = true;
            $_SESSION['img_error'] = 'image not found';
        }
    }else{
        $flag = true;
        $_SESSION['works_error'] = 'Works Required';
    }
}

if ($flag = true) {
    header('location:./work_add.php');
}


if (isset($_POST['update_work'])) {
    $id = $_POST['id'];
    if ($work_title & $work_heading & $work_description) {
        $work_update_query = "UPDATE works SET work_title='$work_title',work_heading='$work_heading',work_description='$work_description',work_status='$work_status' WHERE id='$id'";
        $work_update_bd = mysqli_query($db_connect, $work_update_query);
        $_SESSION['success'] = 'Works Update Successfully';
        header("location:./work_update.php?id={$id}");
        if ($work_img['name']) {
            //old image
            $old_image_query = "SELECT work_img FROM works WHERE id=$id";
            $old_image_query_db = mysqli_query($db_connect, $old_image_query);
            $old_image = mysqli_fetch_assoc($old_image_query_db)['work_img'];
            $filepath = "../uploads/works/" . $old_image;
            unlink($filepath);
            ///new image
            $image_name = $work_img['name'];
            $explode_image_name = explode('.', $work_img['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $work_img['tmp_name'];
                $filepath = "../uploads/works/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $work_update_query = "UPDATE works SET work_title='$work_title',work_heading='$work_heading',work_description='$work_description',work_status='$work_status',work_img='$new_image_name' WHERE id=$id";
                $work_update_bd = mysqli_query($db_connect, $work_update_query);
                $_SESSION['success'] = 'Works Update Successfully';
                header("location:./work_update.php?id={$id}");
            } else {
                $_SESSION['image_error'] = 'Image Type Error';
                header("location:./work_update.php");
            }
        }
    } else {
        $_SESSION['work_error'] = 'Works Required';
        header("location:./work_update.php");
    }
}
