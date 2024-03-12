<a href="product-details.php?id=<?php echo $item['product_id']?>">
    <div class="fragment-item">
        <img class="card" src="<?php echo !empty($item['path'])?$item['path']:'https://via.placeholder.com/300'?>">
        <h3 class="title"><?php echo $item['name'] ?></h3>
        <span class="price">$<?php echo $item['price'] ?></span>
    </div>
</a>