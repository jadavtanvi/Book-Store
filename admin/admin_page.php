<?php

include 'conn.php';
include 'admin_header.php';

//session_start();

/*$admin_id = $_SESSION['id'];

if(!isset($admin_id)){
   header('location:login.php');
}*/


?>

<!DOCTYPE html>
<html lang="en">

<body>
   
<?php ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="title">dashboard</h1>

   <div class="box-container">

      <!--<div class="box">
         <?php
           /* $total_pendings = 0;
            $select_pending = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'pending'") or die('query failed');
            if(mysqli_num_rows($select_pending) > 0){
               while($fetch_pendings = mysqli_fetch_assoc($select_pending)){
                  $total_price = $fetch_pendings['total_price'];
                  $total_pendings += $total_price;
               };
            };*/
         ?>
         <h3>$<?php // echo $total_pendings; ?>/-</h3>
         <p>total pendings</p>
      </div>

      <div class="box">
         <?php
            /*$total_completed = 0;
            $select_completed = mysqli_query($conn, "SELECT total_price FROM `orders` WHERE payment_status = 'completed'") or die('query failed');
            if(mysqli_num_rows($select_completed) > 0){
               while($fetch_completed = mysqli_fetch_assoc($select_completed)){
                  $total_price = $fetch_completed['total_price'];
                  $total_completed += $total_price;
               };
            };*/
         ?>
         <h3>$<?php //echo  $total_completed; ?> /-</h3>
         <p>completed payments</p>
      </div>

      <div class="box">
         <?php 
           /* $select_orders = mysqli_query($conn, "SELECT * FROM `orders`") or die('query failed');
            $number_of_orders = mysqli_num_rows($select_orders);*/
         ?>
         <h3><?php // echo $number_of_orders; ?></h3>
         <p>order placed</p>
      </div>-->

      <div class="box">
         <?php 
            $select_products = mysqli_query($con, "SELECT * FROM `product`") or die('query failed');
            $number_of_products = mysqli_num_rows($select_products);
         ?>
         <h3><?php echo $number_of_products; ?></h3>
         <p>products added</p>
      </div>

      <div class="box">
         <?php 
            $select_users = mysqli_query($con, "SELECT * FROM `user` ") or die('query failed');
            $number_of_users = mysqli_num_rows($select_users);
         ?>
         <h3><?php echo $number_of_users; ?></h3>
         <p> USERS</p>
      </div>

      <div class="box">
         <?php 
            $select_admins = mysqli_query($con, "SELECT * FROM `admin` ") or die('query failed');
            $number_of_admins = mysqli_num_rows($select_admins);
         ?>
         <h3><?php echo $number_of_admins; ?></h3>
         <p>admin </p>
      </div>

      <!--<div class="box">
         <?php 
           /* $select_account = mysqli_query($con, "SELECT * FROM `users`") or die('query failed');
            $number_of_account = mysqli_num_rows($select_account);
         ?>
         <h3><?php echo $number_of_account;*/ ?></h3>
         <p>total accounts</p>
      </div>-->

      <div class="box">
         <?php 
            $select_messages = mysqli_query($con, "SELECT * FROM `contact`") or die('query failed');
            $number_of_messages = mysqli_num_rows($select_messages);
         ?>
         <h3><?php echo $number_of_messages; ?></h3>
         <p>Contacts</p>
      </div>

   </div>

</section>

<!-- admin dashboard section ends -->









<!-- custom admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>