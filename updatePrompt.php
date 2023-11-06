<?php
 include "conn.php";
 include "function.php";

    $prompt_id = $_GET['prompt_id'];
    $sql = "select * from `prompt` where prompt_id=$prompt_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $prompt = $row['prompt'];
    $user_id = $row['user_id'];
    $type_id = $row['type_id'];

    if(isset($_POST['submit'])){
        $prompt = $_POST['prompt'];
        $user_id = $_POST['user_id'];
        $type_id = $_POST['type_id'];

        $sql = "update `prompt` set prompt_id=$prompt_id, prompt='$prompt', user_id='$user_id', type_id='$type_id' where prompt_id=$prompt_id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('location:managePrompt.php');
        }else{
            $data = [
                'status' => 500,
                'message' =>  "Internal Server Error",           
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }
    }
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
                <span>Prompt Name * </span>
                <input type="text" name="prompt" placeholder="enter name" class="box" required value="<?php echo $prompt?>">
             </div>
             <div class="inputBox">
                <span>User Id * </span>
                <input type="text" name="user_id" placeholder="enter user id" class="box" required value="<?php echo $user_id?>">
             </div>
             <div class="inputBox">
                <span>Type Id * </span>
                <input type="text" name="type_id" placeholder="enter type id" class="box" required value="<?php echo $type_id?>">
             </div>
          </div>
 
       <input type="submit" name="submit" value="Update now" class="login_btn">
    </form>
   
 </div>
</body>
</html>