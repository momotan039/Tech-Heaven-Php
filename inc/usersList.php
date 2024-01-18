<div class="row justify-content-center">
    <div class="col-md-6">
        <?php $isEditForm=false; include 'registerForm.php'?>
    </div>
    <div class="col-md-9 mt-4">
    <div class="card">
        <div class="card-body">
        <div class="card-title text-center text-muted"><h1>LIST OF USERS</h1></div>
        <div class='modal fade' id='exampleModal' tabindex='-1'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                </div>
                <div class='modal-body'>
                <?php $isEditForm=true; include 'registerForm.php'?>
                </div>
            </div>
        </div>
    </div>
        <table class="table table-dark table-striped table-hover text-center">
    <thead>
        <tr>
            <td>UserName</td>
            <td>Email</td>
            <td>Operation</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
            $isEditForm = true;
            echo "
            <tr>
                <td>{$user['UserName']}</td>
                <td>{$user['Email']}</td>
                <td class='d-flex justify-content-center'>
                    <form method='post'>
                        <input hidden name='id' type='text' value={$user['Id']}>
                        <button name='' class='btn'><i class='fa-solid fa-trash text-danger'></i></button>
                    </form>
                    <div>
                        <button onclick='passUser({$user['Id']})' class='btn' data-bs-toggle='modal' data-bs-target='#exampleModal'><i class='fa-solid fa-edit text-primary'></i></button>
                    </div>
                </td>
            </tr>
        ";
        }
        ?>
    </tbody>
</table>

        </div>
    </div>
</div>
</div>