<?php
require_once('../db-connect.php');
session_start();
$name=$_POST['name'];
$id = $_SESSION['auth_id'];


$flag=false;

if (isset($_POST['update'])) {
    $name=$_POST['name'];
    $phone_number=$_POST['phone_number'];
    $adress= $_POST['adress'];

    if ($name) {
        $remove_name_space= str_replace(" ","",$name);
        if (!ctype_alpha ($remove_name_space)) {
            $flag=true;
            $_SESSION['name_error'] = 'Invalid Name';   
        }  
       
    }else{
        $flag=true;
        $_SESSION['name_error'] = 'Enter Your Name';
    }
    if ($_FILES['profile_pic']['name'] != '') {
        $image_name= $_FILES['profile_pic']['name'];
        $explode_image_name = explode('.',$image_name);
        $extension = end( $explode_image_name);
        $new_image_name = $id.'.'.$extension;
        $tem_path = $_FILES['profile_pic']['tmp_name'];
        $file_path = './uploads/profile/'.$new_image_name; 
        move_uploaded_file($tem_path,$file_path);
        $profile_pic_update_query = "UPDATE aouths SET profile_pic='$new_image_name' WHERE id='$id'";
        $profile_pic_update_bd = mysqli_query($db_connect,$profile_pic_update_query);
        header('location:./admin/profile.php');
        

    }
    if ($phone_number & $adress) {
        $phone_number_update_query = "UPDATE aouths SET phone_number='$phone_number',adress='$adress' WHERE id='$id'";
        $phone_number_update_bd = mysqli_query($db_connect,$phone_number_update_query);
        header('location:./admin/profile.php');
    }else{
        $flag=true;
        $_SESSION['update_number_error']='Please enter Number';
    } 
}

if (isset($_POST['change_password'])) {
    $old_password= $_POST['old_password'];
    $new_password= $_POST['new_password'];
    $confirm_password= $_POST['confirm_password'];
    if($old_password){
        $old_password_chek_qurey = "SELECT password FROM aouths WHERE id = '$id'";
        $old_password_chek_qurey_db = mysqli_query($db_connect,$old_password_chek_qurey);
        $old_passsword_from_db = mysqli_fetch_assoc( $old_password_chek_qurey_db);
        if (sha1($old_password) === $old_passsword_from_db['password']) {
            if ($new_password) {
                if (preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$new_password)) {
                    if ($old_password === $new_password) {
                        $flag=true;
                        $_SESSION['update_password_error']='please another password';
                    }else{
                        if ($confirm_password) {
                            if ($new_password === $confirm_password) {
                                $encode_password= sha1($new_password);
                                $password_update_query = "UPDATE aouths SET password='$encode_password' WHERE id='$id'";
                                $password_update_bd = mysqli_query($db_connect,$password_update_query);
                                //header('location:./admin/profile.php');

                            }else {
                                $flag=true;
                                $_SESSION['update_password_error']='Password not matching';
                            }
                        }else{
                            $flag=true;
                            $_SESSION['update_password_error']='Requared confirm password ';
                        }
                    }
                }else{
                    $flag=true;
                    $_SESSION['update_password_error']='Requared storng password ';
                }
            }else{
                $flag=true;
                $_SESSION['update_password_error']='Requared new password ';
            }
        }else{
            $flag=true;
            $_SESSION['update_password_error']='Old password not matching';
        }         

    }else{
        $flag=true;
        $_SESSION['update_password_error']='Requared old password ';
    }
}

if ($flag) {
    header('location:./admin/profile.php');

}elseif(isset($_POST['update'])){
    $name_update_query = "UPDATE aouths SET name='$name' WHERE id='$id'";
    $name_update_bd = mysqli_query($db_connect,$name_update_query);
    $_SESSION['auth_name']=$name;
    $_SESSION['update_status']= "Update Successfully ";
    header('location:./admin/profile.php');
    header('location:./admin/profile.php');
}



?> 