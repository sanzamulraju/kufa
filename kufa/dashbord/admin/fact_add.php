<?php
$tab_title='Fact_add.php';
require_once('./header.php');

?>

<div class="row justify-content-center">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Add Facts</h5>
            </div>
            <?php
            if (isset($_SESSION['service_error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <p class="text-white font-border text-capitalize"><?= $_SESSION['service_error']; ?></p>
                </div>
            <?php
            }
            unset($_SESSION['service_error']);
            ?>
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
                <form action="./fact_data.php" method="post">
                   
                        <div class="example-content">
                            <label for="">Fact icon</label>
                            <input readonly type="text" class="form-control form-control-rounded m-b-sm" name="facts_icon" id="icon_value">
                        </div>
                        .<div class="card text-white bg-success">
                            <div class="card-body" style="overflow:scroll ; height:150px;">
                                <?php
                                require_once('./icons.php');
                                foreach ($fonts as $font) : ?>
                                    <span class="card-text m-1 badge badge-primary" style="cursor: pointer;"><i class="<?= $font ?> fs-5 icon_click" id="<?= $font ?>" aria-hidden="true"></i></span>

                                <?php
                                endforeach
                                ?>
                            </div>
                        </div>

                        <div class="example-content">
                            <label for="">Fact description</label>
                            <textarea name="facts_discription" id="" cols="30" rows="5" class="form-control form-control-rounded m-b-sm" class="service_description"></textarea>
                        </div>

                        <div class="example-content">
                            <label for="">Fact Status</label>
                            <select name="fact_stasuts" id="" class="form-control form-control-rounded m-b-sm">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button class="btn btn-success" type="submit">Add Facts</button>
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
<script>
    $(document).ready(function() {
        $('.icon_click').click(function() {
            $('#icon_value').val($(this).attr('id'));
    
        })

    })
</script>