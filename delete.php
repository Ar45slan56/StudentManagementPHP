<?php
include_once 'Student.php';
include_once 'Database.php';

$database = new Database();
$db = $database->getConnection();
$student = new Student($db);

if (isset($_GET['id'])) {
    $student->id = $_GET['id'];

    if ($student->delete()) {
        header("Location: index.php?message=Student deleted successfully.");
    } else {
        echo "Unable to delete student.";
    }
} else {
    echo "ID parameter is missing.";
}
?>
