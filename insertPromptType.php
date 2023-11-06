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
    <title>Insert Prompt Type</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
       <h3>Insert Prompt Type</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>Type Name * </span>
                <input type="text" name="name" placeholder="enter name" class="box" required>
             </div>
          </div>
 
       <input type="submit" name="submit" value="Insert now" class="login_btn">
       <?php insertPromptType();?>
    </form>
   
 </div>
</body>
</html>