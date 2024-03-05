<?php
require '../config/init.php';
require '../inc/header.php';
?>
<div class="prodcut-detials container mt-4">
    <?php
    $product = [
        'product_name' => 'Sony WH-1000XM4 Wireless Noise-Cancelling Over-Ear Headphones',
        'description' => 'The Sony WH-1000XM4 Wireless Noise-Cancelling Over-Ear Headphones deliver crisp and clear sound quality, comfortable ear cups, and an adjustable headband for a secure fit. The built-in microphone allows for hands-free calling, while the touch controls enable easy track and volume adjustments. With up to 30 hours of battery life, these headphones are perfect for all-day use.',
        'price' => 300,
        'gallery' => [
            $imgs . '/gallery1.png',
            $imgs . '/gallery2.png',
            $imgs . '/gallery3.png',
            $imgs . '/gallery4.png',
            $imgs . '/gallery5.png',
        ],
        'star_rating' => [
            '5' => '20%',
            '4' => '30%',
            '3' => '50%',
            '2' => '20%',
            '1' => '10%'
        ],
        'reviews' => [
            'total_rating' => 4.9,
            'total_reviews' => 2900,
            'feedbacks' => [
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 5,
                    'name' => 'Alice Johnson',
                    'date' => '2024-02-28',
                    'comment' => 'Decent headphones for the price, but the battery life could be better.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 4,
                    'name' => 'John Doe',
                    'date' => '2024-03-01',
                    'comment' => 'Great headphones, excellent sound quality!'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 5,
                    'name' => 'Jane Smith',
                    'date' => '2024-03-02',
                    'comment' => 'Absolutely love these headphones, they are comfortable and sound amazing.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 4,
                    'name' => 'Chris Brown',
                    'date' => '2024-03-03',
                    'comment' => 'Very satisfied with my purchase, great value for money.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 3,
                    'name' => 'Emily Wilson',
                    'date' => '2024-03-04',
                    'comment' => 'Not bad, but I expected better sound quality for the price.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 5,
                    'name' => 'Michael Johnson',
                    'date' => '2024-03-05',
                    'comment' => 'Fantastic headphones, exceeded my expectations!'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 4,
                    'name' => 'Emma Davis',
                    'date' => '2024-03-06',
                    'comment' => 'Solid build quality and comfortable fit, highly recommend.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 3,
                    'name' => 'David Clark',
                    'date' => '2024-03-07',
                    'comment' => 'Average headphones, nothing special.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 4,
                    'name' => 'Sophia Garcia',
                    'date' => '2024-03-08',
                    'comment' => 'Good sound quality, but the design could be improved.'
                ],
                [
                    'image' => 'https://thispersondoesnotexist.com',
                    'rating' => 5,
                    'name' => 'Daniel Martinez',
                    'date' => '2024-03-09',
                    'comment' => 'Best headphones I ever had, highly recommended!'
                ]
            ]
        ],
        'specifications' => [
            'Technology' => 'Bluetooth',
            'Wireless Communication Technology' => 'Wireless',
            'Noise Control' => 'Active Noise Cancellation',
            'Brand' => 'Sony',
            'Form Factor' => 'Over-Ear',
            'Connectivity Technology' => 'Wireless',
            'Color' => 'Black',
            'Control Type' => 'Touch',
            'Item Weight' => '254 grams',
        ],
    ];
    $related_products = [
        [
            'name' => 'Wireless Over-Ear Headphones',
            'image' => $imgs . '/homepage/new-tech-1.png',
            'price' => 99.99
        ],
        [
            'name' => 'Noise-Canceling Bluetooth Headphones',
            'image' => $imgs . '/homepage/new-tech-2.png',
            'price' => 149.99
        ],
        [
            'name' => 'Sport In-Ear Headphones',
            'image' => $imgs . '/homepage/new-tech-3.png',
            'price' => 49.99
        ],
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
        <?php foreach ($product['gallery'] as $img) : ?>
            <img src="<?php echo $img ?>">
        <?php endforeach ?>
    </div>

    <!-- Product Name -->
    <h3 class="mt-4"><?php echo $product['product_name'] ?></h3>

    <!-- reviews -->
    <div class="reviews">
        <div class="row">
            <div class="col-2 stars">
                <h2 class="rate fw-bold"><?php echo $product['reviews']['total_rating'] ?></h2>
                <div class="d-flex mb-2">
                    <?php for ($i = 0; $i < 5; $i++) {
                        if (round($product['reviews']['total_rating']) > $i)
                            echo '<i class="fa fa-star fill"></i>';
                        else
                            echo '<i class="fa-regular fa-star"></i>';
                    } ?>
                </div>
                <span class="total"><?php echo $product['reviews']['total_reviews'] ?> reviews</span>
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
    <p class="mt-4"><?php echo $product['description'] ?></p>

    <!--Specifications -->
    <div class="specifications mt-4">
        <h3>Specifications</h3>
        <div class="row">
            <?php foreach ($product['specifications'] as $key => $value) : ?>
                <div class="item col-6 mb-5">
                    <span class="key"><?php echo $key ?></span>
                    <br>
                    <span class="value"><?php echo $value ?></span>
                </div>
                <br>
            <?php endforeach ?>
        </div>
    </div>

    <!-- Customer Reviews -->
    <div class="customer-reviews">
        <?php foreach ($product['reviews']['feedbacks'] as $feedback) : ?>
            <div class="customer row">
                <img class="col-1 rounded-circle" src="<?php echo $feedback['image'] ?>">
                <div class="col align-self-center">
                    <h6><?php echo $feedback['name'] ?></h6>
                    <span class="date"><?php echo $feedback['date'] ?></span>
                </div>
                <div class="reviews mt-2">
                    <div class="d-flex mb-2 stars">
                        <?php for ($i = 0; $i < 5; $i++) {
                            if ($feedback['rating'] > $i)
                                echo '<i class="fa fa-star fill"></i>';
                            else
                                echo '<i class="fa-regular fa-star"></i>';
                        } ?>
                    </div>
                </div>
                <p class="commment"><?php echo $feedback['comment'] ?></p>
            </div>
        <?php endforeach ?>
    </div>


    <!-- Related Products -->
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
</div>
<?php require '../inc/footer.php'; ?>