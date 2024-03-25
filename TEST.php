<?php
require_once "inc/init.php";

global $conn;
$query =
    "SELECT students.*, classes.class_name 
FROM students 
JOIN classes ON students.id = classes.student_id
ORDER BY students.id
LIMIT 0, 50";

$statement = $conn->connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

print_r($result);
