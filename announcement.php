<?php include 'check_login.php'; ?>
<?php

try {
    $conn = require 'db_connect.php';

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
        <?php include 'menu.php';?>
        <div class="content">
            <?php
            if ($_SESSION["role"] == 'Tutor') {
                echo "<a href='announcementForm.php?mode=new'>Προσθήκη νέας ανακοίνωσης</a>";
            }
            for ($x = 0; $x < sizeof($result); $x++) {
                echo '<div class="announcement">';
                echo '<h2 class="announcement-title">Ανακοίνωση ' . ($x + 1) . '</h2>';
                if ($_SESSION["role"] == 'Tutor'){
                    echo '<a href="deleteAnnouncement.php?id='.$result[$x]['id'].'">διαγραφή</a> ';
                    echo '<a href="announcementForm.php?mode=edit&id='.$result[$x]['id'].'">επεξεργασία</a>';
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