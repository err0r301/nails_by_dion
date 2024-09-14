<?php 
  session_start();
  if ($page == "profile" || $page == "notification")
    if(!isset($_SESSION["user"]))
      header('Location: /../auth/login.php');
?>

<header class="header">

  <div class="header-bottom" data-header>
    <a href="index.php">
      <img class="logo" src="/_images/logo.png" alt="Logo">
    </a>
    <div class="hamburger-menu">
      <div class="hamburger-icon">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    
    <nav class="navbar" data-navbar>
      <ul class="navbar-list">

        <li class="<?php if ($page == 'home'){echo "active-link";}?> navbar-item">
          <a href="index.php" class="navbar-link" data-nav-link>Home</a>
        </li>

        <!--<li class="<?php if ($page == 'service'){echo "active-link";}?> navbar-item">
          <a href="service.php" class="navbar-link" data-nav-link>Services</a>
        </li>-->

        <li class="<?php if ($page == 'appointment'){echo "active-link";}?> navbar-item">
          <a href="appointments.php" class="navbar-link" data-nav-link>Appointments</a>
        </li>

         <li class="<?php if ($page == 'gallery'){echo "active-link";}?> navbar-item">
          <a href="gallery.php" class="navbar-link" data-nav-link>Gallery</a>
        </li>

        <li class="navbar-item" style="<?php if (isset($_SESSION["user"])){echo "display: none;";}else{echo "display: flex;";}?>">
          <a href="../auth/login.php" class="navbar-link" data-nav-link>Login</a>
        </li>
<!--
        <li class="book-nav">
          <a href="booking.php" class="navbar-link" data-nav-link>Book Now</a>
        </li>
-->
        <li class="user-item" onclick="this.classList.toggle('active')" style="<?php if (isset($_SESSION["user"])){echo "display: inline-block;";}else{echo "display: none;";}?>">
            <i class="fa fa-user"></i>
            <div class="dropdown-content">
              <a href="../client/profile.php">Profile</a>
              <a href="../client/user_notifications.php">Notification</a>
              <a href="../auth/logout.php">Logout</a>
            </div>
        </li>

      </ul>
    </nav>
  </div>


  <div class="header-top">
    <ul class="header-top-list">
      <div>
        <li class="header-top-item call">
          <i class="fa fa-phone"></i>
          <p class="item-title">Call Us :</p>
          <p class="item-text">+27 65 146 1582</p>
        </li>
  
        <li class="header-top-item header-opening-times">
          <i class="fa fa-clock"></i>
          <p class="item-title">Opening Hour :</p>
          <p class="item-text">Mon-Fri: 8am-6pm   Saturdays: 8am-5pm</p>
        </li>
      </div>
    </ul>
  </div>
</header>