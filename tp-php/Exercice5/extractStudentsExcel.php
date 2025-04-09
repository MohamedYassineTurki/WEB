<?php
require_once '../EX6/Repository.php';
require_once 'Connection.php';
require_once 'Students.php';

$students = Students::getAll();

$filename = "students_" . date('Y-m-d') . ".xls";
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="' . $filename . '"');

echo '
<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--[if gte mso 9]>
    <xml>
        <x:ExcelWorkbook>
            <x:ExcelWorksheets>
                <x:ExcelWorksheet>
                    <x:Name>Student List</x:Name>
                    <x:WorksheetOptions>
                        <x:DisplayGridlines/>
                    </x:WorksheetOptions>
                </x:ExcelWorksheet>
            </x:ExcelWorksheets>
        </x:ExcelWorkbook>
    </xml>
    <![endif]-->
    <style>
        td {mso-number-format:\@;}
        .number {mso-number-format:General;}
        .date {mso-number-format:"yyyy-mm-dd";}
    </style>
</head>
<body>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de Naissance</th>
            <th>Section</th>
        </tr>';

foreach ($students as $student) {
    echo '<tr>
        <td class="number">' . htmlspecialchars($student['id']) . '</td>
        <td>' . htmlspecialchars($student['name']) . '</td>
        <td class="date">' . htmlspecialchars($student['birthday']) . '</td>
        <td>' . htmlspecialchars($student['section']) . '</td>
    </tr>';
}

echo '</table>
</body>
</html>';
exit();
?>