<?php include 'check_login.php'; ?>

<?php
try {
    $conn = require 'db_connect.php';

    $query = "SELECT * FROM homework";
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
    <title>Εργασίες</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body" id="top">
    <h1>Εργασίες</h1>
    <div class="container">
        <?php include 'menu.php';?>
        <div class="content">
            <?php
            if ($_SESSION["role"]=='Tutor'){
                echo "<a href='homeworkForm.php?mode=new'>Προσθήκη νέας εργασίας</a>";
            }
            for ($x = 0; $x < sizeof($result); $x++) {
                echo '<div class="announcement">';
                echo '<h2 class="announcement-title"> Εργασία ' . ($x+1) . '</h2>';
                if ($_SESSION["role"] == 'Tutor'){
                    echo '<a href="deleteHomework.php?id='.$result[$x]['id'].'">διαγραφή</a> ';
                    echo '<a href="homeworkForm.php?mode=edit&id='.$result[$x]['id'].'">επεξεργασία</a>';
                }
                echo '<ul class="announcement-content">';
                echo '<li><span class="italics">Στόχοι:</span> Οι στόχοι της εργασίας είναι <ol>';
                $pieces = explode(",", $result[$x]['goals']);
                for ($y=0; $y < sizeof($pieces); $y++){
                    echo '<li>';
                    echo $pieces[$y];
                    echo '</li>';
                }
                echo '</ol></li>';
                echo '<li><span class="italics">Εκφώνηση:</span> Κατεβάστε την εκφώνηση της εργασίας από <a href="' . $result[$x]['location'] . '">εδώ</a></li>';
                echo '<li><span class="italics">Παραδοτέα: </span> <ol>';
                $pieces = explode(",", $result[$x]['deliver']);
                for ($y=0; $y < sizeof($pieces); $y++){
                    echo '<li>';
                    echo $pieces[$y];
                    echo '</li>';
                }
                echo '</ol></li>';
                echo '<li><span class="italics red strong">Ημερομηνία παράδοσης:</span> '.$result[$x]['date'].'</li>';
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