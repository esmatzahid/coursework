<?php
session_start();

$host = "localhost";
$username = "2015319";
$password = "4d5c29"; // Replace with your actual database password
$database = "db2015319";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkUsernameResult = $conn->query($checkUsernameQuery);

    if ($checkUsernameResult->num_rows > 0) {
        $registrationError = "Username is already taken. Please choose another.";
    } else {
        // Insert new user into the database
        $insertUserQuery = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";
        if ($conn->query($insertUserQuery) === true) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
        } else {
            $registrationError = "Error creating user: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #2980B9, #6DD5FA, #ffffff);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .registration-container {
      max-width: 400px;
      width: 100%;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      box-sizing: border-box;
    }

    h2 {
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 8px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      box-sizing: border-box;
    }

    button:hover {
      background-color: #45a049;
    }

    p {
      color: red;
      text-align: center;
    }
  </style>
</head>
<body>

<div class="registration-container">
  <h2>Create an Account</h2>
  <?php
  if (isset($registrationError)) {
      echo "<p>$registrationError</p>";
  }
  ?>
  <form method="POST" action="register.php">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Register</button>
  </form>
</div>

</body>
</html>
