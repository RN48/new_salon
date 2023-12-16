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
  <body class="services">
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

    

  <section class="services-container">
    <form method="POST" action="appointment.php">
      <div class="row">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "newsalon";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 col-md-6">';
                echo '  <article class="card-item mb-5">';
                echo '    <div class="card-image text-center">';
                echo '      <a >';
                echo '        <img style="height:300px;"  src="' . $row['image'] . '" alt="post-image" class="img-fluid rounded-5">';
                echo '      </a>';
                echo '    </div>';
                echo '    <div class="card-body text-center my-3">';
                echo '      <h3 class="">';
                echo '        <a  class="text-primary">' . $row['title'] . '</a>';
                echo '      </h3>';
                echo '      <p>' . $row['description'] . '</p>';
                echo '      <p class="text-success">Price: ' . $row['price'] . ' SAR</p>';
                echo '      <input type="checkbox" name="selected_services[]" value="' . $row['id'] . '"> Select';
                echo '    </div>';
                echo '  </article>';
                echo '</div>';
            }

            $conn->close();
            ?>
        </div>

        <button type="submit" class="services-btn" > Booking a Appointment</button>
    </form>
  </section>
</body>
</html>
