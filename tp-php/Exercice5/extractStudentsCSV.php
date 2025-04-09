<?php
require_once '../EX6/Repository.php';
require_once 'Connection.php';
require_once 'Sections.php';

// Retrieve all sections
$sections = Sections::getAll();

// Check if sections are available
if (count($sections) > 0) {
    $filename = "sections_" . date('Y-m-d') . ".txt";
    
    // Set headers for text file download
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    // Generate text content
    $textContent = "SECTIONS EXPORT (" . date('Y-m-d') . ")\n";
    $textContent .= "===========================\n\n";
    
    foreach ($sections as $sec) {
        $textContent .= "ID: " . $sec['id'] . "\n";
        $textContent .= "Designation: " . $sec['designation'] . "\n";
        $textContent .= "Description: " . $sec['description'] . "\n";
        $textContent .= "===========================\n\n";
    }
    
    echo $textContent;
    exit();
} else {
    echo "No sections available to export.";
    exit();
}
?>