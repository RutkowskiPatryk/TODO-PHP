<?php

require_once('connect-user.php');

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PODException $e) {
    echo 'Connection failed ' . $e->getMessage();
}