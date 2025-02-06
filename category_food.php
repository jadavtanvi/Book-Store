<?php
include "conn.php";
session_start();
$user_id = $_SESSION['id'];

if(!isset($user_id)){
   header('location:login.php');
}
?>
<?php include 'header.php'; ?>
<div class="heading">
   <h3>our shop</h3>
   <p> <a href="home.php">home</a> / shop </p>
</div>

<section class="products">

   <h1 class="title">latest products</h1>

   <div class="box-container">
      <?php
      /*$sql="SELECT * from product";
      $res=mysqli_query($con,$sql);
      if($res > 0)
      {
         while($fetch_array=mysqli_fetch_assoc($res))
         {
            ?>
            <form action="" method="post" class="box">
         <img class="image" src="uploaded_img/<?php echo $fetch_products['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_products['name']; ?></div>
         <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
         <input type="number" min="1" name="product_quantity" value="1" class="qty">
         <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
         <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
         <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
         <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
         }
      }
      */
      if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = $_POST['product_quantity'];

   $check_cart_numbers = mysqli_query($con, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      ?>
      <div class="alert alert-success">
    <strong>already aded to cart!</strong> 
  </div>
      <?php
   }else{
      mysqli_query($con, "INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_quantity', '$product_image')") or die('query failed');
      ?>
      <div class="alert alert-success">
    <strong>successfully added tocart</strong> 
  </div>
      <?php
   }

}
      ?>
      <?php  
        $category_id=$_GET['id'];
         $select_products = mysqli_query($con, "SELECT * FROM `product` WHERE c_id = $category_id") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
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
      <input type="submit" value="add to cart" name="add_to_cart" class="btn">
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
</div>
</section>
<!-- custom js file link  -->

<?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>