<?php
require '../config/init.php';
require '../inc/header.php';
?>
<div class="prodcut-detials container mt-4">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stm = 'SELECT * FROM products 
                INNER JOIN categories on products.category_id=categories.category_id
                INNER JOIN Subcategories on products.sub_category_id=subcategories.subcategory_id
                WHERE product_id=?';

        $query = $con->prepare($stm);
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_ASSOC);

        // get images
        $query = $con->query('SELECT * FROM `product_images` WHERE product_id=' . $id);
        $gallery = $query->fetchAll(PDO::FETCH_ASSOC);

        // get reviews
        $query = $con->query('SELECT * FROM reviews
          INNER JOIN  users on users.user_id=reviews.user_id
          WHERE reviews.product_id=' . $id);
        $reviews = $query->fetchAll(PDO::FETCH_ASSOC);
        $total_rating = $reviews?floor(array_sum(array_column($reviews, 'rating')) / count($reviews)):0;
        //   get rating as percentage
        $query = $con->query('SELECT 
                                ROUND(SUM(rating = 5) / COUNT(*) * 100) AS "5", 
                                ROUND(SUM(rating = 4) / COUNT(*) * 100) AS "4", 
                                ROUND(SUM(rating = 3) / COUNT(*) * 100) AS "3", 
                                ROUND(SUM(rating = 2) / COUNT(*) * 100) AS "2", 
                                ROUND(SUM(rating = 1) / COUNT(*) * 100) AS "1" 
                              FROM Reviews WHERE product_id =' . $id);

        $reviews_percentage = $query->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location:../index.php');
        exit();
    }
    ?>
    <?php
    $product['star_rating'] = [
        '5' => '20%',
        '4' => '30%',
        '3' => '50%',
        '2' => '20%',
        '1' => '10%'
    ];
    $product['reviews'] = [
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
            <li><?php echo $product['category_name'] ?></li>
            <li><?php echo $product['subcategory_name'] ?></li>
            <li><?php echo $product['name'] ?></li>
        </ul>
    </div>

    <!-- Gallery -->
    <div class="gallery">
        <?php foreach ($gallery as $img) : ?>
            <img src="<?php echo $img['path'] ?>">
        <?php endforeach ?>
    </div>

    <!-- Product Name -->
    <h3 class="mt-4"><?php echo $product['name'] ?></h3>

    <!-- reviews -->
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

    <!-- description -->
    <p class="mt-4"><?php echo $product['description'] ?></p>

    <!--Specifications -->
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

    <!-- Customer Reviews -->
    <div class="customer-reviews">
        <?php foreach ($reviews as $feedback) : ?>
            <div class="customer row">
                <img height="66" class="col-1 rounded-circle" src="<?php echo $feedback['user_pic'] ?>">
                <div class="col align-self-center">
                    <h6><?php echo $feedback['username'] ?></h6>
                    <span class="date"><?php echo $feedback['review_date'] ?></span>
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