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
  </style>
</head>
<body>

<div class="content">
  <h2>Your Bookstore</h2>

  <!-- Featured Books Section -->
  <?php
  // Fetch and display featured books from your backend
  $featuredBooks = [
    ["Book Title 1", "Author 1", 10.99, "https://example.com/book1.jpg"],
    ["Book Title 2", "Author 2", 15.99, "https://example.com/book2.jpg"],
    // Add more books as needed
  ];

  foreach ($featuredBooks as $book) {
    echo '<div class="book">';
    echo '<img src="' . $book[3] . '" alt="' . $book[0] . '">';
    echo '<div class="book-info">';
    echo '<h3>' . $book[0] . '</h3>';
    echo '<p>Author: ' . $book[1] . '</p>';
    echo '<p>Price: £' . $book[2] . '</p>';
    echo '<button onclick="addToBasket(\'' . $book[0] . '\', ' . $book[2] . ')">Add to Basket</button>';
    echo '</div>';
    echo '</div>';
  }
  ?>

  <!-- Your Basket Section -->
  <div id="basket-list"></div>
  <button onclick="clearBasket()">Clear Basket</button>
</div>

<script>
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
  }

  // Function to clear the basket
  function clearBasket() {
    // Clear the basket list
    document.getElementById("basket-list").innerHTML = "";
  }
</script>

</body>
</html>
