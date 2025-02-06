<?php

include 'conn.php';



session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<?php include 'header.php'; 
   include "conn.php";
   ?>

<div class="heading">
   <h3>search page</h3>
   <p> <a href="home.php">home</a> / search </p>
</div>

<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>

<section class="products" style="padding-top: 0;">

  <div class="box-container">
   <?php
     if(isset($_POST['submit']))
     {
         $search_item = $_POST['search'];
         $select_products = mysqli_query($con, "SELECT * FROM `product` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         $select_category = mysqli_query($con, "SELECT * FROM `category` WHERE name LIKE '%{$search_item}%'") or die('query failed');

         if(mysqli_num_rows($select_products) > 0)
         {
         while($fetch_products = mysqli_fetch_assoc($select_products))
         {
   ?>
      <form action="" method="post" class="box">
      <img class="image" src="uploaded_image/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="name">Rs.<?php echo $fetch_products['price']; ?>/-</div>
      <div class="name"><?php echo $fetch_products['description']; ?></div>
      <input type="number" min="1" name="product_quantity" value="1" class="qty">
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
      <a href="cart.php"><input type="submit" value="add to cart" name="add_to_cart" class="btn"></a>
      </form>
   <?php
         }
         }
         
         else
         {
            echo '<p class="empty">no result found!</p>';
         }
      }
      else{
         echo '<p class="empty">search something!</p>';
      }
   ?>
   </div>
   


</section>

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
