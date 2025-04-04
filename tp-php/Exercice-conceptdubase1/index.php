<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <?php 
   require_once 'Etudiant.php';
   
    $etudiants=[new Etudiant("Aymen", [11, 13, 18, 7,10,13,2,5,1]),
    new Etudiant("Skander", [15, 9, 8, 16]),];

    foreach ($etudiants as $etudiant){
        echo "<table><tr><th>".$etudiant->getnom()."</th></tr>";
        foreach ($etudiant->getnotes() as $note){
            $classe="";
            if ($note<10){
                $classe="rouge";
            } 
            else if($note>10){
                $classe="vert";
            }
            else{
                $classe="jaune";
            }
            echo "<tr><td class='$classe'>".$note."</td></tr>";
        }
        echo "<tr><td>Votre moyenne est ".$etudiant->calculermoyenne()."</td></tr>";
        echo "</table>";
    }
   
   

   
   ?>
</body>
</html>