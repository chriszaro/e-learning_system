<?php include 'check_login.php'; ?>
<?php

try {
    $conn = require 'db_connect.php';

    // sql to delete a record
    $sql = "DELETE FROM documents WHERE id=". $_GET["id"];

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'documents.php';
header("Location: http://$host$uri/$extra");
exit();

?>