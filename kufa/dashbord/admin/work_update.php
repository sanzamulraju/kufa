<?php
require_once('./header.php');
require_once('../../db-connect.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Works</h5>
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
            $work_query = "SELECT * FROM works WHERE id=$id";
            $work_query_db = mysqli_query($db_connect, $work_query);
            $work = mysqli_fetch_assoc($work_query_db);

            ?>
            <div class="card-body">
                <form action="./work_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                        <div class="example-content">
                            <label for="">Works title</label>
                            <input hidden type="number" name="id" value="<?= $work['id'] ?>">
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="work_title" value="<?= $work['work_title'] ?>">
                        </div>
                        <div class="example-content">
                            <label for="">Works Heading</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="work_heading" value="<?= $work['work_title'] ?>">
                        </div>

                        <div class="example-content">
                            <label for="">Works description</label>
                            <textarea name="work_description" id="" cols="30" rows="5" class="form-control form-control-rounded m-b-sm" class="work_description"><?= $work['work_description'] ?></textarea>
                        </div>
                        <div class="example-content">
                            <label for="">Works Image</label><span> <img src="../uploads/works/<?= $work['work_img'] ?>" alt="" width="50px" height="50px"></span>
                           
                            <input type="file" class="form-control" name="work_img">

                        </div>
                        <?php
                        if (isset($_SESSION['image_error'])) { ?>
                            <p class="text-danger"><?= $_SESSION['image_error']; ?></p>
                        <?php
                        }
                        unset($_SESSION['image_error']);
                        ?>


                        <div class="example-content">
                            <label for="">Works Status</label>
                            <select name="work_status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active" <?= $work['work_status'] ?>>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="update_work">Update Works</button>
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