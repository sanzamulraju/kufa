<?php
$tab_title='testimonial_add.php';
require_once('./header.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Testimonial</h5>
            </div>
            <?php
            if (isset($_SESSION['works_error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['works_error'];?></p>
                </div>
            <?php
            }
            unset($_SESSION['works_error']);
            ?>
            <?php
            if (isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['success']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['success']);
            ?>
            <div class="card-body">
                <form action="./testimonial_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for=""> Name</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="name">
                        </div>
                        <div class="example-content">
                            <label for=""> Description</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="description">
                        </div>

                        <div class="example-content">
                            <label for=""> Comment</label>
                            <textarea name="comment" id="" cols="30" rows="5" class="form-control form-control-rounded m-b-sm" class="comment"></textarea>
                        </div>
                        <div class="example-content">
                            <label for=""> Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <?php
                        if (isset($_SESSION['img_error'])) { ?>
                            <p class="text-danger"><?= $_SESSION['img_error']; ?></p>
                        <?php
                        }
                        unset($_SESSION['img_error']);
                        ?>

                        <div class="example-content">
                            <label for=""> Status</label>
                            <select name="status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="add_testimonial">Add Works</button>
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