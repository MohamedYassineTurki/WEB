<?php

include_once "Students.php";

$id = $_GET['id'];

if (isset($_POST["sectionCheckBox"])) {
    $section = $_POST["section"];
    Students::updateStudentSection($id, $section);
}

if (isset($_POST["imageCheckBox"])) {
    if (isset($_FILES["imageFile"]) && $_FILES["imageFile"]["error"] == 0) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = basename($_FILES["imageFile"]["name"]);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFilePath)) {
            // Update DB with relative path
            Students::updateStudentImage($id, $targetFilePath);
        } else {
            echo "Error uploading file.";
        }
    }
}

header("Location: ./studentList.php");
exit();
?>
