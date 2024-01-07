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