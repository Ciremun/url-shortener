<?php

include 'db.php';

pg_query($conn, 'CREATE TABLE IF NOT EXISTS urls (id SERIAL PRIMARY KEY, url_id text, stored_url text);');
pg_query($conn, 'CREATE TABLE IF NOT EXISTS server_state (id SERIAL PRIMARY KEY, k text, v text);');

if (empty(get_server_state('url_id_length'))) {
    add_server_state('url_id_length', 2);
}

pg_close($conn);
