 <?php
 $tab_title='brand_update.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Brand</h5>
            </div>
            <?php
            if (isset($_SESSION['work_error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['work_error']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['work_error']);
            ?>
            <?php
            if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['success']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['success']);
            $id = $_GET['id'];
            $brand_query = "SELECT * FROM brands WHERE id=$id";
            $brand_query_db = mysqli_query($db_connect, $brand_query);
            $brand = mysqli_fetch_assoc($brand_query_db);

            ?>
            <div class="card-body">
                <form action="./brand_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        
                        <div class="example-content">
                        <input hidden type="number" name="id" value="<?= $brand['id'] ?>">
                            <label for="">Brand Image</label><span> <img src="../uploads/brands/<?= $brand['brand_img'] ?>" alt="" width="50px" height="50px"></span>
                           
                            <input type="file" class="form-control" name="brand_img">

                        </div>
                        <?php
                        if (isset($_SESSION['image_error'])) { ?>
                            <p class="text-danger"><?= $_SESSION['image_error']; ?></p>
                        <?php
                        }
                        unset($_SESSION['image_error']);
                        ?>


                        <div class="example-content">
                            <label for="">Brand Status</label>
                         
                            <select name="brand_status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active" <?= $brand['brand_status'] ?>>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="update_brand">Update brand</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
require_once('./footer.php')
?> 