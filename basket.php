<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Bookstore</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      text-align: center;
    }

    .content {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      color: #333;
    }

    .book {
      margin: 10px 0;
      padding: 10px;
      background-color: #f8f8f8;
      border-radius: 4px;
      overflow: hidden;
    }

    .book img {
      max-width: 100%;
      height: auto;
      display: block;
      margin: 0 auto;
      border-radius: 4px;
    }

    .book-info {
      text-align: left;
      margin-top: 10px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    #basket-list {
      list-style: none;
      padding: 0;
    }

    .back-button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #333;
      color: white;
      text-decoration: none;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<div class="content">
  <h2>Your Bookstore</h2>

  <!-- Featured Books Section -->
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

    // Retrieve data from the database
    $sql = "SELECT * FROM books";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === false) {
      echo "Error: " . $conn->error;
    } else {
      // Display books
      while ($row = $result->fetch_assoc()) {
        echo '<div class="book">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["title"] . '">';
        echo '<div class="book-info">';
        echo '<h3>' . $row["title"] . '</h3>';
        echo '<p>Author: ' . $row["author"] . '</p>';
        echo '<p>Price: £' . $row["price"] . '</p>';
        echo '<button onclick="addToBasket(\'' . $row["title"] . '\', ' . $row["price"] . ')">Add to Basket</button>';
        echo '</div>';
        echo '</div>';
      }
    }

    // Close the connection
    $conn->close();
  ?>

  <!-- Your Basket Section -->
  <div id="basket-list"></div>
  <button onclick="clearBasket()">Clear Basket</button>

  <!-- Back Button -->
  <a href="books.php" class="back-button">Back to Books</a>
</div>

<script>
  // Your existing JavaScript code
  // Function to add a book to the basket
  function addToBasket(title, price) {
    // Create a new list item for the basket
    var listItem = document.createElement("div");
    listItem.classList.add("book");
    listItem.innerHTML = '<div class="book-info">' +
      '<h3>' + title + '</h3>' +
      '<p>Price: £' + price + '</p>' +
      '</div>';

    // Append the book info to the basket list
    document.getElementById("basket-list").appendChild(listItem);

    // Save the added book to localStorage
    saveBasketToLocalStorage();
  }

  // Function to clear the basket
  function clearBasket() {
    // Clear the basket list
    document.getElementById("basket-list").innerHTML = "";

    // Clear the basket data from localStorage
    localStorage.removeItem("basket");
  }

  // Function to save basket data to localStorage
  function saveBasketToLocalStorage() {
    // Get the current basket data from localStorage
    var basketData = localStorage.getItem("basket");

    // Parse the basket data into an array or create an empty array if it doesn't exist
    var basketArray = basketData ? JSON.parse(basketData) : [];

    // Add the new book to the basket array
    basketArray.push({
      title: title,
      price: price
    });

    // Save the updated basket data back to localStorage
    localStorage.setItem("basket", JSON.stringify(basketArray));
  }

  // Function to load basket data from localStorage
  function loadBasketFromLocalStorage() {
    // Get the basket data from localStorage
    var basketData = localStorage.getItem("basket");

    // Parse the basket data into an array or create an empty array if it doesn't exist
    var basketArray = basketData ? JSON.parse(basketData) : [];

    // Display the books in the basket
    basketArray.forEach(function (book) {
      addToBasket(book.title, book.price);
    });
  }

  // Load the basket data when the page is loaded
  window.onload = function () {
    loadBasketFromLocalStorage();
  };
</script>


</body>
</html>

</script>

</body>
</html>
