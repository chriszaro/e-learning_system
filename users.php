<?php include 'check_login.php'; ?>
<?php

try {
    $conn = require 'db_connect.php';

    $query = "SELECT * FROM users";
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
    <title>Διαχείριση χρηστών</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body" id="top">
    <h1>Διαχείριση χρηστών</h1>
    <div class="container">
        <?php include 'menu.php'; ?>
        <div class="content">
            <table class="table">
                <tr>
                    <th>email</th>
                    <th>password</th>
                    <th>Όνομα</th>
                    <th>Επίθετο</th>
                    <th>Ρόλος</th>
                    <th></th>
                    <th></th>
                </tr>

                <?php
                for ($x = 0; $x < sizeof($result); $x++) {
                    echo '<tr>';

                    //email
                    echo '<td>'. $result[$x]['email'] . '</td>';

                    //password
                    echo '<td>'. $result[$x]['password'] . '</td>';

                    //firstname
                    echo '<td>'. $result[$x]['firstname'] . '</td>';

                    //last name
                    echo '<td>'. $result[$x]['lastname'] . '</td>';

                    //role
                    echo '<td>'. $result[$x]['role'] . '</td>';

                    //edit
                    echo '<td>';
                    echo '<a href="userForm.php?mode=edit&email='.$result[$x]['email'].'">επεξεργασία</a>';
                    echo '</td>';

                    //delete
                    echo '<td>';
                    echo '<a href="deleteUser.php?email='.$result[$x]['email'].'">διαγραφή</a> ';
                    echo '</td>';

                    echo '</tr>';
                }
                ?>

            </table>
            <br>
            <?php  echo "<a href='userForm.php?mode=new'>Προσθήκη νέου χρήστη</a>";?>
            <div class="top-button-container">
                <div class="top-button-empty-space"></div>
                <div class="top-button"><a href="#top">top</a></div>
            </div>

        </div>
    </div>
</div>

</body>
</html>