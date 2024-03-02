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
      <a href="">Tech Heaven</a>
    </h1>
      <ul class="menu">
        <li><a href="#">New Tech</a></li>
        <li><a href="#">SmartPhones</a></li>
        <li><a href="#">Laptops</a></li>
        <li><a href="#">Gaming</a></li>
        <li><a href="#">Audio</a></li>
        <li><a href="#">Accessories</a></li>
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