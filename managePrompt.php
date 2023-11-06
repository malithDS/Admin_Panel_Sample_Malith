<?php
include "conn.php";
include "function.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/allDetails.css">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Manage Prompts</title>
</head>
<body>
    <div class="container_manage">
        <div class="manage_head">
        <a href="./admin.php" class="back">back</a>
        <a href="./insertPrompt.php" class="add">Add Prompt</a>
        </div>
        <table>
            <tr>
                <th>Prompt Id</th>
                <th>Prompt</th>
                <th>User Id</th>
                <th>Type Id</th>
                <th>Action</th>
            </tr>
            <tr>

            <?php removePrompt(); ?>
            </tr>
            
        </table>
    </div>
</body>
</html>