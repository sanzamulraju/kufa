<?php
$tab_title='testimonial_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Testimonial List</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $testimonial_query = "SELECT * FROM testimonials ";
                                $testimonial_query_db = mysqli_query($db_connect, $testimonial_query);
                                $testimonial = mysqli_fetch_assoc($testimonial_query_db);
                                $serial = 1;
                                foreach ($testimonial_query_db as $testimonial) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td><?= $testimonial['name'] ?></td>
                                        <td><?= $testimonial['description'] ?></td>
                                        <td><?= $testimonial['comment'] ?></td>
                                        <td><span class="badge <?= ($testimonial['status'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $testimonial['status'] ?></span></td>
                                        <td><img src="../uploads/images/<?= $testimonial['image'] ?>" alt="" width="100px" height="100px">
                                        </td>
                                        <td>
                                            <a href="./testimonial_update.php?id=<?= $testimonial['id'] ?>" class="btn btn-success">Edit</a>
                                            <a href="./testimonial_delete.php?id=<?= $testimonial['id'] ?>" class="btn btn-danger">Delete</a>
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