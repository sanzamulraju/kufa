<?php 
$tab_title='social_link.php';
require_once('./header.php');


?>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="page-description">
                <h1 class="text-center">Socail Links</h1>
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
                            if (isset($_SESSION['success'])) { ?>
                                <div class="alert alert-success" role="alert">
                                    <p class="text-white font-boder text-capitalize"><?= $_SESSION['success']; ?></p>
                                </div>
                            <?php
                            }
                            unset($_SESSION['success']);
                            ?>
                            <?php
                            $id = $_SESSION['auth_id'];
                            $social_links_query = "SELECT * FROM aouths WHERE id=$id";
                            $social_links_query_db = mysqli_query($db_connect, $social_links_query);
                            $social_links = mysqli_fetch_assoc($social_links_query_db);
                            
                            ?>

                            <form action="./socail_link_update.php" method="post" enctype="multipart/form-data">
                                <label for="">Facebook</label>
                                <div class="input-group mb-3">
                                    <input type="url" class="form-control" name="facebook" value="<?=$social_links['facebook']?>">
                                </div>
                                <?php
                                if (isset($_SESSION['socail_links_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['socail_links_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['socail_links_error']);
                                ?>
                                <label for="">twitter</label>
                                <div class="input-group mb-3">
                                    <input type="url" class="form-control" name="twitter" value="<?=$social_links['twitter']?>">
                                </div>
                                <?php
                                if (isset($_SESSION['socail_links_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['socail_links_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['socail_links_error']);
                                ?>
                                <label for="">instagram</label>
                                <div class="input-group mb-3">
                                    <input type="url" class="form-control" name="instagram"  value="<?=$social_links['instagram']?>">
                                </div>
                                <?php
                                if (isset($_SESSION['socail_links_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['socail_links_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['socail_links_error']);
                                ?>
                                <label for="">linkedin</label>
                                <div class="input-group mb-3">
                                    <input type="url" class="form-control" name="linkedin"  value="<?=$social_links['linkedin']?>">
                                </div>
                                <?php
                                if (isset($_SESSION['socail_links_error'])) { ?>
                                    <p class="text-danger"><?= $_SESSION['socail_links_error']; ?></p>
                                <?php
                                }
                                unset($_SESSION['socail_links_error']);
                                ?>

                                <button type="submit" class="btn btn-success" name="update">Update Links</button>


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