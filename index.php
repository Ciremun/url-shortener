<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <title>url-shortener</title>
</head>

<body>
    <form action="shorten.php" method="POST">
        <input type="text" name="stored_url" placeholder="url">
    </form>
</body>

</html>