<?php
$config = parse_ini_file(__DIR__ . "/../config.ini", true);

$host = $config["database"]["DB_HOST"];
$dbName = $config["database"]["DB_NAME"];
$username = $config["database"]["DB_USER"];
$password = $config["database"]["DB_PASSWORD"];

$conn = new mysqli($host, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
