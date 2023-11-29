<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
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

    .contact-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .contact-form {
      display: grid;
      grid-gap: 20px;
    }

    .contact-form label {
      font-weight: bold;
    }

    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      margin: 5px 0;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }

    .contact-form button {
      background-color: #333;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .contact-form button:hover {
      background-color: #555;
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

<div class="contact-container">
  <h2>Contact Us</h2>
  <p>If you have any questions or feedback, feel free to reach out to us using the form below.</p>

  <form class="contact-form">
    <label for="name">Your Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Your Message:</label>
    <textarea id="message" name="message" rows="4" required></textarea>

    <button type="submit">Subm
