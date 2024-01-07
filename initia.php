<?php
//$servername = "localhost";
//$username = "abcd001";
//$password = "abcd001";
//
//try {
//    $conn = new PDO("mysql:host=$servername", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "CREATE DATABASE student3868partb";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Database created successfully<br>";
//} catch(PDOException $e) {
//    echo $sql . "<br>" . $e->getMessage();
//}
//
//$conn = null;
//?>

<?php
//$servername = "localhost";
//$username = "abcd001";
//$password = "abcd001";
//$dbname = "student3868partb";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    // sql to create table
//    $sql = "CREATE TABLE users (
//  firstname VARCHAR(30) NOT NULL,
//  lastname VARCHAR(30) NOT NULL,
//  email VARCHAR(30) NOT NULL PRIMARY KEY,
//  password VARCHAR(30) NOT NULL,
//  role ENUM('Tutor', 'Student') NOT NULL
//  )";
//
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Table Users created successfully";
//
//    // sql to create table
//    $sql = "CREATE TABLE announcements (
//  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
//  date TEXT(10) NOT NULL,
//  subject TEXT(60) NOT NULL,
//  content TEXT NOT NULL
//  )";
//
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Table Announcements created successfully";
//
//    // sql to create table
//    $sql = "CREATE TABLE documents (
//  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
//  title VARCHAR(30) NOT NULL,
//  description TEXT(60) NOT NULL,
//  location TEXT NOT NULL
//  )";
//
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "Table Documents created successfully";
//
//
//
//} catch(PDOException $e) {
//    echo $sql . "<br>" . $e->getMessage();
//}
//// sql to create table
//$sql = "CREATE TABLE homework (
//  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
//  goals TEXT NOT NULL,
//  location TEXT NOT NULL,
//  deliver TEXT NOT NULL,
//  date TEXT NOT NULL
//  )";
//
//// use exec() because no results are returned
//$conn->exec($sql);
//echo "Table Homework created successfully";
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (firstname, lastname, email, password, role)
//  VALUES ('John', 'Doe', 'john@example.com', 'pass', 'Tutor')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (firstname, lastname, email, password, role)
//  VALUES ('Chris', 'Test', 'chris@example.com', 'test', 'Student')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO users (firstname, lastname, email, password, role)
//  VALUES ('Mary', 'Doe', 'mary@example.com', 'test', 'Student')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO announcements (date, subject, content)
//  VALUES ('12/12/2008', 'Έναρξη μαθημάτων', 'Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    $sql = "INSERT INTO announcements (date, subject, content)
//  VALUES ('15/12/2008', 'Ανάρτηση εργασίας', 'Η 1η εργασία έχει ανακοινωθεί στην ιστοσελίδα Εργασίες. Τα μαθήματα αρχίζουν την Δευτέρα 17/12/2008')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sql = "INSERT INTO documents (title, description, location)
//  VALUES ('Παραδείγματα ασκήσεων', 'Στο αρχείο θα βρείτε λυμένες ασκήσεις', 'file1.doc')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    $sql = "INSERT INTO documents (title, description, location)
//  VALUES ('Θέματα εξετάσεων', 'Στο αρχείο θα βρείτε παλαιότερα θέματα εξετάσεων', 'file2.doc')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//try {
//    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//    // set the PDO error mode to exception
//    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//    $sql = "INSERT INTO homework (goals, location, deliver, date)
//  VALUES ('στόχος 1, στόχος 2, ...', 'ergasia1.doc', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint','12/5/2009')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    $sql = "INSERT INTO homework (goals, location, deliver, date)
//  VALUES ('στόχος 1, στόχος 2', 'ergasia2.doc', 'Γραπτή αναφορά σε word, Παρουσίαση σε powerpoint', '15/5/2009')";
//    // use exec() because no results are returned
//    $conn->exec($sql);
//    echo "New record created successfully";
//} catch(PDOException $e) {
//}
//
//$conn = null;
//?>