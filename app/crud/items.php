<?php 
function addProduct($product){
    global $con;
    $stm='INSERT INTO `products` ( `name`, `description`, `price`, `quantity_available`, `category_id`, `sub_category_id`, `brand_id`) 
    VALUES (?,?,?,?,?,?,?)';
    $stm=$con->prepare($stm);
     // Execute the statement
        $stm->execute(
        [$product['name'],
        $product['description']??null,
        $product['price']??null,
        $product['quantity_available']??null,
        $product['category_id']??null,
        $product['sub_category_id']??null,
        $product['brand_id']??null]);
    // adding Spesifications
    if(isset($product['specifications'])){
        $id_product=$con->lastInsertId();
        foreach ($product['specifications'] as $key => $value) {
           $stm="INSERT INTO `productspecifications`(`product_id`, `specification_id`, `value`) VALUES (?,?,?)";
           $stm=$con->prepare($stm);
           $stm->execute([$id_product,$key,$value]);
       }
    }
    echo '<h1>Prodcut Added Successfuly</h1>';
}
function editProduct($product,$product_id){
    global $con;
    $stm='UPDATE `products` SET `name`=?,`description`=?,`price`=?,`quantity_available`=?,`category_id`=?,`sub_category_id`=?,`brand_id`=?';
    $stm=$con->prepare($stm);
     // Execute the statement
        $stm->execute(
        [$product['name'],
        $product['description']??null,
        $product['price']??null,
        $product['quantity_available']??null,
        $product['category_id']??null,
        $product['sub_category_id']??null,
        $product['brand_id']??null]);
    // adding Spesifications
    if(isset($product['specifications'])){
        foreach ($product['specifications'] as $key => $value) {
            // if(empty($value))
            // continue;
           $stm="UPDATE `productspecifications` SET `product_id`=?,`specification_id`=?,`value`=?";
           $stm=$con->prepare($stm);
           $stm->execute([$product_id,$key,$value]);
       }
    }
    echo '<h1>Prodcut Edited Successfuly</h1>';
}
function getItem($id){
    global $con;
    $stm=$con->prepare('SELECT * FROM `products`
    INNER JOIN brands on brands.brand_id=products.brand_id
    INNER JOIN categories on categories.category_id=products.category_id
    INNER JOIN subcategories on subcategories.subcategory_id=products.sub_category_id
    WHERE product_id=?');
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