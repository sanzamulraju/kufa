<?php
$tab_title='work_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Works List</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Works Title</th>
                                    <th scope="col">Works Heading</th>
                                    <th scope="col">Works Description</th>
                                    <th scope="col">Works Status</th>
                                    <th scope="col">Works Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $work_query = "SELECT * FROM works ";
                                $work_query_db = mysqli_query($db_connect, $work_query);
                                $work = mysqli_fetch_assoc($work_query_db);
                                $serial = 1;
                                foreach ($work_query_db as $work) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td><?= $work['work_title'] ?></td>
                                        <td><?= $work['work_heading'] ?></td>
                                        <td><?= $work['work_description'] ?></td>
                                        <td><span class="badge <?= ($work['work_status'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $work['work_status'] ?></span></td>
                                        <td><img src="../uploads/works/<?= $work['work_img'] ?>" alt="" width="100px" height="100px">
                                        </td>
                                        <td>
                                            <a href="./work_update.php?id=<?= $work['id'] ?>" class="btn btn-success">Edit</a>
                                            <a href="./work_delete.php?id=<?= $work['id'] ?>" class="btn btn-danger">Delete</a>
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