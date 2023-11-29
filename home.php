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

    .navbar {
      background-color: #333;
      padding: 15px;
      text-align: center;
    }

    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
    }

    .featured-books {
      text-align: center;
      margin: 20px;
    }

    .book {
      display: inline-block;
      margin: 10px;
      text-align: center;
      overflow: hidden; /* Ensure the overflow is hidden for the hover effect */
    }

    .book img {
      max-width: 100%;
      height: 200px; /* Set a fixed height for all images */
      object-fit: cover; /* Ensure images maintain aspect ratio and cover the specified height */
      transition: transform 0.3s ease-in-out; /* Add a smooth transition effect */
    }

    .book:hover img {
      transform: scale(1.1); /* Increase the scale on hover (zoom in effect) */
    }
  </style>
</head>
<body>

<div class="navbar">
  <a href="index.html">Home</a>
  <a href="books.php">Books</a>
  <a href="about.php">About Us</a>
  <a href="contact.php">Contact</a>
</div>

<div class="featured-books">
  <h2>Featured Books</h2>
  <div class="book">
    <img src="https://m.media-amazon.com/images/I/81CA-WqU+lL._AC_UF894,1000_QL80_.jpg" alt="Book 1">
    <h3>the kite runner </h3>
    <p>Author: khaled hosseini</p>
    <p>Price: £12.00</p>
  </div>

  <div class="book">
    <img src="https://simonpetrie.files.wordpress.com/2013/10/light.jpg" alt="Book 2">
    <h3>Light </h3>
    <p>Author: M John Harrison</p>
    <p>Price: £14</p>
  </div>

  <div class="book">
    <img src="https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1358173808i/15790842.jpg" alt="Book 3">
    <h3> Life After Life </h3>
    <p>Author: Kate Atkinson</p>
    <p>Price: £17</p>
  </div>
</div>

</body>
</html>
