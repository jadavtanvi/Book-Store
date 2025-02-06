<?php
session_start();
include "header.php";
include "conn.php";

if(isset($_SESSION['user']))
{
    //header("location:.php");
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="css/style.css" rel="stylesheet" />
    <!--<link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>

    <?php
    include "conn.php";
    
    if(isset($_POST['submit']))
    {
        
        $uname=$_POST['uname'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $re_pass=$_POST['re_pass'];
        $passwordhash=password_hash($pass,PASSWORD_DEFAULT);
       // $pass=md5($pass);
       // $re_pass=md5($re_pass);
        $error=array();

        if(empty($uname) OR empty($pass) OR empty($re_pass) OR empty($email) )
        {
            array_push($error,"All fields are required");
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            array_push($error,"Email is Not Valid");
        }
        if(strlen($pass)<8)
        {
            array_push($error,"Password must be atleast 8 characters");
        }
        if($pass != $re_pass)
        {
            array_push($error,"Password does not match");
        }

        $sql="SELECT * FROM user WHERE email = '$email'";
        $res=mysqli_query($con,$sql);
        $ror_count=mysqli_num_rows($res);
        if($ror_count>0)
        {
            array_push($error,"Email Already exist..");
        }
        if(count($error)>0)
        {
            foreach($error as $error)
            {   ?>
                <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php
                echo $error;
                ?>
              </div>
              <?php
            }
             
        }
        else
        {
            $sql1="INSERT INTO user VALUES(NULL,'$uname','$email','$pass')";
            $res1=mysqli_query($con,$sql1);
            echo "registered";
        }
        
    }
    ?>
    
    <!--<form action="" method="post">
    <h2>SIGN UP</h2>
    <input type="text" name="uname" placeholder="User Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="pass" placeholder="Password">
    <input type="password" name="re_pass" placeholder="Retype Password">
    <input type="submit" name="signup" value="Sign Up">
    <a href="login.php" class="ca">Already have an account?</a>
    </form>-->
    
<!-- Register form section -->

<!--<section class="contact_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ">
          <div class="heading_container ">
            <h2 class="">
              REGISTER
            </h2>
          </div>
          <form action="#" method="post">
            <div>
              <input type="text" placeholder="Name" name="uname" />
            </div>
            <div>
              <input type="email" placeholder="Email"  name="email"/>
            </div>
            <div>
              <input type="password" placeholder="Password" name="pass" />
            </div>
            <div>
              <input type="password"  placeholder="Re-Password" name="re_pass"  />
            </div>
            <div class="btn-box">
              <button name="signup">
                Register
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
  <div class="form-container">

   <form action="" method="post">
      <h3>register now</h3>
      <input type="text" name="uname" placeholder="enter your name" required class="box">
      <input type="email" name="email" placeholder="enter your email" required class="box">
      <input type="password" name="pass" placeholder="enter your password" required class="box">
      <input type="password" name="re_pass" placeholder="confirm your password" required class="box">
      <!--<select name="user_type" class="box">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>-->
      <input type="submit" name="submit" value="register now" class="btn">
      <p>already have an account? <a href="login.php">login now</a></p>
   </form>

  <?php
  include "footer.php";
  ?>

  <!-- end Register form section -->
</body>

</html>