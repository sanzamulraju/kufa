<?php
$tab_title = 'about_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">About List</h5>
            </div>
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
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Educational Title</th>
                                    <th scope="col">Archive Years</th>
                                    <th scope="col">Education Percentage</th>
                                    <th scope="col">About Status</th>
                                    <th scope="col">About Me</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $about_query = "SELECT * FROM abouts ";
                                $about_query_db = mysqli_query($db_connect, $about_query);
                                $serial = 1;
                                foreach ($about_query_db as $about) : ?>
                                    <tr>

                                        <th><?= $serial++ ?></th>
                                        <td><?= $about['educational_title'] ?></td>
                                        <td><?= $about['archive_year'] ?></td>
                                        <td> <?= $about['education_prg'] ?></td>
                                        <td><span class="badge <?= ($about['about_status'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $about['about_status'] ?></span></td>
                                        <td> <?= $about['about_me'] ?></td>
                                        <td>
                                            <a href="./about_update.php?id=<?= $about['id'] ?>" class="btn btn-success">Edit</a>
                                            <a href="./aboute_delete.php?id=<?= $about['id'] ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<?php
require_once('./footer.php')
?>