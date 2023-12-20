<div class="card mt-4">
    <div class="card-body">
        <h1 class="card-text text-center text-primary">
            <?php echo !$isEditForm ? 'Registeration' : 'Edit' ?> Form
        </h1>
    </div>
    <form method="post" id="<?php echo $isEditForm ? 'editForm' : '' ?>">
        <div class="px-3">
            
            <div class="form-group">
            <?php
            if($isEditForm):
                echo '<input type="text" name="id" hidden>';
            endif;
            ?>
                <i class="fa-solid fa-user"></i>
                <label>User Name:</label>
                <input required name="userName" class="form-control" type="text" value="<?php isset($user) ? $user['userName'] : '' ?>">
            </div>
            <div class="form-group">
                <i class="fa-solid fa-envelope"></i>
                <label>Email:</label>
                <input required name="email" class="form-control" type="email" value="<?php isset($user) ? $user['email'] : ''?>">
            </div>
            <?php
            if (!$isEditForm):
                echo '
                <div class="form-group">
                <i class="fa-solid fa-lock"></i>
                <label>Password:</label>
                <input required name="password" class="form-control" type="password"">
                 </div>
                ';
            endif;
            ?>
            <div class="text-center my-2">
            <?php echo !$isEditForm ? '<input type="submit" class="btn btn-success" value="Register">' 
                  : '<input type="submit" class="btn btn-success" value="Edit">
                     <input type="text" name="edit" hidden> 
                     '  ?>
            </div>
        </div>
    </form>
</div>
