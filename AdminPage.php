<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="./CSS/style.css">
</head>
<body>
<div class="navbar">
        <a><img src="./PICTURE/Logo.png" alt="logo" width="150" height="100"></a>
        <a href="Dashboard.php">Dashboard</a>
        <a href="BookCust.php">Booking</a>
        <a href="CustData.php">Customer</a>
        <a href="StaffData.php">Staff</a>
        <a href="Message.php">Message</a>
        <a href="SignUpAdmin.php">Registration</a>
        <?php if(isset($_SESSION["loggedin"]) == true) {
              if($_SESSION["loggedin"] == "yes") { ?>
                <a href="" class=""></a>
        <?php   }
            } 
            else { ?>
              <a href="./SignOut.php" class="signout">Logout</a>
        <?php } ?>
</div>
<hr style="height:1px;border-width:0;background-color:rgb(209, 127, 11)">

  <?php
    if(isset($_SESSION["message"]) == true) {
      echo '<p>' . $_SESSION["message"] . '</p>';
      $_SESSION["message"] = null;
    }
    
  ?>