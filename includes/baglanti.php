<?php

$mysqli = new mysqli("localhost", "kestiruser", "kestirpass", "kestir2db");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

?>