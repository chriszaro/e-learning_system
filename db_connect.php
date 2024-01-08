<?php
// define variables and set to empty values
$servername = "localhost";
$username = "abcd001";
$password = "abcd001";
$dbname = "student3868partb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
}
return $conn;

