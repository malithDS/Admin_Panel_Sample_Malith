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
    <title>Insert Prompt</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
       <h3>Insert Prompt Type</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>Type Name * </span>
                <input type="text" name="prompt" placeholder="enter name" class="box" required>
             </div>
             <div class="inputBox">
                <span>User Id * </span>
                <input type="text" name="user_id" placeholder="enter user id" class="box">
             </div>
             <div class="inputBox">
                <span>Type Id * </span>
                <input type="text" name="type_id" placeholder="enter type id" class="box">
             </div>
          </div>
 
       <input type="submit" name="submit" value="Insert now" class="login_btn">
       <?php insertPrompt();?>
    </form>
   
 </div>
</body>
</html>