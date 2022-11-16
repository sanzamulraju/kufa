<?php
require_once('../../db-connect.php');
session_start();

$facts_icon = $_POST['facts_icon'];
$facts_description = $_POST['facts_discription'];
$facts_status = $_POST['fact_stasuts'];

$flag=false;

if ($facts_icon & $facts_description & $facts_status) {

        $admins_query= "INSERT INTO facts (facts_icon, facts_discription, fact_stasuts) VALUES ( '$facts_icon', '$facts_description', '$facts_status')";
        mysqli_query($db_connect,$admins_query);
        $_SESSION['success'] = 'Facts Added Successfully';
        header('location:./fact_add.php');


} else {
    $flag=true;
    $_SESSION['service_error'] = 'Fact Required';
}
if ($flag=true) {
    header('location:./fact_add.php');
    
}

   
