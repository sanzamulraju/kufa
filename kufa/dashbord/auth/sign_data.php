<?php
require_once('../../db-connect.php');
session_start();
//email chek
$email = $_POST['email'];
$password = sha1($_POST['password']);

$emali_password_chek_query ="SELECT COUNT(*) AS 'result' FROM aouths WHERE email = '$email' AND password ='$password'";
$emali_password_chek_db = mysqli_query($db_connect,$emali_password_chek_query);
$emali_password_chek_result = mysqli_fetch_assoc($emali_password_chek_db);

//name query

$name_query= "SELECT id,name FROM aouths WHERE email= '$email'";
$name_query_db = mysqli_query($db_connect,$name_query);
$name_query_result = mysqli_fetch_assoc($name_query_db);

$name= $name_query_result ['name'];
$id= $name_query_result ['id'];



$flag=false;

// emali_password_chek_result

if ($emali_password_chek_result['result']) {
    $_SESSION['auth_email']=$email;
    $_SESSION['auth_name']=$name;
    $_SESSION['auth_id']=$id;

    header('location:../admin/index.php');
}else{
    $flag=true;
    $_SESSION['login_error'] = 'Email Not Exited';
    
}


// email shek
if (!$email) {
    
    
    $flag=true;
    $_SESSION['email_exit'] = 'Please Enter Password';
}


//password chek

if (!$password) {
    
    $flag=true;
    $_SESSION['password_exit'] = 'Please Enter Password';
}


if($flag){
    header('location:./sign.php');
}

?>