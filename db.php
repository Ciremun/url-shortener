<?php

isset($_SERVER['DATABASE_URL']) or die();

$conn = pg_connect($_SERVER['DATABASE_URL']) or die();

function get_server_state($k)
{
    global $conn;
    return pg_select($conn, 'server_state', array('k' => $k));
}

function add_server_state($k, $v)
{
    global $conn;
    pg_insert($conn, 'server_state', array('k' => $k, 'v' => $v));
}

function update_server_state($k, $v)
{
    global $conn;
    pg_update($conn, 'server_state', array('v' => $v), array('k' => $k));
}
