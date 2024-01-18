<?php
require '../config/init.php';
require '../config/db2.php';
require '../inc/header.php';
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email=$_POST['email'];
    $password=$_POST['password'];
    if (!empty($email)&&!empty($password)){
        $stm=$con->prepare('SELECT * FROM users WHERE email=:email AND password=:password');
        $stm->execute([':email'=>$email,':password'=>sha1($password)]);
        echo $stm->rowCount();
        if($stm->rowCount()>0){
            $user=$stm->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['user']=$user;
            header('location:home.php');
        }
        else{
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Fiald Login,</strong>Email or Password not vaild!!!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        ';
        }
    }
}
?>
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="card-text text-center text-primary">
                    Login Form
                </h1>
            </div>
            <form method="post">
                <div class="px-3">
                    <div class="form-group">
                        <i class="fa-solid fa-envelope"></i>
                        <label>Email:</label>
                        <input required name="email" class="form-control" type="email">
                    </div>
                    <div class="form-group">
                        <i class="fa-solid fa-lock"></i>
                        <label>Password:</label>
                        <input required name="password" class="form-control" type="password">
                    </div>
                </div>
                <div class="text-center">
                    <button class="m-3 px-3 btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require '../inc/footer.php'; ?>