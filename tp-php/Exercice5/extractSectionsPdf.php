<?php
require_once '../EX6/Repository.php';
require_once 'Connection.php';
require_once 'Sections.php';


$sections = Sections::getAll();


if (count($sections) > 0) {
    $filename = "sections_" . date('Y-m-d') . ".pdf";

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    
    
    $pdf = "%PDF-1.4\n";
    

    $pdf .= "1 0 obj\n";
    $pdf .= "<< /Type /Catalog /Pages 2 0 R >>\n";
    $pdf .= "endobj\n";
    
    $pdf .= "2 0 obj\n";
    $pdf .= "<< /Type /Pages /Kids [3 0 R] /Count 1 >>\n";
    $pdf .= "endobj\n";
    
    $pdf .= "3 0 obj\n";
    $pdf .= "<< /Type /Page /Parent 2 0 R /Resources << /Font << /F1 4 0 R >> >> /MediaBox [0 0 612 792] /Contents 5 0 R >>\n";
    $pdf .= "endobj\n";
    
    $pdf .= "4 0 obj\n";
    $pdf .= "<< /Type /Font /Subtype /Type1 /Name /F1 /BaseFont /Helvetica >>\n";
    $pdf .= "endobj\n";
  
    $content = "BT\n";
    $content .= "/F1 16 Tf\n";
    $content .= "50 700 Td\n";
    $content .= "(Sections Export - " . date('Y-m-d') . ") Tj\n";
    
    $y = 650;
    foreach ($sections as $sec) {
        $content .= "1 0 0 1 50 $y Tm\n";
        $content .= "/F1 12 Tf\n";
        $content .= "(ID: " . $sec['id'] . ") Tj\n";
        
        $y -= 20;
        $content .= "1 0 0 1 50 $y Tm\n";
        $content .= "(Designation: " . $sec['designation'] . ") Tj\n";
        
        $y -= 20;
        $content .= "1 0 0 1 50 $y Tm\n";
        $content .= "(Description: " . $sec['description'] . ") Tj\n";
        
        $y -= 30;
        
        $content .= "1 0 0 1 50 $y Tm\n";
        $content .= "(-------------------------------------------) Tj\n";
        
        $y -= 30;
        
 
        if ($y < 100) {
            $content .= "ET\n";
            $y = 700;
            $content .= "BT\n";
        }
    }
    
    $content .= "ET\n";

    $contentLength = strlen($content);
    
    $pdf .= "5 0 obj\n";
    $pdf .= "<< /Length $contentLength >>\n";
    $pdf .= "stream\n";
    $pdf .= $content;
    $pdf .= "endstream\n";
    $pdf .= "endobj\n";
 
    $pdf .= "trailer\n";
    $pdf .= "<< /Root 1 0 R /Size 6 >>\n";
    $pdf .= "startxref\n";
    $pdf .= "0\n";
    $pdf .= "%%EOF";
 
    echo $pdf;
    exit();
} else {
    echo "No sections available to export.";
    exit();
}
?>