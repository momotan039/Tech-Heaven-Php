<?php
session_start();
function isActivePage($page)
{
  global $pages;
  return $_SERVER['PHP_SELF'] == $pages . '/' . $page ? 'active' : '';
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/ecommerce">Ecommerce App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo isActivePage('home.php') ?>" href="/ecommerce">Home</a>
        </li>
        <?php
        if (empty($_SESSION['user'])) :
        ?>
          <li class="nav-item">
            <a class="nav-link <?php echo isActivePage('login.php') ?>" href="<?php echo $pages ?>/login.php">Login</a>
          </li>
        <?php
        else :
        ?>
          <li class="nav-item">
            <a class="nav-link <?php echo isActivePage('users.php') ?>" href="<?php echo $pages ?>/users.php">Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo isActivePage('editItems.php') ?>" href="<?php echo $pages ?>/items/editItems.php">Items</a>
          </li>
          <form action="../pages/home.php" method="post">
            <li class="nav-item">
              <input name="logout" type="submit" class="nav-link" value="Logout">
            </li>
          </form>
        <?php
        endif;
        ?>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>