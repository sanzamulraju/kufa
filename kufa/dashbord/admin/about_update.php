<?php
$tab_title = 'about_update.php';
require_once('./header.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update About</h5>
            </div>
            <?php
            if (isset($_SESSION['about_error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['about_error']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['about_error']);
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
            $about_query = "SELECT * FROM abouts WHERE id=$id";
            $about_query_db = mysqli_query($db_connect, $about_query);
            $about = mysqli_fetch_assoc($about_query_db);

            ?>
            <div class="card-body">
                <form action="./about_update_data.php" method="post">
                    <div class="example-container">
                        <div class="example-content">
                            <input hidden type="number" name="update_id" value="<?=$about['id']?>">
                            <label for="">Educational Title</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="educational_title" value="<?= $about['educational_title'] ?>">
                        </div>
                        <div class="example-content">
                            <label for="">Archive Years</label>
                            <input type="number" class="form-control form-control-rounded m-b-sm" name="archive_year" value="<?= $about['archive_year'] ?>">
                        </div>
                        <div class="example-content">
                            <label for="">Education Percentage</label>
                            <input type="range" class="form-control form-control-rounded m-b-sm" name="education_prg" value="<?= $about['education_prg'] ?>">
                        </div>

                        <div class="example-content">
                            <label for="">About Me</label>
                            <textarea name="about_me" id="" cols="30" rows="3" class="form-control form-control-rounded m-b-sm"><?= $about['about_me'] ?></textarea>
                            <div class="example-content">
                                <button class="btn btn-success" type="submit" name="add_about">Add Aboute Me</button>
                            </div>
                        </div>

                        <div class="example-content">
                            <label for="">About Status</label>
                            <select name="about_status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active" <?= ($about['about_status'] === 'inactive') ? 'selected' : '' ?>>Active</option>
                                <option value="inactive" <?= ($about['about_status'] === 'inactive') ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>


                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="update_about">Update Aboute</button>
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