<?php 
include "$root/app/categories/get.php";
?>
<div class="card mt-4">
    <div class="card-body">
        <h1 class="card-text text-center text-primary">
            <?php echo !$isEditForm ? 'Add' : 'Edit' ?> Item Form
        </h1>
    </div>
    <form method="post" id="<?php echo $isEditForm ? 'editForm' : '' ?>">
        <div class="px-3">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <?php
                        if ($isEditForm) :
                            echo '<input type="text" name="id" hidden>';
                        endif;
                        ?>
                        <i class="fa-solid fa-desktop"></i>
                        <label>Product Name:</label>
                        <input required name="prodcut-name" class="form-control" type="text" value="<?php isset($user) ? $user['userName'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-tag"></i>
                        <label>Cat:</label><br>
                        
                        <select class="form-select" name="cat-id">
                            <option selected>Select a Category</option>
                            <?php foreach (getCategories() as $cat) :
                            ?>
                                <option value="<?php echo $cat['Cat_Id'] ?>"><?php echo $cat['Cat_Name'] ?></option>
                            <?php
                            endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary p2">
                                Change Image
                        </button>
                    </div>
                </div>
                <div class="col-6">
                <img class="col-12" src="../../template/img/laptop.jpg" alt="image">
            </div>
            </div>
            
            <div class="text-center my-2">
                <?php echo !$isEditForm ? '<input type="submit" class="btn btn-success" value="Add">'
                    : '<input type="submit" class="btn btn-success" value="Edit">
                     <input type="text" name="edit" hidden> 
                     '  ?>
            </div>
        </div>

    </form>
</div>