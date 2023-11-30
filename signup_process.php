<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        .success {
            color: #4CAF50;
        }

        .error {
            color: #f44336;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Sign Up</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Sign Up">
    </form>

    <?php
    // Database credentials
    $host = "localhost";
    $username = "2015319";
    $password_db = "4d5c29";
    $database = "db2015319";

    // Create connection
    $conn = new mysqli($host, $username, $password_db, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the 'Users' table if not exists
    $tableCreationQuery = "CREATE TABLE IF NOT EXISTS Users (
        ID INT AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(255) NOT NULL,
        Email VARCHAR(255) NOT NULL,
        Password VARCHAR(255) NOT NULL
    )";

    if ($conn->query($tableCreationQuery) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    // Process signup form if submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Sanitize and validate inputs
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // Check if username and email are not empty before inserting
        if (!empty($username) && !empty($email)) {
            // SQL query to insert data
            $insertQuery = "INSERT INTO Users (`Username`, `Email`, `Password`) VALUES ('$username', '$email', '$password')";

            if ($conn->query($insertQuery) === TRUE) {
                echo "<p class='success'>New record created successfully</p>";
            } else {
                echo "<p class='error'>Error: " . $insertQuery . "<br>" . $conn->error . "</p>";
            }
        } else {
            echo "<p class='error'>Username and Email cannot be empty</p>";
        }
    }

    // Close the connection
    $conn->close();
    ?>

</div>

</body>
</html>
