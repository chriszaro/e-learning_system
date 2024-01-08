<?php include 'check_login.php'; ?>

<?php

try {
    $conn = require 'db_connect.php';

    if ($_GET["mode"] == "edit") {

        $query = "SELECT * FROM documents WHERE id=" . $_GET["id"];
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
            echo "<title>Επεξεργασία εγγράφου</title>";
        } else
            echo "<title>Νέο έγγραφο</title>";
        ?>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <div class="body">
        <?php
        if ($_GET["mode"] == "edit") {
            echo "<h1>Επεξεργασία εγγράφου</h1>";
        } else
            echo "<h1>Νέο έγγραφο</h1>";
        ?>
        <form class="login-form" action="<?php if ($_GET["mode"] == "edit") {
            echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?mode=edit&id=" . $_GET["id"];
        } else
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>" method="post">
            <label for="title">Τίτλος</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="title" name="title" value="' . $result[0]["title"] . '" required>';
            } else
                echo '<input type="text" id="title" name="title" required>';
            ?>

            <label for="description">Περιγραφή</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="description" name="description" value="' . $result[0]["description"] . '" required>';
            } else
                echo '<input type="text" id="description" name="description" required>';
            ?>

            <label for="location">Τοποθεσία</label>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input type="text" id="location" name="location" value="' . $result[0]["location"] . '" required>';
            } else
                echo '<input type="text" id="location" name="location" required>';
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
$title = $description = $location = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $location = $_POST["location"];

    try {
        if ($_GET["mode"] == "edit") {
            //edit
            $sql = "UPDATE documents SET title='" . $title . "' WHERE id=" . $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE documents SET description='" . $description . "' WHERE id=" . $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE documents SET location='" . $location . "' WHERE id=" . $_GET["id"];
        } else {
            //create
            $sql = "INSERT INTO documents (title, description, location)
        VALUES ('$title', '$description', '$location')";
        }
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