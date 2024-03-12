<?php
require '../config/init.php';
require '../inc/header.php';
?>

<?php 
$stm='SELECT * FROM `products` WHERE category_id=1 AND sub_category_id=2';
$query=$con->query($stm);
$items=$query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
<div class="row gy-5">
  <?php foreach($items as $item):?>
    <div class="col-3">
        <?php include '../inc/listed-item.php'?>
    </div>
  <?php endforeach?>
</div>
<?php include '../inc/pagination.php'?>
</div>
<?php require '../inc/footer.php'; ?>
