<?php
include_once 'Student.php';
include_once 'Database.php';

$database = new Database();
$db = $database->getConnection();
$student = new Student($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student->id = $_POST['id'];
    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->phone = $_POST['phone'];
    $student->address = $_POST['address'];

    if ($student->update()) {
        header("Location: index.php?message=Student updated successfully.");
    } else {
        echo "Unable to update student.";
    }
}
?>
