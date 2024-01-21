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
    echo "<h1>Welcome Back <span class='text-primary'>".$_SESSION['user']['UserName']."</span> :)</h1>";
    ?>
    <div class="container">
        <?php include "../inc/items.php"?>
    </div>
    <?php
}
else
header('location:login.php')
?>
