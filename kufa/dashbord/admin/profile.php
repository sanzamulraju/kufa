<?php 
$tab_title='profile.php';
require_once('./header.php');


?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1 class="text-center">PROFILE</h1>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="example-container">
                        <div class="example-content">
                            <?php
                            if (isset($_SESSION['update_status'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <p class="text-white font-boder text-capitalize"><?= $_SESSION['update_status']; ?></p>
                                </div>
                            <?php
                            }
                            unset($_SESSION['update_status']);
                            ?>

                            <form action="../profile_data.php" method="post" enctype="multipart/form-data">
                                <label for="">Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" value="<?= $_SESSION['auth_name'] ?>">
                                </div>
                                <?php
                                if (isset($_SESSION['name_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['name_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['name_error']);
                                ?>
                                <label for="">Old Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="old_password">
                                </div>
                                <?php
                                if (isset($_SESSION['update_password_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['update_password_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['update_password_error']);
                                ?>
                                <label for="">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="new_password">
                                </div>
                                <?php
                                if (isset($_SESSION['update_password_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['update_password_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['update_password_error']);
                                ?>
                                <label for="">Comfirm Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="confirm_password">
                                </div>
                                <?php
                                if (isset($_SESSION['update_password_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['update_password_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['update_password_error']);
                                ?>
                                <label for="">Phone Number</label>
                                <div class="input-group mb-3">
                                    <input type="tel" class="form-control" name="phone_number">
                                </div>
                                <?php
                                if (isset($_SESSION['update_number_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['update_number_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['update_number_error']);
                                ?>
                                <label for="">Address</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="adress">
                                </div>
                               
                                <label for="">Profile Pic</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="profile_pic">
                                </div>
                                <button type="submit" class="btn btn-info" name="update">Update</button>
                                <button type="submit" class="btn btn-info" name="change_password">Change Password</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<?php 
require_once('./footer.php') 
?>