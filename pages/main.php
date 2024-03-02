<?php
require '../config/init.php';
require '../inc/header.php';
?>
<div class="container">
    <!-- main header -->
    <div class="main-header mt-1">
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
</div>
<?php require '../inc/footer.php'; ?>