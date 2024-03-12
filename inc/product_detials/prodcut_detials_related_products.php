<div class="related-products">
        <h3 class="mt-4">Related Products</h3>
        <div class="row">
            <?php foreach ($related_products as $product) : ?>
                <div class="col-4 fragment-item">
                    <img class="card" src="<?php echo $product['image'] ?>">
                    <h3 class="title"><?php echo $product['name'] ?></h3>
                    <span class="price">$<?php echo $product['price'] ?></span>
                </div>
            <?php endforeach ?>
        </div>
    </div>