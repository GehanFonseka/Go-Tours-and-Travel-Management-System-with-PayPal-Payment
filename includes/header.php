<?php
session_start();

define("APPURL", "http://localhost/wooxtravel");
define("ADMINURL","http://localhost/wooxtravel/admin-panel");
define("COUNTRIESIMAGES", "http://localhost/wooxtravel/admin-panel/countries-admins/images_countries");
define("CITIESIMAGES", "http://localhost/wooxtravel/admin-panel/cities-admins/images_cities");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Go Tours </title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo APPURL; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/fontawesome.css">
  <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/owl.css">
  <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo APPURL; ?>/assets/css/theme.css">



</head>

<body class="light-mode">

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="<?php echo APPURL; ?>/index.php" class="logo">
            <img src="assets/images/logo1.png.png" alt="Logo"
    style="margin-top: -9px; width: 90px; height: 90px; margin-right: 15px;">
<span
    style="margin-top:-2px; font-family: 'Poppins', sans-serif; font-size: 36px; font-weight: 700; color: white; text-transform: uppercase; letter-spacing: 2px; display: inline-block; position: relative; text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5), -2px -2px 6px rgba(255, 255, 255, 0.3), 0px 0px 15px rgba(255, 0, 255, 0.7), 0px 0px 25px rgba(0, 255, 255, 0.6); transform: perspective(600px) rotateX(10deg); transition: all 0.3s ease;">
    Go Tours
</span>
 </a>


            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a style="font-size: 20px; font-family: 'Roboto', sans-serif;" href="<?php echo APPURL; ?>/index.php" class="active">Home</a></li>
              <li><a style="font-size: 20px; font-family: 'Roboto', sans-serif;" href="<?php echo APPURL; ?>/deals.php">Deals</a></li>
              <?php if (isset($_SESSION["username"])): ?>
                <li class="nav-item dropdown">
                  <a style="font-size: 20px; font-family: 'Roboto', sans-serif;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <?php echo $_SESSION['username']; ?>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="border-radius: 10px; padding: 0; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff; width: 200px; position: absolute; top: 100%; left: 0;">
        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>/users/user.php?id=<?php echo $_SESSION['user_id']; ?>" style="padding: 12px 20px; font-size: 16px; color: #333; text-decoration: none; transition: background-color 0.3s ease;">My Bookings</a></li>
        <li><hr class="dropdown-divider" style="margin: 0;"></li>
        <li><a class="dropdown-item text-black" href="<?php echo APPURL; ?>/auth/logout.php" style="padding: 12px 20px; font-size: 16px; color: #333; text-decoration: none; transition: background-color 0.3s ease;">Logout</a></li>
      </ul>
                </li>
              <?php else: ?>
                <li><a style="font-size: 20px; font-family: 'Roboto', sans-serif;" href="<?php echo APPURL; ?>/auth/login.php">Login</a></li>
                <li><a style="font-size: 20px; font-family: 'Roboto', sans-serif;" href="<?php echo APPURL; ?>/auth/register.php">Register</a></li>
                <li><a style="font-size: 20px; font-family: 'Roboto', sans-serif;" href="<?php echo ADMINURL; ?>/admins/login-admins.php">Admin</a></li>
              <?php endif; ?>
              <!-- Dark Mode Toggle Button Inside List Item -->
              <li>
                <button id="toggleTheme"
                  style="position: fixed; top: -7px; right: 60px; padding: 10px; background-color: transparent; color: #22b3c1; border: none; font-size: 35px; cursor: pointer; transition: all 0.3s ease; box-shadow: none; border-radius: 50%;">🌙</button>



              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- Scripts -->
  <script src="<?php echo APPURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

<!-- ***** Header Area End ***** -->



<!-- Scripts -->
<script src="<?php echo APPURL; ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo APPURL; ?>/assets/js/theme-toggle.js" defer></script>
</body>

</html>