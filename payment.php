<?php
session_start(); // Ensure session is started

include 'db.php'; // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve information from the form
    $selectedServices = isset($_POST['selected_services']) ? explode(',', $_POST['selected_services']) : [];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date_time = $_POST['date_time'];

    // Validate the information (add more validation as needed)
    if (empty($name) || empty($email) || empty($phone) || empty($date_time)) {
        echo "Please fill in all the required fields.";
        // You might want to include a back button or redirect to the previous page here
        exit();
    }

    // Payment processing
    $cardNumber = isset($_POST['cardNumber']) ? $_POST['cardNumber'] : '';
    $expirationDate = isset($_POST['expirationDate']) ? $_POST['expirationDate'] : '';
    $cvv = isset($_POST['cvv']) ? $_POST['cvv'] : '';

    $errors = [
        'cardNumberError' => '',
        'expirationDateError' => '',
        'cvvError' => '',
    ];

    // Validate payment information
    if (empty($cardNumber)) {
        $errors['cardNumberError'] = 'Please enter your card number';
    } elseif (!is_numeric($cardNumber) || strlen($cardNumber) != 16) {
        $errors['cardNumberError'] = 'Please enter a valid 16-digit card number';
    }

    if (empty($expirationDate)) {
        $errors['expirationDateError'] = 'Please enter your expiration date';
    } elseif (!preg_match('/^\d{2}\/\d{4}$/', $expirationDate)) {
        $errors['expirationDateError'] = 'Please enter a valid expiration date (MM/YYYY)';
    }

    if (empty($cvv)) {
        $errors['cvvError'] = 'Please enter your CVV';
    } elseif (!is_numeric($cvv) || strlen($cvv) != 3) {
        $errors['cvvError'] = 'Please enter a valid 3-digit CVV';
    }

    if (!array_filter($errors)) {
        // Establish a database connection
        $conn = mysqli_connect("localhost", "root", "root", "newsalon");

        // Check the connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // To enter the input as a string, not JavaScript.
        $cardNumber = mysqli_real_escape_string($conn, $cardNumber);
        $expirationDate = mysqli_real_escape_string($conn, $expirationDate);
        $cvv = mysqli_real_escape_string($conn, $cvv);

        // Insert payment details into the database
        $sql = "INSERT INTO payment (cardNumber, expirationDate, cvv) VALUES ('$cardNumber','$expirationDate','$cvv')";

        if (mysqli_query($conn, $sql)) {
            echo 'Successful payment!';
            // Additional logic for successful payment, e.g., redirect to a thank you page
        } else {
            echo 'Error:' . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }

} else {
    // Redirect to services page if accessed directly without submitting the form
    header('Location: services.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payment Details</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body class="payment">

    <header class="header">
      <nav class="navbar">
        <h2 class="logo"><a>Lavender</a></h2>
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
          <li><a href="payment.php">Payment</a></li>
          <li><a href="profile.php">Profile</a></li>
        </ul>
        <div class="buttons">
          <a href="login.php" class="signin">Log In</a>
          <a href="signup.php" class="signup">Sign Up</a>
        </div>
      </nav>
    </header>
    <div class="container">
        <div class="appointment-details">
            <?php
            echo "<h2>Appointment Details</h2>";
            echo "<p>Name: $name</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Phone: $phone</p>";
            echo "<p>Date and Time: $date_time</p>";
            ?>
        </div>
    </div>
    <div class="formbold-main-wrapper">
        
        <div class="formbold-form-wrapper">
            <h2>Payment Details</h2>
            <div class="container">

                <!-- create form-->
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="formbold-form">

                    <label for="cardNumber" class="formbold-form-label">Card Number</label>
                    <input type="text" id="cardNumber" placeholder="Card number" class="formbold-form-input" value="<?php echo $cardNumber ?>">
                    <div id="cardNumber" class="form-text error"><?php echo $errors['cardNumberError'] ?></div>

                    <label for="expirationDate" class="formbold-form-label">Expiration Date</label>
                    <input type="text" id="expirationDate" placeholder="MM/YYYY" class="formbold-form-input" value="<?php echo $expirationDate ?>">
                    <div id="expirationDate" class="form-text error"><?php echo $errors['expirationDateError'] ?></div>

                    <label for="cvv" class="formbold-form-label">CVV</label>
                    <input type="text" id="cvv" placeholder="CVV" class="formbold-form-input" value="<?php echo $cvv ?>">
                    <div id="cvv" class="form-text error"><?php echo $errors['cvvError'] ?></div>

                    <label for="amount" class="formbold-form-label">Total: </label>
                    <output type="text" id="amount">
                    
                    <button type="submit" class="formbold-btn">Checkout</button>

                </form>
            </div>
        </div>
    </div>
</body>
</html>

