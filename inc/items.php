<?php
$items = array(1,2,3,4,5);
?>

<div class="row justify-content-center gap-3">
    <?php
    foreach ($items as $item) {
    ?>
        <div class="col-sm-6 col-l-3 card shadow-sm">
            <img src="../template/img/laptop.jpg" class="card-img-top" alt="Image">
            <div class="card-body">
                <h5 class="card-title">Laptop</h5>
                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat, laboriosam.</p>
                <div class="flex justify-content-space-between">
                <a href="#" class="btn btn-primary">show detials</a>
                <span class="btn-secondary">Price:25$</span>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>