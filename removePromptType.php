<?php

include "./conn.php";
include "./function.php";

$requestMethod = $_SERVER["REQUEST_METHOD"];

            if($requestMethod == "GET"){
                $type_id = $_GET['type_id'];

                $delete="delete from `prompt_type` where type_id='$type_id'";
                $result = mysqli_query($conn, $delete);
                
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

?>