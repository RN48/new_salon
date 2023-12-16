<!DOCTYPE html>
<html lang="en">
<head>
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
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
            <h2 class="formbold-form-label-2">Login</h2>
            <form method="POST" action="process_login.php" class="formbold-form">
                <label for="username_or_email" class="formbold-form-label">Username or Email:</label>
                <input type="text" name="username_or_email" class="formbold-form-input" required>

                <label for="password" class="formbold-form-label">Password:</label>
                <input type="password" name="password" class="formbold-form-input" required>

                <button type="submit" class="formbold-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
