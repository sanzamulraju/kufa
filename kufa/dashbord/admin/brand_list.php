<?php
$tab_title = 'brand_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Brand Image List</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="example-content">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">brand Image</th>
                                    <th scope="col">brand Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $brand_query = "SELECT * FROM brands ";
                                $brand_query_db = mysqli_query($db_connect, $brand_query);
                                $brand = mysqli_fetch_assoc($brand_query_db);
                                $serial = 1;
                                foreach ($brand_query_db as $brand) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td><img src="../uploads/brands/<?= $brand['brand_img'] ?>" alt="" width="100px" height="100px">
                                        </td>

                                        <td><span class="badge <?= ($brand['brand_status'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $brand['brand_status'] ?></span></td>

                                        <td>
                                            <a href="./brand_update.php?id=<?= $brand['id'] ?>" class="btn btn-success">Edit</a>
                                            <a href="./brand_delete.php?id=<?= $brand['id'] ?>" class="btn btn-danger">Delete</a>
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