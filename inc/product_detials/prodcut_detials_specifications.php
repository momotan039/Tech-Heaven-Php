<div class="specifications mt-4">
        <h3>Specifications</h3>
        <div class="row">
            <?php foreach (json_decode($product['specifications']) as $key => $value) : ?>
                <div class="item col-6 mb-5">
                    <span class="key"><?php echo $key ?></span>
                    <br>
                    <span class="value"><?php echo $value ?></span>
                </div>
                <br>
            <?php endforeach ?>
        </div>
    </div>