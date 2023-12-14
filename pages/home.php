<?php
require '../config/init.php';
require '../inc/header.php';
require '../config/db2.php'
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmt=$con->prepare('INSERT INTO users(UserName,Email) VALUES(:username,:email)');
        $stmt->execute([':username'=>$_POST['userName'],':email'=>$_POST['email']]);
        echo 'User Registered successfully';
    }

?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <h1 class="card-text text-center text-primary">Registeration Form</h1>
            </div>
            <form method="post">
                <div class="px-3">
                    <label>User Name:</label>
                    <input required name="userName" class="form-control" type="text">
                    <label>Email:</label>
                    <input required name="email" class="form-control" type="email">
                    <!-- <label>Password:</label>
                    <input name="password" class="form-control" type="password"> -->
                    <div class="text-center my-2">
                        <input class="btn btn-success" type="submit" value="Register">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php require '../inc/footer.php'; ?>