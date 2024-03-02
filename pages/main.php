<?php
require '../config/init.php';
require '../inc/header.php';
?>
<div class="container">
    <!-- main header -->
    <div class="main-header mt-3">
        <div class="image my-card" style="background-image: url(<?php echo $imgs . '/main-header.png' ?>);">
            <h1>Welcome to the Tech Paradise</h1>
            <div class="search-contianer">
                <form action="">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input class="my-card" type="text" placeholder="Search by product type, brand, or category">
                    <button class="btn" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <!-- New Tech Arrivals Section -->
    <section class="mt-5">
        <h2 class="fw-bold mb-3">New Tech Arrivals</h2>
        <div class="row">
        <div class="col-4 fragment-item">
            <img class="card" src="<?php echo $imgs.'/homepage/new-tech-1.png'?>">
            <h3 class="title">Latest Smartphone</h3>
            <span class="price">$1,200</span>
        </div>
        <div class="col-4 fragment-item">
            <img class="card" src="<?php echo $imgs.'/homepage/new-tech-2.png'?>">
            <h3 class="title">Gaming Laptop</h3>
            <span class="price">$1,500</span>
        </div>
        <div class="col-4 fragment-item">
            <img class="card" src="<?php echo $imgs.'/homepage/new-tech-3.png'?>">
            <h3 class="title">Wireless Headphones</h3>
            <span class="price">$200</span>
        </div>
        </div>
    </section>
    <!-- Featured Tech Categories -->
    <section class="mt-5">
        <h2 class="fw-bold mb-3">Featured Tech Categories</h2>
        <div class="row">
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/category1.png'?>">
            <h3 class="title">Smartphones</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/category2.png'?>">
            <h3 class="title">Laptops</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/category3.png'?>">
            <h3 class="title">Gaming</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/category4.png'?>">
            <h3 class="title">Audio </h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/category5.png'?>">
            <h3 class="title">Accessories</h3>
        </div> 
        </div>
    </section>
    <!-- Trending Tech Brands -->
    <section class="mt-5">
        <h2 class="fw-bold mb-3">Trending Tech Brands</h2>
        <div class="row">
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/trend1.png'?>">
            <h3 class="title">Apple</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/trend2.png'?>">
            <h3 class="title">Samsung</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/trend3.png'?>">
            <h3 class="title">Dell</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/trend4.png'?>">
            <h3 class="title">Sony</h3>
        </div>
        <div class="col fragment-item">
            <img class="card small" src="<?php echo $imgs.'/homepage/trend5.png'?>">
            <h3 class="title">Logitech </h3>
        </div>
        </div>
    </section>
</div>
<?php require '../inc/footer.php'; ?>
