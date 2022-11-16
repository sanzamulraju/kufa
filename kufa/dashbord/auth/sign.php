<?php 
$tab_title='sign.php';
require_once('./includes/header.php'); 
session_start() 
?>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-end">
        <div class="app-auth-background">

        </div>
        <div class="app-auth-container">
            <div class="logo">
                <a href="index.html">Neptune</a>
            </div>
            <p class="auth-description">Please sign-in to your account and continue to the dashboard.<br>Don't have an account? <a href="./signup.php">Sign Up</a></p>
            <?php
             if(isset($_SESSION['sign_status'] )) :?>
                  <div class="alert alert-success" role="alert">
                     <p class="text-white font-boder text-capitalize"><?= $_SESSION['sign_status']; ?></p>
                 </div>
             <?php    
             
             endif
             ?>
             
             <?php
             if(isset($_SESSION['login_error'] )) :?>
                  <div class="alert alert-danger" role="alert">
                     <p class="text-white font-boder text-capitalize"><?= $_SESSION['login_error']; ?></p>
                 </div>
             <?php    
            
             endif
             ?> 


            <div class="auth-credentials m-b-xxl">
                <form action="./sign_data.php" method="POST">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control m-b-md" id="signInEmail" aria-describedby="signInEmail"  value="<?= isset($_SESSION['new_emil']) ? $_SESSION['new_emil'] :''; unset($_SESSION['new_emil'])?>" name="email">
                    <?php
                    if(isset($_SESSION['email_exit'] )) {?>
                        <p class="text-danger"><?= $_SESSION['email_exit']; ?></p>
                     <?php    
                    }
                    unset($_SESSION['email_exit']);
                    ?> 

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="signInPassword" aria-describedby="signInPassword" name="password" >

                    <?php
                    if(isset($_SESSION['password_exit'] )) {?>
                        <p class="text-danger"><?= $_SESSION['password_exit']; ?></p>
                     <?php    
                    }
                    unset($_SESSION['password_exit']);
                    ?> 


                    <div class="auth-submit">
                        <button class="btn btn-primary">Sign In</button>
                     </div>
            </div>
                </form>
            
            
        </div>
    </div>
    
    

<?php require_once('./includes/footer.php'); 
session_unset();

?>
