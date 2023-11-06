<?php

include "conn.php";

function error422($message){
    $data = [
        'status' => 422,
        'message' => $message,
        
    ];
    header("HTTP/1.0 422 Unprocessable Entity");
    echo json_encode($data);
    exit();
}

//create a user -------
function insertUser(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(empty(trim($username))){
            return error422('Enter your username');
        }elseif(empty(trim($email))){
            return error422('Enter your email');
        }elseif(empty(trim($password))){
            return error422('Enter your password');
        }else{
            $select_query = "select * from `user` where username = '$username' or email='$email'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                $data = [
                    'status' => 409,
                    'message' =>  "User already exist"
                ];
                header("HTTP/1.0 409 User already exist");
                echo json_encode($data);
            }else{
                $insert_query = "insert into `user` (username,email,password) values('$username','$email','$password')";
                $result = mysqli_query($conn, $insert_query);

                if($result){
                    header("Location: index.php");
                    
                }else{
                    $data = [
                        'status' => 500,
                        'message' =>  "Internal Server Error",
                
                    ];
                    header("HTTP/1.0 500 Internal Server Error");
                    echo json_encode($data);
                }
            }
        }     
    }
};

//create a prompt ------
function insertPrompt(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $prompt = $_POST['prompt'];
        $user_id = $_POST['user_id'];
        $type_id = $_POST['type_id'];
        
            $select_query = "select * from `prompt` where prompt = '$prompt'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                $data = [
                    'status' => 409,
                    'message' =>  "Prompt already exist"
                ];
                header("HTTP/1.0 409 Prompt already exist");
                echo json_encode($data);
            }else{
                $insert_query = "insert into `prompt` (prompt,user_id,type_id) values('$prompt','$user_id','$type_id')";
                $result = mysqli_query($conn, $insert_query);

                if($result){
                    
                    header("Location: managePrompt.php");
                    echo json_encode($data);
                }else{
                    $data = [
                        'status' => 500,
                        'message' =>  "Internal Server Error",
                
                    ];
                    header("HTTP/1.0 500 Internal Server Error");
                    echo json_encode($data);
                }
            }
           
    }
};

//create a prompt type ---------
function insertPromptType(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $name = $_POST['name'];
        

        if(empty(trim($name))){
            return error422('Enter your prompt type');
        }else{
            $select_query = "select * from `prompt_type` where name = '$name'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                $data = [
                    'status' => 409,
                    'message' =>  "Prompt type already exist"
                ];
                header("HTTP/1.0 409 Prompt type already exist");
                echo json_encode($data);
            }else{
                $insert_query = "insert into `prompt_type` (name) values('$name')";
                $result = mysqli_query($conn, $insert_query);

                if($result){
                    header("Location: managePromptType.php");
                }else{
                    $data = [
                        'status' => 500,
                        'message' =>  "Internal Server Error",
                
                    ];
                    header("HTTP/1.0 500 Internal Server Error");
                    echo json_encode($data);
                }
            }
        }     
    }
};


//login User --------
function loginUser(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        if(empty(trim($email))){
            return error422('Enter your email');
        }elseif(empty(trim($password))){
            return error422('Enter your password');
        }else{
            $select_query = "select * from `user` where email = '$email' and password='$password'";
            $result = mysqli_query($conn, $select_query);
            $num = mysqli_num_rows($result);
            if($num>0){
                session_start();
                $user_id = $_SESSION['user_id'];
                header("Location: admin.php");
                
            }elseif(!isset($user_id)){
                header('location:index.php');
             };
        }     
    }
};




