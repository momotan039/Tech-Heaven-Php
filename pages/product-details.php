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
        ];
    } else {
        header('Location:../index.php');
        exit();
    }
    ?>
    <!-- Breadcrumb -->
    <?php include '../inc/product_detials/prodcut_detials_breadcrumb.php';?>


    <!-- Gallery -->
    <?php include '../inc/product_detials/prodcut_detials_gallery.php';?>


    <!-- Product Name -->
    <h3 class="mt-4"><?php echo $product['name'] ?></h3>

    <!-- reviews -->
    <?php include '../inc/product_detials/prodcut_detials_reviews.php';?>

    <!-- description -->
    <p class="mt-4"><?php echo $product['description'] ?></p>

    <!--Specifications -->
    <?php include '../inc/product_detials/prodcut_detials_specifications.php';?>


    <!-- Customer Reviews -->
    <?php include '../inc/product_detials/prodcut_detials_customer_reviews.php';?>


    <!-- Related Products -->
    <?php include '../inc/product_detials/prodcut_detials_related_products.php';?>

</div>
<?php require '../inc/footer.php'; ?>