<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
<div class="navbar">
        <a><img src="./PICTURE/Logo.png" alt="logo" width="150" height="100"></a>
        <a href="Home.php">Hotel</a>
        <a href="Promotion.php">Promotion</a>
        <a href="RoomPrice.php">Room</a>
        <a href="Service.php">Service</a>
        <a href="Booking.php">Booking</a>
        <a href="Contactus.php">Contact Us</a>
        <?php if(isset($_SESSION["loggedin"]) == true) {
              if($_SESSION["loggedin"] == "yes") { ?>
                <a href="./SignOut.php" class="signout">Logout</a>
        <?php   }
            } 
            else { ?>
              <a href="./SignIn.php" class="signin">Sign In</a>
        <?php } ?>
</div>

  <?php
    if(isset($_SESSION["message"]) == true) {
      echo '<p>' . $_SESSION["message"] . '</p>';
      $_SESSION["message"] = null;
    }
    
  ?>
