<?php
session_start();

require_once('../../db-connect.php');
$name = htmlspecialchars($_POST['user_name']);
$email = htmlspecialchars($_POST['user_email']);
$password = htmlspecialchars($_POST['user_password']);
$user_confirm_password = htmlspecialchars($_POST['user_confirm_password']);


$emali_chek_query ="SELECT COUNT(*) AS 'result' FROM aouths WHERE email = '$email'";
$emali_chek_db = mysqli_query($db_connect,$emali_chek_query);
$emali_chek_result = mysqli_fetch_assoc($emali_chek_db);

$flag = false;

if ($name) {
    $remove_name_space= str_replace(" ","",$name);
    if (ctype_alpha ($remove_name_space)) {
        $_SESSION['old_name']=$name;
    }else {
        $flag=true;
        $_SESSION['name_error'] = 'Invalid Name';
         
    }  
   
}else{
    $flag=true;
    $_SESSION['name_error'] = 'Error Name';
   
}

//email chek

if ($email) {
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
       
        if ($emali_chek_result['result']){
            $flag=true;
            $_SESSION['email_error'] = 'Email Already Exited';
        }
        $_SESSION['new_emil']=$email;   
       $_SESSION['old_email']=$email;
    }else{
        $flag=true;
        $_SESSION['email_error'] = 'Invalid Emali';
    }
      
}else{
    $flag=true;
    $_SESSION['email_error'] = 'Error email';
   
}

//password chek 
 
if ($password ) {

    if (!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)){
        $flag=true;
        $_SESSION['password_error'] = 'Invalid Password';

    }
}else{
    $flag=true;
    $_SESSION['password_error'] = 'Error Password';
   
}

//confirm pass chek

if ($user_confirm_password) {
    if ($user_confirm_password = $password ){
        if (!($password === $user_confirm_password)) {
            $flag=true;
            $_SESSION['confirm_password_error'] = 'Invalid Confirm Password';
        }
    }

}else{
    $flag=true;
    $_SESSION['confirm_password_error'] = 'Error Confirm Password';
   
}
 
if ($flag) {
    header('location:./signup.php');
}else{
    $hashed = sha1($password);
    $admins_query= "INSERT INTO aouths (name,email,password) VALUES ('$name','$email','$hashed')";
     mysqli_query($db_connect,$admins_query);
}
$_SESSION['sign_status']= "Sign Up Successfully,$name ";
header('location:./sign.php');

?>

