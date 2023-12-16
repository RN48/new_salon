<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Website Homepage HTML and CSS | CodingNepal</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body class="appointment">
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

    <div class="formbold-main-wrapper">
     
     <div class="formbold-form-wrapper">
    
    <h2>Appointment</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $selectedServices = $_POST['selected_services'];
       
            // Display a form to collect user information
            echo '<form method="POST" action="payment.php">';
            echo '  <input type="hidden" name="selected_services" value="' . implode(',', $selectedServices) . '">';

            echo '  <label for="name" class="formbold-form-label">Name:</label>';
            echo '  <input type="text" name="name" class="formbold-form-input" required><br>';

            echo '  <label for="email" class="formbold-form-label">Email:</label>';
            echo '  <input type="email" name="email" class="formbold-form-input" required><br>';

            echo '  <label for="phone" class="formbold-form-label">Phone:</label>';
            echo '  <input type="text" name="phone" class="formbold-form-input" required><br>';

            echo '  <label for="date_time" class="formbold-form-label">Date and Time:</label>';
            echo '  <input type="datetime-local" name="date_time" class="formbold-form-input" required><br>';

            echo '  <button type="submit" class="formbold-btn" >Proceed to Payment</button>';
            echo '</form>';
        
    } else {
        // Redirect to services page if accessed directly without selecting services
        header('Location: services.php');
        exit();
    }
    ?>
</body>

</html>
