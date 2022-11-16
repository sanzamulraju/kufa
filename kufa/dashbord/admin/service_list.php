<?php
$tab_title='service_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Service List</h5>
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
                                    <th scope="col">Service Title</th>
                                    <th scope="col">Service Drscription</th>
                                    <th scope="col">Service Icon</th>
                                    <th scope="col">Service Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $service_query = "SELECT * FROM services ";
                                $service_query_db = mysqli_query($db_connect, $service_query);
                                $serial = 1;
                                foreach ($service_query_db as $service) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td><?= $service['service_title'] ?></td>
                                        <td><?= $service['service_description'] ?></td>
                                        <td> <span class="card-text m-1 badge badge-primary"><i class="<?= $service['service_icon'] ?> fs-5  aria-hidden="true"></i></span>
                                        </td>
                                        <td><span class="badge <?= ($service['service_status'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $service['service_status'] ?></span></td>
                                        <td>
                                            <a href="./service_update.php?id=<?= $service['id'] ?>" class="btn btn-success">Edit</a>
                                            <a href="./service_delete.php?id=<?= $service['id'] ?>" class="btn btn-danger">Delete</a>
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