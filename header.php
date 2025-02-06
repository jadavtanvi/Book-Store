<?php 
include "conn.php";

   
/* if(isset($_SESSION["uname"])){
                    $name_login = $_SESSION["uname"];
                    $lg="Log Out";
                }
                else{
                    $name_login = "Guest";
                    $lg="Log In";
                }*/
              
if(isset($message)){
   foreach($message as $message){
      echo '
      
      <div class="alert alert-success">
      <span>'.$message.'</span>
  </div>
      ';
   }
}

            
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>


<header class="header">

   <div class="header-1">
      <div class="flex">
         <div class="share">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
         </div>
         <p> new <a href="login.php">login</a> | <a href="register.php">register</a> </p>
      </div>
   </div>

   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Bookly.</a>

         <nav class="navbar">
            <a href="home.php">home</a>
            <a href="about.php">about</a>
            <a href="category.php">Category</a>
            <a href="book.php">Books</a>
            <a href="contact.php">contact</a>
             
      </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <a href="search_page.php" class="fas fa-search"></a>
            <div id="user-btn" class="fas fa-user"></div>
            <?php
             /* $select_cart_number = mysqli_query($con, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
              $cart_rows_number = mysqli_num_rows($select_cart_number); */
            ?>
            <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php // echo $cart_rows_number; ?>)</span> </a>
         </div>

         <div class="user-box">
            
            <p>username : <span><?php echo $_SESSION['uname']; ?></span></p>
            <p>email : <span><?php echo $_SESSION['email']; ?></span></p>
            <a href="logout.php" class="delete-btn">logout</a>
         </div>
      </div>
   </div>

</header>

