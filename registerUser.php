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
    <title>Register</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
    <img src="./images/logo.png" alt="" srcset="" class="logo_main">
       <h3>register now</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>Username * </span>
                <input type="text" name="username" placeholder="enter username" class="box" required>
                <span>Email * </span>
                <input type="email" name="email" placeholder="enter email" class="box" required>
                <span>Password * </span>
                <input type="password" name="password" placeholder="enter password" class="box" required>
                
             </div>
          </div>
 
       <input type="submit" name="submit" value="Register now" class="login_btn">
       <p>already have an account? <a href="index.php">login now</a></p>
       <?php insertUser();?>
    </form>
   
 </div>
</body>
</html>