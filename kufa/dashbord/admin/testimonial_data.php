<?php
require_once('../../db-connect.php');
session_start();
$id = $_SESSION['auth_id'];
$id = $_POST['id_id'];
$name = htmlspecialchars(trim($_POST['name']));
$description = htmlspecialchars(trim($_POST['description']));
$comment = htmlspecialchars(trim($_POST['comment']));
$status = htmlspecialchars(trim($_POST['status']));
$image = $_FILES['image'];

$flag = false;

if (isset($_POST['add_testimonial'])) {
    $id = $_POST['id'];
    if ($name & $description & $comment & $status) {  
        if ($image['name']) {
            $image_name = $image['name'];
            $explode_image_name = explode('.', $image['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $image['tmp_name'];
                $filepath = "../uploads/images/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $testimonial_query = "INSERT INTO testimonials(name, description, comment,image,status) VALUES ('$name', '$description', '$comment', '$new_image_name','$status')";
                mysqli_query($db_connect, $testimonial_query);
                $_SESSION['success'] = 'Testimonial Added Successfully';
                header('location:./testimonial_add.php');
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
        $_SESSION['works_error'] = 'Testimonial Required';
    }
}

if ($flag = true) {
    header('location:./testimonial_add.php');
}

 
if (isset($_POST['update_testimonial'])) {
    $id_id = $_POST['id_id'];
    if ($name & $description & $comment & $status) {
        $testimonial_update_query = "UPDATE testimonials SET name='$name',description='$description',comment='$comment', status='$status' WHERE id='$id'";
        $testimonial_update_bd = mysqli_query($db_connect, $testimonial_update_query);
        $_SESSION['successfull'] = 'Testimonial Update Successfully';
        header("location:./testimonial_update.php?id={$id_id}");
        if ($image['name']) {
            //old image
            $old_image_query = "SELECT image FROM testimonials WHERE id=$id";
            $old_image_query_db = mysqli_query($db_connect, $old_image_query);
            $old_image = mysqli_fetch_assoc($old_image_query_db)['image'];
            $filepath = "../uploads/images/" . $old_image;
            unlink($filepath);
            ///new image
            $image_name = $image['name'];
            $explode_image_name = explode('.', $image['name']);
            $extension = end($explode_image_name);
            if ($extension === 'png' || $extension === 'jpg') {
                $new_image_name = $id . "_" . time() . "." . $extension;
                $tmp_name = $image['tmp_name'];
                $filepath = "../uploads/images/" . $new_image_name;
                move_uploaded_file($tmp_name, $filepath);
                $testimonial_update_query = "UPDATE testimonials SET name='$name',description='$description', comment='$comment', image='$new_image_name',status='$status' WHERE id=$id";
                $testimonial_update_db = mysqli_query($db_connect, $testimonial_update_query);
                print_r($testimonial_update_db);
                $_SESSION['successfull'] = 'Testimonial Update Successfully';
                header("location:./testimonial_update.php?id={$id_id}");
            } else {
                $_SESSION['image_error'] = 'Image Type Error';
                header("location:./testimonial_update.php");
            }
        }
    } else {
        $_SESSION['work_error'] = 'Testimonial Required';
        header("location:./testimonial_update.php");
    }
}
 