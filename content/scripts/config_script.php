<?php

$dbName = 'vgreviews';
$dbUsername = 'root';
$dbPassword = '';
$serverName = 'localhost';

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
  die('Connection failed: ' . mysqli_connect_error());
}
