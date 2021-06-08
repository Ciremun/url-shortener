<?php

include 'db.php';

pg_exec($conn, 'CREATE TABLE IF NOT EXISTS urls (id SERIAL PRIMARY KEY, url_id text, stored_url text);');
pg_close($conn);
