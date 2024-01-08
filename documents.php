<?php include 'check_login.php'; ?>
<?php
try {
    $conn = require 'db_connect.php';

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
        <?php include 'menu.php';?>
        <div class="content">
            <?php
            if ($_SESSION["role"]=='Tutor'){
                echo "<a href='documentForm.php?mode=new'>Προσθήκη νέου εγγράφου</a>";
            }
            for ($x = 0; $x < sizeof($result); $x++) {
                echo '<div class="announcement">';
                echo '<h2 class="announcement-title">' . $result[$x]['title'] . '</h2>';
                if ($_SESSION["role"] == 'Tutor'){
                    echo '<a href="deleteDocument.php?id='.$result[$x]['id'].'">διαγραφή</a> ';
                    echo '<a href="documentForm.php?mode=edit&id='.$result[$x]['id'].'">επεξεργασία</a>';
                }
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