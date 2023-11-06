<?php
 include "conn.php";
 include "function.php";

    $type_id = $_GET['type_id'];
    $sql = "select * from `prompt_type` where type_id=$type_id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];

    if(isset($_POST['submit'])){
        $name = $_POST['name'];

        $sql = "update `prompt_type` set type_id=$type_id, name='$name' where type_id=$type_id";
        $result = mysqli_query($conn, $sql);

        if($result){
            header('location:managePromptType.php');
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
    <title>Insert Prompt Type</title>
</head>
<body>
    
<div class="form-container">

    <form action="" method="post" enctype="multipart/form-data">
       <h3>Insert Prompt Type</h3>
 
          <div class="flex">
             <div class="inputBox">
                <span>Type Name * </span>
                <input type="text" name="name" placeholder="enter name" class="box" required value="<?php echo $name?>">
             </div>
          </div>
 
       <input type="submit" name="submit" value="Update now" class="login_btn">
    </form>
   
 </div>
</body>
</html>