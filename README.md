# Book-Store Project Documentation
The Book-Store project is a PHP-based web application that allows users to browse, search, and purchase books online. It provides essential features like adding books to the cart, managing cart items, and viewing detailed book information. This project is designed for a seamless shopping experience with a simple and user-friendly interface, backed by a MySQL database for managing book records and user data.

# Features
* Cart Management: Users can add books to the cart and delete items from the cart.
* Book Search: Allows users to search for books by title or author.
* Book Details: View detailed information about each book.
* Shop Functionality: Simulates an online shopping experience for purchasing books.

# Prerequisites
Before you begin, ensure you have met the following requirements:

You have installed XAMPP on your system..
You have a basic understanding of PHP and MySQL.

# Installation
1. Clone the Repository

git clone https://github.com/jadavtanvi/Book-Store.git
2. Start XAMPP

Open XAMPP Control Panel.
Start the Apache and MySQL modules.
3. Create the Database

Open phpMyAdmin in your web browser.
Create a new database named php_project.
Import the SQL file (if available) to set up the required tables.

# Configuration
- Database Connection
Open the config.php file and update the database connection details: ``` 
// <?php $servername = "localhost"; $username = "root"; 
// Default XAMPP MySQL username $password = ""; 
// Default XAMPP MySQL password $dbname = "php_project";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  ?>
  ```
# Usage
1. Homepage: Browse available books with details like title, author, and price.
2. Search Functionality: Enter keywords to search for specific books.
3. Add to Cart: Select a book and add it to your cart for purchase.
4. View Cart: Check all books added to the cart, with options to update or delete items.
5. Delete from Cart: Remove books from the cart if needed.
6. Checkout: Simulate the purchase process (optional, depending on your implementation).
