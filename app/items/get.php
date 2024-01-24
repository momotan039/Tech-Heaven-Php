<?php
function getItem($id){
    global $con;
    $stm=$con->prepare('SELECT * FROM products INNER JOIN categories on CatId=categories.Cat_Id WHERE Id=?');
    $stm->execute([$id]);
    return $stm->fetch(PDO::FETCH_ASSOC);
}
function getItems(){
    global $con;
    $stm=$con->prepare('SELECT * FROM products INNER JOIN categories on CatId=categories.Cat_Id');
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}
?>