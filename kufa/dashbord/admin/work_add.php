<?php
$tab_title='work_add.php';
require_once('./header.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Works</h5>
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
                <form action="./work_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="">Works title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="work_title">
                        </div>
                        <div class="example-content">
                            <label for="">Works Heading</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="work_heading">
                        </div>

                        <div class="example-content">
                            <label for="">Works description</label>
                            <textarea name="work_description" id="" cols="30" rows="5" class="form-control form-control-rounded m-b-sm" class="work_description"></textarea>
                        </div>
                        <div class="example-content">
                            <label for="">Works Image</label>
                            <input type="file" class="form-control" name="work_img">
                        </div>
                        <?php
                        if (isset($_SESSION['img_error'])) { ?>
                            <p class="text-danger"><?= $_SESSION['img_error']; ?></p>
                        <?php
                        }
                        unset($_SESSION['img_error']);
                        ?>

                        <div class="example-content">
                            <label for="">Works Status</label>
                            <select name="work_status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="add_work">Add Works</button>
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