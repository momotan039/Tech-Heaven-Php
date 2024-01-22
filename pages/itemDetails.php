<?php
require '../config/init.php';
require '../inc/header.php';
require '../app/items/get.php';
$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    header('location:404.php');
}
$item=getItem($id);
?>
<div class="container mt-3">
    <h1 class="bg-warning text-center mb-5"><?php echo $item['Name'] ?></h1>
    <div class="row shadow">
        <img src="../template/img/laptop.jpg" class="col-md-6" alt="image">
        <div class="d-flex flex-column justify-content-between detials col-md-6">
            <h3><?php echo $item['Description'] ?></h3>
            <div class="row gap-1 mb-1">
                <h6 class="text-warning bg-dark rounded text-center col-5 py-3"><?php echo $item['Price'] ?>$</h6>
                <button class="btn col-5 btn-warning fw-bold">add to cart <i class="fa fa-cart-shopping"></i></button>
            </div>
        </div>
    </div>
</div>
<?php
require '../inc/footer.php';
?>