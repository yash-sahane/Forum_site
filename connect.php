<?php

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'discuss';

$con = mysqli_connect($servername, $username, $password, $database);
if (!$con) {
    echo 'failed to conenct due to ' . mysqli_connect_error();
}