<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Bookstore</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .search-container {
      float: right;
    }

    .search-container input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #333;
      color: white;
    }

    img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
    }

    .content {
      text-align: center;
      margin: 20px;
    }

    .basket-button {
      background-color: #4CAF50;
      color: white;
      padding: 10px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="topnav">
  <a class="active" href="home.php">Home</a>
  <a href="about.php">About</a>
  <a href="contact.php">Contact</a>
  <div class="search-container">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <input id="search" type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</div>

<div class="content">
  <h2>Welcome to Your Bookstore</h2>
  <p>Discover a wide range of books and explore our collection.</p>
  <!-- Add more content as needed for your homepage -->
</div>

<?php
$host = "localhost";
$username = "2015319";
$password = "4d5c29";
$database = "db2015319";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize search query
$search = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form data
    $search = $_POST['search'];
}

// Retrieve data from the database with optional search
$sql = "SELECT * FROM `books` WHERE `title` LIKE '%$search%' OR `author` LIKE '%$search%'";  // Update with your actual table name and columns
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    echo "<table>";
    echo "<tr><th>Image</th> <th>Title</th> <th>Author</th> <th>Rating</th> <th>Price</th></tr>";
    
    if ($result->num_rows > 0) {
        // Fetch data and display it
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // Display the image in the first cell
            echo "<td>";
            echo '<img id="img" src="' . $row["image"] . '" alt="image">';
            echo "</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo "<td>" . $row["rating"] . "</td>";
            echo "<td>" . $row["price"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>0 results</td></tr>";
    }
    
    echo "</table>";
}

// Close the connection
$conn->close();
?>

<!-- Basket Button -->
<!-- Basket Button -->
<a href="basket.php" class="basket-button">Add to Basket</a>
<a href="signup_process.php" class="signup-button">Sign Up</a>
<a href="login.php" class="login-button">log in</a>


</body>
</html>
