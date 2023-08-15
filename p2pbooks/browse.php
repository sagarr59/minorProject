<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['email'])) {
  // Display an alert message
  echo "<script>alert('Please log in before browsing books.'); window.location.href='login.php';</script>";
  exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "bookDetails";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM books";
$result = $conn->query($sql);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SASTOBOOKS - Browse</title>
  <link rel="stylesheet" href="browse.css">
</head>

<body>
  <header>
  <nav>
  <div class="logo">
    <a href="homepage.php"><img src="mylogo.png" alt="Logo" class="logo"></a>
  </div>
  <ul class="navigation">
    <li><a href="homepage.php">Home</a></li>
    <li><a href="browse.php">Browse</a></li>
    <li><a href="sell.php">Sell</a></li>
    <?php
    if (isset($_SESSION['fullname'])) {
      echo '<li><a href="logout.php">Logout</a></li>';
    } else {
      echo '<li><a href="login.php">Login/Signup</a></li>';
    }
    ?>
  </ul>
</nav>

  </header>

  <main>
    <section class="browse-section">
      <h2>Browse Books</h2>

      <?php
// Loop through the query result
echo '<div class="book-grid">'; // Open the book-grid container
while ($row = $result->fetch_assoc()) {
  // Extract book details
  $bookName = $row['book_name'];
  $price = $row['price'];
  $sellerName = $row['seller_name'];
  $location = $row['location'];
  $phone = $row['phone'];

  // Output the book details dynamically
  echo '<div class="book">';
  echo '<img src="images/book_placeholder.png" alt="Book">';
  echo "<h3>$bookName</h3>";
  echo "<p>Price: Rs. $price</p>";
  echo "<p>Seller: $sellerName</p>";
  echo "<p>Location: $location</p>";
  echo "<p>Phone: $phone</p>";
  echo '<button class="chat-btn">Chat with Seller</button>';
  echo '</div>';
}
echo '</div>'; // Close the book-grid container
?>



      <div class="book-grid">
        <div class="book">
          <img src="images/book1.png" alt="Book 1">
          <h3>नेपालको सेयर बजार</h3>
          <p>Price: Rs.150</p>
          <p>Seller: Ram Thapa</p>
          <p>Location: Kalanki, KTM</p>
          <p>Phone: 9841405060</p>
          <button class="chat-btn">Chat with Seller</button>
        </div>

        <div class="book">
          <img src="images/book2.png" alt="Book 2">
          <h3>Biology (Class 12)</h3>
          <p>Price: Rs.250</p>
          <p>Seller: Saroj Karki</p>
          <p>Location: Fulbari, Butwal</p>
          <p>Phone: 9845345343</p>
          <button class="chat-btn">Chat with Seller</button>
        </div>

        <div class="book">
          <img src="images/book3.png" alt="Book 3">
          <h3>Chemistry (Class 12)</h3>
          <p>Price: Rs.200</p>
          <p>Seller: Saroj Karki</p>
          <p>Location: Fulbari, Butwal</p>
          <p>Phone: 9845345343</p>
          <button class="chat-btn">Chat with Seller</button>
        </div>

        <div class="book">
          <img src="images/book4.png" alt="Book 4">
          <h3>BEYOND POSSIBLE</h3>
          <p>Price: Rs.300</p>
          <p>Seller: Astha Basnet</p>
          <p>Location: Naikap, Kathmandu</p>
          <p>Phone: 9810203040</p>
          <button class="chat-btn">Chat with Seller</button>
        </div>

        <div class="book">
          <img src="images/book5.png" alt="Book 5">
          <h3>How Hitler Was Made</h3>
          <p>Price: 200</p>
          <p>Seller: Shisir Magar</p>
          <p>Location: Old Bazar, Pokhara</p>
          <p>Phone: 9818333450</p>
          <button class="chat-btn">Chat with Seller</button>
        </div>

        <!-- more books -->
      </div>
    </section>
  </main>

  <footer>
    <div class="footer">
      <p>&copy; 2023 SASTOBOOKS. All rights reserved.</p>
    </div>
  </footer>

  <!--JS-->
  <script src="script.js"></script>
</body>
</html>
         