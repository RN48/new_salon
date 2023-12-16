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

    <div class="formbold-form-wrapper signup">
    <h2 class="formbold-form-label-2-signup">Sign Up</h2>
        <form method="POST" action="process_signup.php">
    <label for="username" class="formbold-form-label signup">Username:</label>
    <input type="text" name="username" class="formbold-form-input signup" required>

    <label for="email" class="formbold-form-label signup">Email:</label>
    <input type="email" name="email" class="formbold-form-input signup" required>

    <label for="phone" class="formbold-form-label signup">Phone:</label>
    <input type="text" name="phone" class="formbold-form-input signup" required>

    <label for="password" class="formbold-form-label signup">Password:</label>
    <input type="password" name="password" class="formbold-form-input signup" required>

    <button type="submit" class="formbold-btn signup">Sign Up</button>
</div>
    </form>
</body>
</html>
