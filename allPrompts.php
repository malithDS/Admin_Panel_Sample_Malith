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
    <title>All Prompts</title>
</head>
<body>
    <div class="container_report">
    <h2>All Prompts</h2>
        <table>
            <tr>
                <th>Prompt Id</th>
                <th>Prompt</th>
                <th>User Id</th>
                <th>Type Id</th>
            </tr>
            <?php getAllPrompts(); ?>
        </table>
        <button onclick="window.print()">Print</button>
        <button><a href="./admin.php">Back</a></button>
    </div>
</body>
</html>