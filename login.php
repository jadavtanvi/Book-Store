<?php
//include "header.php";
include "conn.php";
session_start();
if(isset($_SESSION['user']))
{
    header("location:home.php");

}?>

    <?php
   
        if(isset($_POST['login']))
        {
            $email=$_POST['email'];
            $pass=$_POST['pass'];
            if(empty($email))
            {
                ?>
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Email field required......
              </div>
              <?php
                //echo "<p class='error'>Email field Required</p> <br>";
            }
            else if(empty($pass))
            {
                //echo "<p class='error'>password field Required</p> <br>";
                ?>
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                password field required......
              </div>
              <?php
            }
            else
            {
           // $pass=md5($pass);
            $sql="SELECT * FROM user WHERE email = '$email'";
            $res=mysqli_query($con,$sql);
        if(mysqli_num_rows($res) == 1)
        {
            $row=mysqli_fetch_assoc($res);
            if ( $row['pass'] == $pass)
            {
              
               $_SESSION['email'] = $row['email'];
               $_SESSION['uname'] = $row['uname'];
               $_SESSION['id'] = $row['id'];
               header("Location: home.php");
               //exit();
           
              
           }
            else
             {
                   // echo "<p class='error'>Password Does not exist</p> <br>";
                   ?>
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                password does not match......
              </div>
              <?php
             }
            
           
        }
        else
        {
           // echo "<p class='error'>Email Does not match</p> <br>";
           ?>
           <div class="alert alert-success alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            $message='Email does not exist.........';'
         </div>
         <?php
        }
    }
          
        
        }
    ?>
<!--<form action="" method="post">
    <h2>Login</h2>
    
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    
    <input type="submit" name="login" value="Login">
    <a href="register.php" class="ca">Don't Have an account?</a>
    </form>-->
    <!--login form section-->
    <!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
<body>
    <div class="form-container">

   <form action="" method="post">
      <h3>login now</h3>
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="pass" placeholder="enter your password" required class="box">
      <input type="submit" name="login" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">register now</a></p>
   </form>

</div>


    <!--<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
            <h2 class="">
              LOGIN
            </h2>
          </div>
          <form action="#" method="post">
           
            <div>
              <input type="email" name="email" placeholder="Email"  />
            </div>
            <div>
              <input type="password" name="pass" placeholder="Password" />
            </div>
           
            <div class="btn-box">
              <button name="login">
                login
              </button>
            </div>
          </form>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/contact-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>-->

  <?php include 'footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
</body>
</html>
