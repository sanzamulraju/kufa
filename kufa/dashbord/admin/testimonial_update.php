<?php
$tab_title='testimonial_update.php';
require_once('./header.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Update Testimonial</h5>
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
            if (isset($_SESSION['successfull'])) { ?>
                <div class="alert alert-success" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['successfull']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['successfull']);
            
            $id = $_GET['id'];
            $testimonial_query = "SELECT * FROM testimonials WHERE id=$id";
            $testimonial_query_db = mysqli_query($db_connect, $testimonial_query);
            $testimonial = mysqli_fetch_assoc($testimonial_query_db);
             ?>   
            <div class="card-body">
                <form action="./testimonial_data.php" method="post" enctype="multipart/form-data">
                    <div class="example-container">
                    <input hidden type="number" name="id_id" value="<?= $testimonial['id'] ?>">
                        <div class="example-content">
                            <label for="">Name</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="name" value="<?= $testimonial['name'] ?>">
                        </div>
                        <div class="example-content">
                            <label for="">Description</label>
                            <input type="text" class="form-control form-control-rounded m-b-sm" name="description" value="<?= $testimonial['description'] ?>">
                        </div>

                        <div class="example-content">
                            <label for="">Comment</label>
                            <textarea name="comment" id="" cols="30" rows="5" class="form-control form-control-rounded m-b-sm" class="comment">value="<?= $testimonial['comment'] ?>"</textarea>
                        </div>
                        <div class="example-content">
                            <label for="">Image</label><span> <img src="../uploads/images/<?= $testimonial['image'] ?>" alt="" width="50px" height="50px"></span>
                           
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
                            <label for="">Customer Status</label>
                            <select name="status" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit" name="update_testimonial">Update Testimonial</button>
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