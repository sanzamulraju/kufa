<?php
require_once('../../db-connect.php');
session_start();
$educational_title = $_POST['educational_title'];
$archive_year = $_POST['archive_year'];
$education_prg = $_POST['education_prg'];
$about_status = $_POST['about_status'];
$about_me = $_POST['about_me'];




$flag=false;

    if ($educational_title & $archive_year) {
        if ($education_prg & $about_status & $about_me) {
            $about_query= "INSERT INTO abouts (educational_title, archive_year, education_prg,about_status,about_me) VALUES ('$educational_title', '$archive_year', '$education_prg', '$about_status','$about_me')";
            mysqli_query($db_connect,$about_query);
            $_SESSION['success'] = 'About Added Successfully';
            header('location:./about_add.php');
        } else {
          $flag=true;
        $_SESSION['about_error'] = 'About Required';
        }
    
    } else {
        $flag=true;
        $_SESSION['about_error'] = 'About Required';
    }


if ($flag=true) {
    header('location:./about_add.php');
    
}

   
