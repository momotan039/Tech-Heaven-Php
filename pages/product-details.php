<?php
require '../config/init.php';
require '../inc/header.php';
?>
<div class="prodcut-detials container mt-4">
<?php
$product=[
    'product_name'=>'Sony WH-1000XM4 Wireless Noise-Cancelling Over-Ear Headphones',
    'description'=>'The Sony WH-1000XM4 Wireless Noise-Cancelling Over-Ear Headphones deliver crisp and clear sound quality, comfortable ear cups, and an adjustable headband for a secure fit. The built-in microphone allows for hands-free calling, while the touch controls enable easy track and volume adjustments. With up to 30 hours of battery life, these headphones are perfect for all-day use.',
    'price'=>300,
    'gallery'=>[
        $imgs .'/gallery1.png',
        $imgs .'/gallery2.png',
        $imgs .'/gallery3.png',
        $imgs .'/gallery4.png',
        $imgs .'/gallery5.png',
    ],
    'star_rating'=>[
        '5'=>'20%',
        '4'=>'30%',
        '3'=>'50%',
        '2'=>'20%',
        '1'=>'10%'
    ],
    'reviews'=>[
        'total_reviews'=>2500,
        'feedback'=>[]
    ]
]

?>
<!-- Breadcrumb -->
    <div class="breadcrumb mb-4">
        <ul>
            <li>Electronics</li>
            <li>Headphones</li>
            <li>Over-Ear</li>
        </ul>
    </div>

    <!-- Gallery -->
    <div class="gallery">
        <?php foreach ($product['gallery'] as $img):?>
        <img src="<?php echo $img ?>">
        <?php endforeach?>
    </div>

    <!-- Product Name -->
    <h3 class="mt-4"><?php echo $product['product_name']?></h3>
    
    <!-- reviews -->
    <div class="reviews">
        <div class="row">
            <div class="col-2 stars">
                <h2 class="rate fw-bold">4.8</h2>
                <div class="d-flex mb-2">
                    <i class="fa fa-star fill"></i>
                    <i class="fa fa-star fill"></i>
                    <i class="fa fa-star fill"></i>
                    <i class="fa fa-star fill"></i>
                    <i class="fa fa-star fill"></i>
                </div>
                <span class="total">2,500 reviews</span>
            </div>
            <div class="col-4 bars">
                <div class="bar-container">
                    <span>5</span>
                    <div style="--percentage:50%" class="bar"></div>
                    <span>50%</span>
                </div>
                <div class="bar-container">
                    <span>4</span>
                    <div style="--percentage:25%" class="bar"></div>
                    <span>25%</span>
                </div>
                <div class="bar-container">
                    <span>3</span>
                    <div style="--percentage:10%" class="bar"></div>
                    <span>10%</span>
                </div>
                <div class="bar-container">
                    <span>2</span>
                    <div style="--percentage:5%" class="bar"></div>
                    <span>5%</span>
                </div>
                <div class="bar-container">
                    <span>1</span>
                    <div style="--percentage:10%" class="bar"></div>
                    <span>10%</span>
                </div>
            </div>
        </div>
    </div>

    <!-- description -->
    <p class="mt-4"><?php echo $product['description']?></p>

    <!--Specifications -->
    
</div>
<?php require '../inc/footer.php'; ?>