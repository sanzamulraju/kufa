<?php
require_once('../../db-connect.php');
session_start();
$service_title = $_POST['service_title'];
$service_icon = $_POST['service_icon'];
$service_description = $_POST['service_description'];
$service_status = $_POST['service_status'];

$flag=false;

if ($service_title & $service_icon) {
    if ($service_description & $service_status) {
        $admins_query= "INSERT INTO services (service_title, service_icon, service_description,service_status) VALUES ('$service_title', '$service_icon', '$service_description', '$service_status')";
        mysqli_query($db_connect,$admins_query);
        $_SESSION['success'] = 'Service Added Successfully';
        header('location:./service_add.php');
    } else {
      $flag=true;
    $_SESSION['service_error'] = 'Services Required';
    }

} else {
    $flag=true;
    $_SESSION['service_error'] = 'Services Required';
}
if ($flag=true) {
    header('location:./service_add.php');
    
}

   
