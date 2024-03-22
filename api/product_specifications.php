<?php
require_once '../config/db2.php';
//get all filled specifications for products
if($_SERVER['REQUEST_METHOD']=='GET'&&isset($_GET['product_id'])){
    header('Content-Type: application/json');
    $query=$con->prepare('SELECT * FROM `productspecifications`
    INNER JOIN specifications on specifications.specification_id=productspecifications.specification_id
    where product_id=?');
    $query->execute([$_GET['product_id']]);
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
}
?>