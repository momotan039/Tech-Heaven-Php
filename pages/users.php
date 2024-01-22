<?php
require '../config/init.php';
require '../inc/header.php';
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
include '../inc/usersList.php'
?>

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