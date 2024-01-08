<?php include 'check_login.php'; ?>

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
        <?php include 'menu.php';?>
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