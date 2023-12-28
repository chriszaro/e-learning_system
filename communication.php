<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Επικοινωνία</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body" id="top">
    <h1>Επικοινωνία</h1>
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
            <div class="announcement">
                <h2 class="announcement-title">Αποστολή e-mail μέσω web φόρμας</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <label for="sender"><span class="strong">Αποστολέας:</span></label><br>
                    <input type="text" id="sender" name="sender" placeholder="email" required><br>
                    <label for="subject"><span class="strong">Θέμα:</span></label><br>
                    <input type="text" id="subject" name="subject" required><br>
                    <label for="message"><span class="strong">Κείμενο:</span></label><br>
                    <textarea id="message" name="message" rows="10" cols="30" required></textarea><br>
                    <input type="submit" value="Αποστολή">
                </form>
                <hr>
            </div>
            <div class="announcement">
                <h2 class="announcement-title">Αποστολή e-mail με χρήση e-mail διεύθυνσης</h2>
                <p>Εναλλακτικά μπορείτε να αποστείλετε e-mail στην παρακάτω διεύθυνση
                    ηλεκτρονικού ταχυδρομείου <a href="mailto: tutor@csd.auth.test.gr">tutor@csd.auth.test.gr</a></p>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php

// define variables and set to empty values
$sender = $subject = $message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sender = $_POST["sender"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    $servername = "localhost";
    $username = "abcd001";
    $password = "abcd001";
    $dbname = "student3868partb";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT email FROM users WHERE role = 'Tutor'";
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();

        for ($x = 0; $x < sizeof($result); $x++) {
            $toEmail = $result[$x]["email"];

            $headers = ['From' => $sender, 'Reply-To' => $sender, 'Content-type' => 'text/html; charset=utf-8'];
            $bodyParagraphs = ["Name: {$sender}", "Email: {$sender}", "Message:", $message];
            $body = join(PHP_EOL, $bodyParagraphs);

            error_reporting(E_ERROR | E_PARSE);

            mail($toEmail, $subject, $body, $headers);
        }
        echo '<script>alert("Επιτυχής αποστολή")</script>';

    } catch (PDOException $e) {
    }

    $conn = null;
}
?>


