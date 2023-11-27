<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Drug Details</title>
  <link rel="stylesheet" href="../styles/stylesdetails.css">
  <style>
    body {
      background-image: url("../assets/images/hero_1.jpg");
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <h1>Drug Dashboard</h1>
      <nav>
        <ul>
          <li><a href="#categories">Categories</a></li>
          <li><a href="#drug1">Painkiller</a></li>
          <li><a href="#drug2">Antibiotic</a></li>
          <li><a href="#drug3">Moister</a></li>
        </ul>
      </nav>
    </header>

    <section id="details">
      <h2>Painkiller Details</h2>
      <div class="drug-details">
        <img src="../assets/images/p-1-removebg-preview.png" alt="Drug 1">
        <h3>Panadol</h3>
        <p>Panadol is a popular over-the-counter pain reliever and fever reducer. It contains paracetamol as its active ingredient.</p>

        <!-- Dropdown menu for additional options -->
        <div class="dropdown">
          <button class="dropbtn">Options</button>
          <div class="dropdown-content">
            <a href="dosage.html">Dosage Information</a>
            <a href="side_effects.html">Side Effects</a>
            <a href="customer_review.html">Customer Reviews</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Rest of the content -->

    <footer>
      <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer>
  </div>
</body>
</html>
