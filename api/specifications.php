<?php
require_once '../config/db2.php';

if($_SERVER['REQUEST_METHOD']=='GET'&&isset($_GET['sub_category'])){
    $query=$con->prepare('SELECT * FROM Specifications WHERE subcategory_id=?');
    $query->execute([$_GET['sub_category']]);
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($res);
    exit();
}

function getSpecificationsBySubCat($subCatId){
    global $con;
    $query=$con->prepare('SELECT * FROM Specifications WHERE subcategory_id=?');
    $query->execute([$subCatId]);
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
    $htmlData='';
    foreach($res as $item){
        $htmlData+='<div class="col-6 mb-3">
        <input name="specifications['.$item['specification_id'].']" 
        placeholder="Enter '.$item['name'].'" class="form-control">
       </div>';
    }
    return $htmlData;
}

?>