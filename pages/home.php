<?php
require '../config/init.php';
require '../inc/header.php';
require '../config/db2.php'
?>

<?php
// handel editing user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit'])) {
    //UPDATE users SET name = :newName WHERE id = :userID
    $stmt = $con->prepare('UPDATE users SET UserName=:username , Email=:email WHERE Id=:id');
    $stmt->execute([':id'=>$_POST['id'],':username' => $_POST['userName'], ':email' => $_POST['email']]);
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Yeah,</strong>User Updated successfully!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
}

// handel adding user
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['id'])) {
    $stmt = $con->prepare('INSERT INTO users(UserName,Email,Password) VALUES(:username,:email,:password)');
    $stmt->execute([':username' => $_POST['userName'], ':email' => $_POST['email'], ':password' => sha1($_POST['password'])]);
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Yeah,</strong>User Registered successfully!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
}

// handle omiting specific user
elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $stms=$con->prepare('DELETE FROM users WHERE Id=:Id');
    $stms->execute([':Id'=>$_POST['id']]);
    echo '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Yeah,</strong>User Removed successfully!!!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    ';
}


// fetch all users from database when loading page
$stmt = $con->query('SELECT * FROM users');
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="row justify-content-center">
    <div class="col-md-6">
        <?php $isEditForm=false; include '../inc/registerForm.php'?>
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
                <?php $isEditForm=true; include '../inc/registerForm.php'?>
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
            $data = file_get_contents("../inc/registerForm.php");
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
</div>

<script>
    function passUser(id){
        fetch('../api/users.php/?id='+id)
        .then(res => res.json())
        .then(data => {
            const inputs=document.querySelectorAll('#editForm input')
            inputs[0].value=data.Id;
            inputs[1].value=data.UserName;
            inputs[2].value=data.Email;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<?php require '../inc/footer.php'; ?>