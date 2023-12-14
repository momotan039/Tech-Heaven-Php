<?php
require '../config/init.php';
require '../inc/header.php';
require '../config/db2.php'
?>

<?php
// get user by id
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $stms=$con->prepare('SELECT * FROM users WHERE Id=:Id');
    $stms->execute([':Id'=>$_GET['id']]);
    $user=$stms->fetch(PDO::FETCH_ASSOC);
    echo json_encode($user);
    exit;
}

// handel adding user
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['id'])) {
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
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
                        $isEditForm=true;
                        $includedContent = file_get_contents('../inc/registerForm.php');
                        echo <<<HTML
                        <tr>
                            <td>{$user['UserName']}</td>
                            <td>{$user['Email']}</td>
                            <td class="d-flex justify-content-center">
                                <form method="post">
                                <input hidden name="id" type="text" value={$user['Id']}>
                                <button name="" class="btn"><i class="fa-solid fa-trash text-danger"></i></button>
                                </form>
                                <div>
                                <button onclick="editUser({$user['Id']})" class="btn"><i class="fa-solid fa-edit text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{$user['Id']}"></i></button>
                                </div>
                            </td>
                            <div class="modal fade" id="exampleModal{$user['Id']}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {$includedContent}
                                    </div>
                                    </div>
                                </div>
                                </div>
                        </tr>
                HTML;
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
    function editUser(id){
        fetch('./?id='+id,{
            headers: {
        'Accept': 'application/json',
    },
        })
        .then(res => res.json())
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
</script>

<?php require '../inc/footer.php'; ?>