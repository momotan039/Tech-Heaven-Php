<?php

function getCategories(){
    global $con;
    $stm=$con->prepare('SELECT * FROM categories ');
    $stm->execute();
    return $stm->fetchAll(PDO::FETCH_ASSOC);
}

?>