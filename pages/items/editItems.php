<?php
require '../../config/init.php';
require '../../inc/header.php';
require '../../app/items/get.php';
?>
<div class="row justify-content-center">
    <div class="col-md-6">
    <?php $isEditForm=false; include '../../inc/itemForm.php'?>
    </div>

<div class="card">
    <div class="card-body">
        <div class="card-title text-center text-muted">
            <h1>List Of Products</h1>
        </div>
        <div class='modal fade' id='exampleModal'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body'>
                        <?php $isEditForm = true;
                        include '../../inc/itemForm.php' ?>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-dark table-striped table-hover text-center">
            <thead>
                <tr>
                    <td>Product Name</td>
                    <td>Product Category</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach (getItems() as $item) :
                    $isEditForm = true;
                ?>
                    <tr>
                        <td><?php echo $item['Name']?></td>
                        <td><?php echo $item['Cat_Name']?></td>
                        <td class='d-flex justify-content-center'>
                            <form method='post'>
                                <input hidden name='id' type='text' value=<?php echo $item['Id']?>>
                                <button name='' class='btn'><i class='fa-solid fa-trash text-danger'></i></button>
                            </form>
                            <div>
                                <button onclick='' class='btn' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-edit text-primary'></i></button>
                            </div>
                        </td>
                    </tr>
                <?php
                endforeach
                ?>
            </tbody>
        </table>

    </div>
</div>
</div>
<?php
require '../../inc/footer.php';
?>