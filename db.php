<?php

isset($_SERVER['DATABASE_URL']) or die();

$conn = pg_connect($_SERVER['DATABASE_URL']) or die();
