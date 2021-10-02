<?php

!empty($_GET['url_id']) or die();

include 'db.php';

$redirect_url = pg_select($conn, 'urls', $_GET, PGSQL_DML_ESCAPE);

if (empty($redirect_url)) {
    echo("redirect url was not found for id " . htmlspecialchars($_GET['url_id'], ENT_QUOTES, 'UTF-8'));
    die();
}

header("Location: {$redirect_url[0]['stored_url']}");
die();
