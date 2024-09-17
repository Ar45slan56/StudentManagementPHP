<?php
include_once 'Student.php';
include_once 'Database.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);
$stmt = $student->read();
$num = $stmt->rowCount();

if ($num > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        echo "ID: $id, Name: $name, Email: $email, Phone: $phone, Address: $address<br/>";
    }
} else {
    echo "No students found.";
}
?>
