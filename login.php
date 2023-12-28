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

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="body">
        <h1>Καλώς ήρθατε!</h1>
        <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <h2>Σελίδα πιστοποίησης</h2>
            <label for="loginname">Login</label>
            <input type="text" id="loginname" name="loginname" placeholder="Email" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Κωδικός" required>
            <input type="submit" value="Σύνδεση">
        </form>
    </div>

    </body>
    </html>

<?php

// define variables and set to empty values
$loginname = $pass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginname = test_input($_POST["loginname"]);
    $pass = test_input($_POST["password"]);

    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

//    // Create connection
//    $conn = new mysqli($servername, $username, $password);
//
//    // Check connection
//    if ($conn->connect_error) {
//        die("Connection failed: " . $conn->connect_error);
//    }
//    echo "Connected successfully";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $status = $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
//        echo $status;

        $query = "SELECT email, role FROM users WHERE email = '" . $loginname . "' AND password ='" . $pass . "'";
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        if (sizeof($result) > 0) {
            session_start();
            $_SESSION["user"] = $loginname;
            $_SESSION["role"] = $result[0]["role"];

            $host = $_SERVER['HTTP_HOST'];
            $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
            $extra = 'index.php';
            header("Location: http://$host$uri/$extra");
            exit();
        } else {
            echo "Λάθος στοιχεία σύνδεσης";
        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $conn = null;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>