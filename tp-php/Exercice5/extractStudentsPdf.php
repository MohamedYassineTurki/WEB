<?php
require_once '../EX6/Repository.php';
require_once 'Connection.php';
require_once 'Students.php';

// Fetch students data
$students = Students::getAll();

// Generate HTML content
$html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Liste des Etudiants</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        h1 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .footer { text-align: right; margin-top: 30px; font-size: 0.8em; }
    </style>
</head>
<body>
    <h1>Liste des Etudiants</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de Naissance</th>
            <th>Section</th>
        </tr>';

foreach ($students as $student) {
    $html .= '<tr>
        <td>' . htmlspecialchars($student['id']) . '</td>
        <td>' . htmlspecialchars($student['name']) . '</td>
        <td>' . htmlspecialchars($student['birthday']) . '</td>
        <td>' . htmlspecialchars($student['section']) . '</td>
    </tr>';
}

$html .= '</table>
    <div class="footer">Généré le ' . date('d/m/Y à H:i') . '</div>
</body>
</html>';

$filename = "students_" . date('Y-m-d') . ".html";
header('Content-Type: text/html');
header('Content-Disposition: attachment; filename="' . $filename . '"');
echo $html;
exit();
?>