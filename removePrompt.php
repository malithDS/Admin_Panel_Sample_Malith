<?php

include "./conn.php";
include "./function.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];

            if($requestMethod == "GET"){
                $prompt_id = $_GET['prompt_id'];

                $delete="delete from `prompt` where prompt_id='$prompt_id'";
                $result = mysqli_query($conn, $delete);
                
            if($result){
                    header("Location: managePrompt.php");
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