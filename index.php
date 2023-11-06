<?php
 include "conn.php";
 include "function.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/formStyle.css">
    <title>Login</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
    <img src="./images/logo.png" alt="" srcset="" class="logo_main">
       <h3>Login Now</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>Email * </span>
                <input type="email" name="email" placeholder="enter email" class="box" required>
                <span>Password * </span>
                <input type="password" name="password" placeholder="enter password" class="box" required>
             </div>
          </div>
 
       <input type="submit" name="submit" value="Login now" class="login_btn">
       <p>Don't have an account? <a href="registerUser.php">register now</a></p>
       <?php loginUser(); ?>
    </form>
 
 </div>
</body>
</html>