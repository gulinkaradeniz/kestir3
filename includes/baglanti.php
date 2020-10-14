<?php

$mysqli = new mysqli("localhost", "root", "kestirpass", "kestirdb");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

?>