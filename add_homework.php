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
    <title>Νέα εργασία</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body">
    <h1>Νέα εργασία</h1>
    <form class="login-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="goals">Στόχοι (χωρίστε τους στόχους με ελληνικό κόμμα)</label>
        <input type="text" id="goals" name="goals" required>
        <label for="location">Τοποθεσία αρχείου</label>
        <input type="text" id="location" name="location" required>
        <label for="deliver">Παραδοτέα (χωρίστε τα παραδοτέα με ελληνικό κόμμα)</label>
        <input type="text" id="deliver" name="deliver" required>
        <label for="date">Ημερομηνία</label>
        <input type="text" id="date" name="date" required>
        <input type="submit" value="Δημιουργία">
    </form>
</div>

</body>
</html>

<?php

// define variables and set to empty values
$goals = $location = $deliver = $date = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goals = $_POST["goals"];
    $location = $_POST["location"];
    $deliver = $_POST["deliver"];
    $date = $_POST["date"];

    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //create
        $sql = "INSERT INTO Homework (goals, location, deliver, date)
        VALUES ('$goals', '$location', '$deliver', '$date')";
        $conn->exec($sql);

        $query = "SELECT * FROM homework";
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        $number = sizeof($result);

        $today = date("d/m/Y");
        //create
        $sql = "INSERT INTO announcements (date, subject, content)
        VALUES ('$today', 'Υποβλήθηκε η εργασία $number', 'Η ημερομηνία παράδοσης της εργασίας είναι $date')";

        $conn->exec($sql);
    } catch (PDOException $e) {
    }

    $conn = null;

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'homework.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
?>