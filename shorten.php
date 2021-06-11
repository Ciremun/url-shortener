<?php

!empty($_POST['stored_url']) or die();

include 'db.php';

$counter = 0;

do {
    $url_id_length = intval(get_server_state('url_id_length')[0]['v']);
    if ($counter > 10) {
        $url_id_length *= 2;
        update_server_state('url_id_length', strval($url_id_length));
    }
    $_POST['url_id'] = bin2hex(random_bytes($url_id_length));
    $counter++;
} while (!empty(pg_select($conn, 'urls', array('url_id' => $_POST['url_id']))));

$_POST['stored_url'] = pg_escape_string($conn, $_POST['stored_url']);

if (!filter_var($_POST['stored_url'], FILTER_VALIDATE_URL)) {
    $_POST['stored_url'] = "http://{$_POST['stored_url']}";
}

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