<div class="reviews">
        <div class="row">
            <div class="col-2 stars">
                <h2 class="rate fw-bold"><?php echo  $total_rating ?></h2>
                <div class="d-flex mb-2">
                    <?php for ($i = 0; $i < 5; $i++) {
                        if ($total_rating > $i)
                            echo '<i class="fa fa-star fill"></i>';
                        else
                            echo '<i class="fa-regular fa-star"></i>';
                    } ?>
                </div>
                <span class="total"><?php echo count($reviews) ?> reviews</span>
            </div>
            <div class="col-4 bars">
                <?php foreach ($reviews_percentage as $stars => $percentage) : ?>
                    <div class="bar-container">
                        <span><?php echo $stars ?></span>
                        <div style="--percentage:<?php echo $percentage ?>%" class="bar"></div>
                        <span><?php echo $percentage . '%' ?></span>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>