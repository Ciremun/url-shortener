<?php

include 'db.php';

$_POST['url_id'] = bin2hex(random_bytes(8));
$_POST['stored_url'] = pg_escape_string($conn, $_POST['stored_url']);

pg_insert($conn, 'urls', $_POST);
pg_close($conn);

$shorten_url = htmlspecialchars("{$_SERVER['HTTP_HOST']}/{$_POST['url_id']}", ENT_QUOTES, 'UTF-8');
$shorten_url =  '<a href="/' . $_POST['url_id'] . '">' . $shorten_url . '</a>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <title>url-shortener - <?= $_POST['url_id'] ?></title>
</head>
<body>
    <?= $shorten_url ?>
</body>
</html>
