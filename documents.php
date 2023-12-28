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

    $query = "SELECT * FROM documents";
    //echo $query;
    $stmt = $conn->prepare($query);
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $result = $stmt->fetchAll();
} catch (PDOException $e) {
}

$conn = null;


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Έγγραφα μαθήματος</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body" id="top">
    <h1>Έγγραφα μαθήματος</h1>
    <div class="container">
        <div class="menu">
            <ul class="menu-list">
                <a href="index.php"><li class="menu-item">Αρχική σελίδα</li></a>
                <a href="announcement.php"><li class="menu-item">Ανακοινώσεις</li></a>
                <a href="communication.php"><li class="menu-item">Επικοινωνία</li></a>
                <a href="documents.php"><li class="menu-item">Έγγραφα μαθήματος</li></a>
                <a href="homework.php"><li class="menu-item">Εργασίες</li></a>
                <a href="logout.php"><li class="menu-item">Logout</li></a>
            </ul>
        </div>
        <div class="content">
            <?php
            session_start();
            if ($_SESSION["role"]=='Tutor'){
                echo "<a href='uploadDocument.php'>Προσθήκη νέου εγγράφου</a>";
            }
            for ($x = 0; $x < sizeof($result); $x++) {
                echo '<div class="announcement">';
                echo '<h2 class="announcement-title">' . $result[$x]['title'] . '</h2>';
                echo '<ul class="announcement-content">';
                echo '<li><span class="italics">Περιγραφή: </span>'. $result[$x]['description'].'</li>';
                echo '<li><a href="'. $result[$x]['location'] .'">Download</a></li>';
                echo '</ul>';
                echo '<hr>';
                echo '</div>';
            }
            ?>

            <div class="top-button-container">
                <div class="top-button-empty-space"></div>
                <div class="top-button"><a href="#top">top</a></div>
            </div>

        </div>
    </div>
</div>

</body>
</html>