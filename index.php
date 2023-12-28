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
    <title>Αρχική σελίδα</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body">
    <h1>Αρχική σελίδα</h1>
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
        <div class="content"><p>Καλοσωρίσατε στο e-learning του εκπαιδευτικού
                ινστιτούτου Elon Musk.</p>
            <p>Στο διπλανό μενού θα βρείτε:</p>
            <ul>
                <li>την σελίδα των ανακοινώσεων όπου
                    ανακοινώνονται νέα και αλλαγές του προγράμματος μαθημάτων.
                </li>
                <li>την σελίδα επικοινωνίας, μέσω της οποίας μπορείτε να επικοινωνείτε
                    με την διοίκηση και τους καθηγητές</li>
                <li>την σελίδα με τα έγγραφα που παρουσιάζονται στα μαθήματα</li>
                <li>και την σελίδα για την υποβολή των εργασιών.</li>
            </ul>
            <img src="welcome-image.png" alt="Welcome" class="center">
        </div>
    </div>
</div>

</body>
</html>