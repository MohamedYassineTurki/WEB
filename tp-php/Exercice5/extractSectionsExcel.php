<?php
require_once '../EX6/Repository.php';
require_once 'Connection.php';
require_once 'Sections.php';

$sections = Sections::getAll();

if (count($sections) > 0) {
    $filename = "sections_" . date('Y-m-d');
    
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $filename . '.xls"');
    
    $html = '<html>';
    $html .= '<head><meta charset="UTF-8"></head>';
    $html .= '<body>';
    $html .= '<table border="1">';
    $html .= '<tr><th>ID</th><th>Designation</th><th>Description</th></tr>';
    
    foreach ($sections as $sec) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($sec['id']) . '</td>';
        $html .= '<td>' . htmlspecialchars($sec['designation']) . '</td>';
        $html .= '<td>' . htmlspecialchars($sec['description']) . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    $html .= '</body></html>';
    
    echo $html;
    exit();
} else {
    echo "No sections available to export.";
    exit();
}
?>