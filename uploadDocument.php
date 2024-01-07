<?php

session_start();

if (!$_SESSION["user"]){
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Νέο έγγραφο</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body">
    <h1>Νέο έγγραφο</h1>
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="title">Τίτλος</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Περιγραφή</label>
        <input type="text" id="description" name="description" required>
        <label for="location">Τοποθεσία</label>
        <input type="text" id="location" name="location" required>
        <input type="submit" value="Δημιουργία">
    </form>
</div>

</body>
</html>

<?php

// define variables and set to empty values
$title = $description = $location = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $location = $_POST["location"];

    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create
        $sql = "INSERT INTO documents (title, description, location)
        VALUES ('$title', '$description', '$location')";

        // use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
    }

    $conn = null;

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'documents.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
?>