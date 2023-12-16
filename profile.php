<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Website Homepage HTML and CSS | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a href="#">Lavender</a></h2>
        <input type="checkbox" id="menu-toggle" />
        <label for="menu-toggle" id="hamburger-btn">
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M3 12h18M3 6h18M3 18h18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
          </svg>
        </label>
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="appointment.php">Appointment</a></li>
          <li><a href="profile.php">Profile</a></li>
        </ul>
        <div class="buttons">
          <a href="login.php" class="signin">Log In</a>
          <a href="signup.php" class="signup">Sign Up</a>
        </div>
      </nav>
    </header>


    <?php
// Include the profile_logic.php file
include 'profile_logic.php';
?>

<!-- Display user information -->
<p>Username: <?php echo $user['username']; ?></p>
<p>Email: <?php echo $user['email']; ?></p>
<p>Phone: <?php echo $user['phone']; ?></p>

<div class="profile-wrapper">
    <div class="profile-form">
        <h2>Your Profile</h2>
        <!-- Form for updating user information -->

        <form method="POST" action="profile.php">
            <label for="new_username" class="profile-wrapper-lable">New Username:</label>
            <input type="text" name="new_username" class="profile-wrapper-input" value="<?php echo $user['username']; ?>">

            <label for="new_email" class="profile-wrapper-lable">New Email:</label>
            <input type="email" name="new_email" class="profile-wrapper-input" value="<?php echo $user['email']; ?>">

            <label for="new_phone" class="profile-wrapper-lable">New Phone:</label>
            <input type="text" name="new_phone" class="profile-wrapper-input" value="<?php echo $user['phone']; ?>">

            <button type="submit" class="profile-btn">Update Profile</button>
        </form>
    </div>
</div>

  </body>
</html>
