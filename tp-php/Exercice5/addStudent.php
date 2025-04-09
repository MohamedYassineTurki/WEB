<?php
include_once "Students.php";

$name = $_POST['StudentName'];
$birthday = $_POST['birthday'];
$section = $_POST["Section"];

// Handle file upload
$image = $_FILES['image']; // The uploaded file

// Set the upload directory
$uploadDir = 'uploads/';
$imageName = basename($image['name']);
$imagePath = $uploadDir . $imageName;

// Check if the image was uploaded successfully
if ($image['error'] === 0) {
    // Move the uploaded image to the 'uploads' directory
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
        // Add the student to the database with the image path
        Students::addStudent($name, $birthday, $imagePath, $section);
        header("Location: ./studentList.php");
        exit();
    } else {
        die("Failed to upload the image.");
    }
} else {
    die("Image upload error: " . $image['error']);
}
?>
