<?php
include "conn.php";
include "function.php";

/*header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Access-Control-Allow-Origin");
*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./stylesheets/allDetails.css">
    <link rel="stylesheet" href="./stylesheets/style.css">
    <title>Single Prompt Type</title>
</head>
<body>
    <div class="container_report">
        <table>
            <tr>
                <th>Prompt Id</th>
                <th>Prompt</th>
                <th>User Id</th>
                <th>Type Id</th>
            </tr>
            <?php getPromptsByTypeId(); ?>
            
        </table>
        <button onclick="window.print()">Print</button>
        <button><a href="./allPromptTypes.php">Back</a></button>
    </div>
</body>
</html>