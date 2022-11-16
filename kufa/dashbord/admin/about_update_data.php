<?php
require_once('../../db-connect.php');
session_start();
$id = $_SESSION['auth_id'];
$educational_title = $_POST['educational_title'];
$archive_year = $_POST['archive_year'];
$education_prg = $_POST['education_prg'];
$about_status = $_POST['about_status'];
$about_me = $_POST['about_me'];
$ad = $_POST['update_about'];
$add_about = $_POST['update_about'];
$id = $_POST['update_id'];


$flag=false;

if (isset($_POST['update_about'])) {
    $update_id = $_POST['update_id'];
    if ($educational_title & $archive_year) {
        if ($education_prg & $about_status ) {
            
            $about_query= "UPDATE abouts SET educational_title='$educational_title', archive_year='$archive_year', education_prg='$education_prg', about_status='$about_status' WHERE id=$update_id";
            mysqli_query($db_connect,$about_query);
            $_SESSION['success'] = 'About update Successfully';
            header("location:./about_update.php?id={$update_id}");
        } else {
          $flag=true;
        $_SESSION['about_error'] = 'About Required';
        }
    
    } else {
        $flag=true;
        $_SESSION['about_error'] = 'About Required';
    }
}

if ($flag=true) {
    header("location:./about_update.php?id={$update_id}");
    
}

if (isset($_POST['add_about'])) {
    $id = $_POST['id'];
    if ($about_me) {
        $about_query= "UPDATE abouts SET educational_title='$educational_title', archive_year='$archive_year', education_prg='$education_prg', about_status='$about_status',about_me='$about_me' WHERE id=$update_id";
        mysqli_query($db_connect,$about_query);
        $_SESSION['success'] = 'About update Successfully';
        header("location:./about_update.php?id={$update_id}");
    }

}    
