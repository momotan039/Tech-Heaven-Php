<?php
session_start();
function isActivePage($page)
{
  global $pages;
  return $_SERVER['PHP_SELF'] == $pages . '/' . $page ? 'active' : '';
}

?>
<nav>
  <div>
    <h1 class="logo">
      <a href="<?php echo $root?>">Tech Heaven</a>
    </h1>
      <ul class="menu">
        <li><a href="<?php echo $pages.'/smartphones.php'?>">SmartPhones</a></li>
        <li><a href="<?php echo $pages.'/laptops.php'?>">Laptops</a></li>
        <li><a href="<?php echo $pages.'/gaming.php'?>">Gaming</a></li>
        <li><a href="<?php echo $pages.'/audio.php'?>">Audio</a></li>
      </ul>
  </div>

  <div class="right">
  <i class="fa-solid fa-magnifying-glass"></i>
    <input  type="text" placeholder="Search">
    <div>
      <a href="" ><i class="fa-solid fa-heart"></i></a>
      <a href="" ><i class="fa-solid fa-cart-shopping"></i></a>
    </div>
  </div>
</nav>