<?php
function getItem($id){
    global $con;
    $stm=$con->prepare('SELECT * FROM products WHERE Id=?');
    $stm->execute(array($id));
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function getItems(){
    global $con;
    $stm=$con->prepare('SELECT * FROM products INNER JOIN categories on CatId=categories.Id');
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>