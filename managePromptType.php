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
    <title>Manage Prompt Types</title>
</head>
<body>
    <div class="container_manage">
        <div class="manage_head">
        <a href="./admin.php" class="back">back</a>
        <a href="./insertPromptType.php" class="add">Add Prompt Type</a>
        </div>
        <table>
            <tr>
                <th>Type Id</th>
                <th>Type Name</th>
                <th>Action</th>
            </tr>
            <tr>

            <?php removePromptType(); ?>
            </tr>
            
        </table>
    </div>
</body>
</html>