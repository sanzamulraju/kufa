<?php
$tab_title='admins_massage.php';
require_once('./header.php');
require_once('../../db-connect.php');

?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Admins Massages</h5>
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
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Massage</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $contacts_query = "SELECT * FROM contacts ";
                                $contacts_query_db = mysqli_query($db_connect, $contacts_query);
                                $contacts= mysqli_fetch_assoc($contacts_query_db);
                                $serial = 1;
                                foreach ($contacts_query_db as $service) : ?>
                                    <tr>
                                        <th><?= $serial++ ?></th>
                                        <td><?= $contacts['name'] ?></td>
                                        <td><?= $contacts['email'] ?></td>
                                        <td><?= $contacts['message'] ?></td>
                                        <td>
                                            <a href="#" class="btn btn-success">Edit</a>
                                            <a href="#" class="btn btn-danger">Delete</a>
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