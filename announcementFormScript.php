<?php
if ($_GET["mode"] == "edit") {
    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM Announcements WHERE id=" . $_GET["id"];
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }

    $conn = null;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    if ($_GET["mode"] == "edit") {
        echo "<title>Επεξεργασία ανακοίνωσης</title>";
    } else
        echo "<title>Δημιουργία ανακοίνωσης</title>";
    ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body">
    <?php
    if ($_GET["mode"] == "edit") {
        echo "<h1>Επεξεργασία ανακοίνωσης</h1>";
    } else
        echo "<h1>Δημιουργία ανακοίνωσης</h1>";
    ?>
    <form class="login-form" action="<?php if ($_GET["mode"] == "edit") {
        echo htmlspecialchars($_SERVER["PHP_SELF"]). "?mode=edit&id=". $_GET["id"];
    } else
        echo htmlspecialchars($_SERVER["PHP_SELF"]);
      ?>" method="post">
        <label for="date">Ημερομηνία</label>
        <?php
        if ($_GET["mode"] == "edit") {
            echo '<input type="text" id="date" name="date" value="' . $result[0]["date"] . '" required>';
        } else
            echo '<input type="text" id="date" name="date" required>';
        ?>
        <label for="subject">Θέμα</label>
        <?php
        if ($_GET["mode"] == "edit") {
            echo '<input type="text" id="subject" name="subject" value="' . $result[0]["subject"] . '" required>';
        } else
            echo '<input type="text" id="subject" name="subject" required>';
        ?>
        <label for="content">Κείμενο</label>
        <?php
        if ($_GET["mode"] == "edit") {
            echo '<textarea id="content" name="content" rows="4" cols="50" required>' . $result[0]["content"] . '</textarea>';
        } else
            echo '<textarea id="content" name="content" required> </textarea>';
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
$date = $subject = $content = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_GET["mode"] == "edit") {
            //edit
            $sql = "UPDATE announcements SET date='" . $date ."' WHERE id=". $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE announcements SET subject='" . $subject ."' WHERE id=". $_GET["id"];
            $conn->exec($sql);
            $sql = "UPDATE announcements SET content='" . $content ."' WHERE id=". $_GET["id"];
        } else {
            //create
            $sql = "INSERT INTO announcements (date, subject, content)
            VALUES ('$date', '$subject', '$content')";
        }
        // use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
    }

    $conn = null;

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'announcement.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
?>
