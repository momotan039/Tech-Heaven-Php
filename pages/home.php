<?php
include "../config/init.php";
include "../inc/header.php";

if(isset($_POST['logout']))
{
    session_unset();
    session_destroy();
}

if(!empty($_SESSION['user']))
{
    ?>
    <div class="container">
        <?php include "../inc/searchBanner.php"?>
        <?php include "../inc/items.php"?>
    </div>
    <?php
}
else
header('location:login.php')
?>
