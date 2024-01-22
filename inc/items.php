<?php
$items = array(
    array(
        'id' => 1,
        'name' => 'Smartphone',
        'cat' => 'Mobile',
        'description' => 'A powerful handheld device with various features.',
        'price' => 599.99
    ),
    array(
        'id' => 2,
        'name' => 'Laptop',
        'cat' => 'Computer',
        'description' => 'Portable computer with a keyboard and display.',
        'price' => 999.99
    ),
    array(
        'id' => 3,
        'name' => 'Smart TV',
        'cat' => 'Television',
        'description' => 'Television with internet connectivity and smart features.',
        'price' => 799.99
    ),
);
?>

<div class="row justify-content-center gap-3">
    <?php
    foreach ($items as $item) {
    ?>
        <div class="col-sm-5 col-md-3 card shadow-sm">
            <h3 class="bg-success text-light rounded text-center"><?php echo $item['name']?></h3>
            <img src="../template/img/laptop.jpg" class="card-img-top" alt="Image">
            <div class="card-body">
                <h5 class="card-title text-warning bg-dark rounded text-center p-2"><i class="fa fa-tag"></i><?php echo $item['cat']?></h5>
                <p class="card-text"><?php echo $item['description']?></p>
                <div class="row">
                    <a href="<?php echo $pages?>/itemDetails.php?id=<?php echo $item['id']?>" class="btn btn-primary col-md-6 fw-bold">show detials</a>
                    <b class="col-md-6 text-center align-middle mt-1">
                        <h6  class="text-warning bg-dark rounded text-center p-2 align-middle"><?php echo $item['price']?>$</h6>
                    </b>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</div>