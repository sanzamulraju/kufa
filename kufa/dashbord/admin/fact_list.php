<?php
$tab_title='Fact_list.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Facts List</h5>
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
                                    <th scope="col">Facts icon</th>
                                    <th scope="col">Facts Drscription</th>
                                    <th scope="col">Facts Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $facts_query = "SELECT * FROM facts ";
                                $facts_query_db = mysqli_query($db_connect, $facts_query);
                                $serial = 1;
                                foreach ($facts_query_db as $facts) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td> <span class="card-text m-1 badge badge-primary"><i class="<?= $facts['facts_icon'] ?> fs-5  aria-hidden=" true"></i></span>
                                        </td>
                                        <td><?= $facts['facts_discription'] ?></td>
                                        <td><span class="badge <?= ($facts['fact_stasuts'] == 'active') ? 'badge-success' : 'badge-danger' ?>"><?= $facts['fact_stasuts'] ?></span></td>
                                        <td>
                                            <a href="" class="btn btn-success">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
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