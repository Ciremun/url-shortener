<?php

!empty($_GET['url_id']) or die();

include 'db.php';

$_GET['url_id'] = pg_escape_string($_GET['url_id']);
$redirect_url = pg_select($conn, 'urls', $_GET);

if (empty($redirect_url)) {
    echo ("redirect url was not found for id {$_GET['url_id']}");
    die();
}

header("Location: {$redirect_url[0]['stored_url']}");
die();
