<?php include 'check_login.php'; ?>

<?php
try {
    $conn = require 'db_connect.php';
    if ($_GET["mode"] == "edit") {

        $query = "SELECT * FROM users WHERE email='" . $_GET["email"] . "'";
        //echo $query;
        $stmt = $conn->prepare($query);
        $stmt->execute();

        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetchAll();
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    if ($_GET["mode"] == "edit") {
        echo "<title>Επεξεργασία χρήστη</title>";
    } else
        echo "<title>Προσθήκη χρήστη</title>";
    ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="body">
    <?php
    if ($_GET["mode"] == "edit") {
        echo "<h1>Επεξεργασία χρήστη</h1>";
    } else
        echo "<h1>Προσθήκη χρήστη</h1>";
    ?>
    <div class="centered-div">
        <form action="<?php if ($_GET["mode"] == "edit") {
            echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?mode=edit&email=" . $_GET["email"];
        } else
            echo htmlspecialchars($_SERVER["PHP_SELF"]);
        ?>" method="post">
            <label class="tipernao" for="email">email</label><br>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input class="tipernao" type="text" id="email" name="email" value="' . $result[0]["email"] . '" required disabled>';
            } else
                echo '<input class="tipernao" type="text" id="email" name="email" required>';
            ?>
            <br><label class="tipernao" for="password">password</label><br>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input class="tipernao" type="text" id="password" name="password" value="' . $result[0]["password"] . '" required>';
            } else
                echo '<input class="tipernao" type="text" id="password" name="password" required>';
            ?>
            <br><label class="tipernao" for="firstname">Όνομα</label><br>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input class="tipernao" type="text" id="firstname" name="firstname" value="' . $result[0]["firstname"] . '" required>';
            } else
                echo '<input class="tipernao" type="text" id="firstname" name="firstname" required>';
            ?>
            <br><label class="tipernao" for="lastname">Επίθετο</label><br>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input class="tipernao" type="text" id="lastname" name="lastname" value="' . $result[0]["lastname"] . '" required>';
            } else
                echo '<input class="tipernao" type="text" id="lastname" name="lastname" required>';
            ?>
            <br>
            <label class="tipernao" for="role">Ρόλος</label>
            <?php
            if ($_GET["mode"] == "edit") {
                if ($result[0]["role"] == "Tutor") {
                    echo '<input type="radio" id="tutor" name="role" value="Tutor" checked>';
                } else {
                    echo '<input type="radio" id="tutor" name="role" value="Tutor">';
                }
                echo '<label for="tutor">Tutor</label>';
                if ($result[0]["role"] == "Student") {
                    echo '<input type="radio" id="student" name="role" value="Student" checked>';
                } else {
                    echo '<input type="radio" id="student" name="role" value="Student">';
                }
                echo '<label for="student">Student</label>';
            } else {
                echo '<input type="radio" id="tutor" name="role" value="Tutor">';
                echo '<label for="tutor">Tutor</label>';
                echo '<input type="radio" id="student" name="role" value="Student">';
                echo '<label for="student">Student</label>';
            }
            ?>
            <br>
            <?php
            if ($_GET["mode"] == "edit") {
                echo '<input class="tipernao" type="submit" value="Ενημέρωση">';
            } else
                echo '<input class="tipernao" type="submit" value="Προσθήκη">';
            ?>

        </form>
    </div>
</div>

</body>
</html>

<?php

// define variables and set to empty values
$date = $subject = $content = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $role = $_POST["role"];

    try {
        if ($_GET["mode"] == "edit") {
//edit
            $sql = "UPDATE users SET password='" . $password . "' WHERE email='" . $_GET["email"]. "'";
            $conn->exec($sql);
            $sql = "UPDATE users SET firstname='" . $firstname . "' WHERE email='" . $_GET["email"]. "'";
            $conn->exec($sql);
            $sql = "UPDATE users SET lastname='" . $lastname . "' WHERE email='" . $_GET["email"]. "'";
            $conn->exec($sql);
            $sql = "UPDATE users SET role='" . $role . "' WHERE email='" . $_GET["email"]. "'";
        } else {
//create
            $sql = "INSERT INTO users (email, password, firstname, lastname, role)
            VALUES ('$email', '$password', '$firstname', '$lastname', '$role')";
        }
// use exec() because no results are returned
        $conn->exec($sql);
    } catch (PDOException $e) {
    }

    $conn = null;

    $host = $_SERVER['HTTP_HOST'];
    $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    $extra = 'users.php';
    header("Location: http://$host$uri/$extra");
    exit();
}
?>
