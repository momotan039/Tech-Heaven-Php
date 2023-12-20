<?php
include_once '../config/db2.php';
// get user by id
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $stms=$con->prepare('SELECT * FROM users WHERE Id=:Id');
    $stms->execute([':Id'=>$_GET['id']]);
    $user=$stms->fetch(PDO::FETCH_ASSOC);
    echo json_encode($user);
    exit;
}

?>