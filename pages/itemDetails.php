<?php
require '../config/init.php';
require '../config/db2.php';
require '../inc/header.php';

$id = $_GET['id'];
if (!isset($id) || empty($id)) {
    header('location:404.php');
}
$item = array(
    'id' => 1,
    'name' => 'Smartphone',
    'cat' => 'Mobile',
    'description' => 'A powerful handheld device with various features.',
    'price' => 599.99
);
?>
<div class="container">
    <h1 class="bg-warning text-center"><?php echo $item['name'] ?></h1>
    <div class="row shadow">
        <img src="../template/img/laptop.jpg" class="col-md-6" alt="image">
        <div class="d-flex flex-column justify-content-between detials col-md-6">
            <h3><?php echo $item['description'] ?></h3>
            <div class="row gap-1 mb-1">
                <h6 class="text-warning bg-dark rounded text-center col-5 py-3"><?php echo $item['price'] ?>$</h6>
                <button class="btn col-5 btn-warning fw-bold">add to cart <i class="fa fa-cart-shopping"></i></button>
            </div>
        </div>
    </div>
</div>
<?php
require '../inc/footer.php';
?>