//See all users in the database --------
function getAllUsers(){

    global $conn;

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                    $user_id = $row_data['user_id'];
                    $username = $row_data['username'];
                    $email = $row_data['email'];
    
                  echo "<tr> 
                  <td>$user_id</td> 
                  <td>$username</td> 
                  <td>$email</td> 
                  <td><a href='singleUser.php?user_id=$user_id' class='view'>view</a></td>
                  </tr> ";
                header("HTTP/1.0 200 Product types Fetched Successfully");
                }

        }else{
            $data = [
                'status' => 404,
                'message' => "No Users Found",
        
            ];
            header("HTTP/1.0 404 No Users Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};

//See all prompt in the database -------
function getAllPrompts(){

    global $conn;

    $query = "SELECT * FROM prompt";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                    $prompt_id = $row_data['prompt_id'];
                    $prompt = $row_data['prompt'];
                    $user_id = $row_data['user_id'];
                    $type_id = $row_data['type_id'];
    
                  echo "<tr> 
                  <td>$prompt_id</td> 
                  <td>$prompt</td>
                  <td>$user_id</td> 
                  <td>$type_id</td> 
                  </tr> ";
            header("HTTP/1.0 200 Products Fetched Successfully");
                }
        }else{
            $data = [
                'status' => 404,
                'message' => "No Products Found",
        
            ];
            header("HTTP/1.0 404 No Products Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};

//See all prompt types in the database -------
function getAllPromptType(){

    global $conn;

    $query = "SELECT * FROM prompt_type";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                $type_id = $row_data['type_id'];
                $name = $row_data['name'];

              echo "<tr> <td>$type_id</td> 
              <td>$name</td> 
              <td><a href='singleType.php?type_id=$type_id' class='view'>view</a>
              </td>
              </tr> ";
            header("HTTP/1.0 200 Product types Fetched Successfully");
            }
        }else{
            $data = [
                'status' => 404,
                'message' => "No Product types Found",
        
            ];
            header("HTTP/1.0 404 No Product types Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};




//See spesific data in the database using type id -----
function getPromptsByTypeId(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "GET"){
        $type_id = $_GET['type_id'];
        

        $query = "SELECT * FROM prompt where type_id = '$type_id'";
        $result = mysqli_query($conn, $query);

        if($result){
            if(mysqli_num_rows($result)>0){

                while($row_data = mysqli_fetch_assoc($result)){

                    $prompt_id = $row_data['prompt_id'];
                    $prompt = $row_data['prompt'];
                    $user_id = $row_data['user_id'];
                    $type_id = $row_data['type_id'];

                echo "<tr> 
                  <td>$prompt_id</td> 
                  <td>$prompt</td>
                  <td>$user_id</td> 
                  <td>$type_id</td> 
                  </tr> ";
                header("HTTP/1.0 200 List Fetched Successfully");
                }
            }else{
                $data = [
                    'status' => 404,
                    'message' => "No Data Found",
            
                ];
                header("HTTP/1.0 404 No Data Found");
                echo json_encode($data);
            }

        }else{
            $data = [
                'status' => 500,
                'message' =>  "Internal Server Error",
        
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }       
    }
};

//See spesific data in the database using User Id -------
function getPromptsByUserId(){
    global $conn;

    $requestMethod = $_SERVER["REQUEST_METHOD"];

    if($requestMethod == "GET"){
        $user_id = $_GET['user_id'];
        

        $query = "SELECT * FROM prompt where user_id = '$user_id'";
        $result = mysqli_query($conn, $query);

        if($result){
            if(mysqli_num_rows($result)>0){
                while($row_data = mysqli_fetch_assoc($result)){

                    $prompt_id = $row_data['prompt_id'];
                    $prompt = $row_data['prompt'];
                    $user_id = $row_data['user_id'];
                    $type_id = $row_data['type_id'];

                echo "<tr> 
                  <td>$prompt_id</td> 
                  <td>$prompt</td>
                  <td>$user_id</td> 
                  <td>$type_id</td> 
                  </tr> ";
                header("HTTP/1.0 200 List Fetched Successfully");
                }
            }else{
                $data = [
                    'status' => 404,
                    'message' => "No Data Found",
            
                ];
                header("HTTP/1.0 404 No Data Found");
                echo json_encode($data);
            }

        }else{
            $data = [
                'status' => 500,
                'message' =>  "Internal Server Error",
        
            ];
            header("HTTP/1.0 500 Internal Server Error");
            echo json_encode($data);
        }       
    }
};



//remove user -----
function removeUser(){

    global $conn;

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                $user_id = $row_data['user_id'];
                $username = $row_data['username'];
                $email = $row_data['email'];

              echo "<tr> <td>$user_id</td> 
              <td>$username</td> 
              <td>$email</td> 
              <td>
              <a href='removeUser.php?user_id=$user_id' class='delete'>delete</a>
              </td>
              </tr> ";
            header("HTTP/1.0 200 Product types Fetched Successfully");
            }
        }else{
            $data = [
                'status' => 404,
                'message' => "No Product types Found",
        
            ];
            header("HTTP/1.0 404 No Product types Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};

//remove and update Prompt ------
function removePrompt(){
    global $conn;

    $query = "SELECT * FROM prompt";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                $prompt_id = $row_data['prompt_id'];
                $prompt = $row_data['prompt'];
                $user_id = $row_data['user_id'];
                $type_id = $row_data['type_id'];

              echo "<tr> <td>$prompt_id</td> 
              <td>$prompt</td> 
              <td>$user_id</td> 
              <td>$type_id</td> 
              <td>
              <a href='updatePrompt.php?prompt_id=$prompt_id' class='view'>update</a>
              <a href='removePrompt.php?type_id=$prompt_id' class='delete'>delete</a>
              </td>
              </tr> ";
            header("HTTP/1.0 200 Product types Fetched Successfully");
            }
        }else{
            $data = [
                'status' => 404,
                'message' => "No Product types Found",
        
            ];
            header("HTTP/1.0 404 No Product types Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};

//remove and update prompt type ------
function removePromptType(){
    global $conn;

    $query = "SELECT * FROM prompt_type";
    $result = mysqli_query($conn, $query);

    if($result){
        if(mysqli_num_rows($result)>0){

            while($row_data = mysqli_fetch_assoc($result)){

                $type_id = $row_data['type_id'];
                $name = $row_data['name'];

              echo "<tr> <td>$type_id</td> 
              <td>$name</td> 
              <td>
              <a href='updatePromptType.php?type_id=$type_id' class='view'>update</a>
              <a href='removePromptType.php?type_id=$type_id' class='delete'>delete</a>
              </td>
              </tr> ";
            header("HTTP/1.0 200 Product types Fetched Successfully");
            }
        }else{
            $data = [
                'status' => 404,
                'message' => "No Product types Found",
        
            ];
            header("HTTP/1.0 404 No Product types Found");
            echo json_encode($data);
        }

    }else{
        $data = [
            'status' => 500,
            'message' =>  "Internal Server Error",
    
        ];
        header("HTTP/1.0 500 Internal Server Error");
        echo json_encode($data);
    }
};





//count users in the database -----
function countUsers(){

    global $conn;

    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);

    if($user_total = mysqli_num_rows($result)){
        echo "$user_total";
    }else{
        echo "No Data Found";
    }
}
//count prompts in the database ------
function countPrompt(){

    global $conn;

    $query = "SELECT * FROM prompt";
    $result = mysqli_query($conn, $query);

    if($prompt_total = mysqli_num_rows($result)){
        echo "$prompt_total";
    }else{
        echo "No Data Found";
    }
}
//count prompt types in the database ------
function countPromptTypes(){

    global $conn;

    $query = "SELECT * FROM prompt_type";
    $result = mysqli_query($conn, $query);

    if($prompt_type_total = mysqli_num_rows($result)){
        echo "$prompt_type_total";
    }else{
        echo "No Data Found";
    }
}


?>

