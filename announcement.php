<?php
session_start();

if (!$_SESSION["user"]) {
    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'login.php';
    header("Location: http://$host$uri/$extra");
    exit();
}

// define variables and set to empty values
$servername = "localhost";
$username = "abcd001";
$password = "abcd001";
$dbname = "student3868partb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM announcements";
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
    <title>Ανακοινώσεις</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body" id="top">
    <h1>Ανακοινώσεις</h1>
    <div class="container">
        <div class="menu">
            <ul class="menu-list">
                <a href="index.php">
                    <li class="menu-item">Αρχική σελίδα</li>
                </a>
                <a href="announcement.php">
                    <li class="menu-item">Ανακοινώσεις</li>
                </a>
                <a href="communication.php">
                    <li class="menu-item">Επικοινωνία</li>
                </a>
                <a href="documents.php">
                    <li class="menu-item">Έγγραφα μαθήματος</li>
                </a>
                <a href="homework.php">
                    <li class="menu-item">Εργασίες</li>
                </a>
                <a href="logout.php"><li class="menu-item">Logout</li></a>
            </ul>
        </div>
        <div class="content">
            <?php
            if ($_SESSION["role"] == 'Tutor') {
                echo "<a href='announcementFormScript.php?mode=new'>Προσθήκη νέας ανακοίνωσης</a>";
            }
            for ($x = 0; $x < sizeof($result); $x++) {
                echo '<div class="announcement">';
                echo '<h2 class="announcement-title">Ανακοίνωση ' . ($x + 1) . '</h2>';
                if ($_SESSION["role"] == 'Tutor'){
                    echo '<a href="deleteRecordScript.php?id='.$result[$x]['id'].'">διαγραφή</a> ';
                    echo '<a href="announcementFormScript.php?mode=edit&id='.$result[$x]['id'].'">επεξεργασία</a>';
                }
                echo '<ul class="announcement-content">';
                echo '<li><span class="strong">Ημερομηνία: </span>' . $result[$x]['date'] . '</li>';
                echo '<li><span class="strong">Θέμα: </span>' . $result[$x]['subject'] . '</li>';
                echo '<li><p>' . $result[$x]['content'] . '</p></li>';
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