<?php include 'check_login.php'; ?>

<?php
try {
    $conn = require 'db_connect.php';
    if ($_GET["mode"] == "edit") {

        $query = "SELECT * FROM homework WHERE id=" . $_GET["id"];
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
    }
} catch (PDOException $e) {
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <?php
        if ($_GET["mode"] == "edit") {
            echo "<title>Επεξεργασία εργασίας</title>";
        } else
            echo "<title>Νέα εργασία</title>";
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="body">
        <?php
        if ($_GET["mode"] == "edit") {
            echo "<h1>Επεξεργασία εργασίας</h1>";
        } else
            echo "<h1>Νέα εργασία</h1>";
        ?>
        <form class="login-form" action="<?php if ($_GET["mode"] == "edit") {
            echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?mode=edit&id=" . $_GET["id"];
        } else
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>" method="post">
            <label for="goals">Στόχοι (χωρίστε τους στόχους με ελληνικό κόμμα)</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="goals" name="goals" value="' . $result[0]["goals"] . '" required>';
            } else
                echo '<input type="text" id="goals" name="goals" required>';
            ?>

            <label for="location">Τοποθεσία αρχείου</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="location" name="location" value="' . $result[0]["location"] . '" required>';
            } else
                echo '<input type="text" id="location" name="location" required>';
            ?>

            <label for="deliver">Παραδοτέα (χωρίστε τα παραδοτέα με ελληνικό κόμμα)</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="deliver" name="deliver" value="' . $result[0]["deliver"] . '" required>';
            } else
                echo '<input type="text" id="deliver" name="deliver" required>';
            ?>

            <label for="date">Ημερομηνία</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="date" name="date" value="' . $result[0]["date"] . '" required>';
            } else
                echo '<input type="text" id="date" name="date" required>';
            ?>

            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="submit" value="Ενημέρωση">';
            } else
                echo '<input type="submit" value="Δημιουργία">';
            ?>
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

    try {
        if ($_GET["mode"] == "edit") {
            //edit
            $sql = "UPDATE homework SET goals='" . $goals . "' WHERE id=" . $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE homework SET location='" . $location . "' WHERE id=" . $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE homework SET deliver='" . $deliver . "' WHERE id=" . $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE homework SET date='" . $date . "' WHERE id=" . $_GET["id"];
        } else {
            //create
            $sql = "INSERT INTO homework (goals, location, deliver, date)
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
        }
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