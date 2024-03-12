<?php
require '../config/init.php';
require '../inc/header.php';
?>
<?php
$serachFor = $_GET['s'];
$stm = 'SELECT * FROM products 
        INNER JOIN product_images on product_images.product_id=products.product_id
        WHERE name LIKE :s OR description LIKE :s 
        GROUP BY products.product_id';
$query = $con->prepare($stm);
$query->execute([':s' => '%' . $serachFor . '%']);
$items = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
  <div class="row px-4">
    <h1 class="col"><i class="fa-solid fa-magnifying-glass"></i>Searched For: <?php echo $serachFor ?></h1>
  </div>
  <div class="row gy-5">
    <?php foreach ($items as $item) : ?>
      <div class="col-3">
        <?php include '../inc/listed-item.php' ?>
      </div>
    <?php endforeach ?>
  </div>
  <?php include '../inc/pagination.php' ?>
</div>
<?php require '../inc/footer.php'; ?>