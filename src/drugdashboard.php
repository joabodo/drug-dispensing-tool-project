<!DOCTYPE html>
<html lang="en">
<head>
  <title>Drug Dashboard</title>
  <link rel="stylesheet" href="../styles/styles8.css">
  <link rel="stylesheet" href="../styles/styles_dashboard.css">
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
          <li class="dropdown">
            <a href="#drug1">Panadol</a>
            <div class="dropdown-content">
              <a href="#">Dosage Information</a>
              <a href="#">Side Effects</a>
              <a href="#">Customer Reviews</a>
            </div>
          </li>
          <li class="dropdown">
            <a href="#drug2">Paracetamodol</a>
            <div class="dropdown-content">
              <a href="#">Dosage Information</a>
              <a href="#">Side Effects</a>
              <a href="#">Customer Reviews</a>
            </div>
          </li>
          <!-- Add dropdowns for other drugs similarly -->
        </ul>
      </nav>
    </header>

    <section id="categories">
      <h2>Drug Categories</h2>
      <!-- Add category images and links as needed -->
    </section>

    <section id="drug1">
      <h2>PainKiller</h2>
      <div class="drug">
        <img src="../assets/images/p-1-removebg-preview.png" alt="Drug 1">
        <h3>Panadol</h>
        <p> </p>
        <a href="details.php">View Details</a>
      </div>
    </section>

    <!-- Add sections for other drugs similarly -->

    <!-- Rest of the content -->

    <footer>
      <p>&copy; 2023 My Website. All rights reserved.</p>
    </footer>
  </div>

  <script>
    // JavaScript for rotating drugs every 10 seconds
    const drugs = document.querySelectorAll('.drug');
    let currentIndex = 0;

    function showNextDrug() {
      drugs[currentIndex].classList.remove('active');
      currentIndex = (currentIndex + 1) % drugs.length;
      drugs[currentIndex].classList.add('active');
    }

    setInterval(showNextDrug, 10000); // Rotate every 10 seconds (10000ms)
  </script>
</body>
</html>
