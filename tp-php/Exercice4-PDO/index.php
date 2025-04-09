
<?php
//to debug errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>


<?php 
$pageTitle="Home";
include 'autoloader.php';
include_once 'class/connexionDB.php';
include_once 'class/student.php';

student::addStudent("Yassine", "2005-07-01");
student::addStudent("Mariem", "2004-06-21");
student::addStudent("Khalil", "2004-08-16");

$query="SELECT id,nom AS name, birth_date FROM students";
$req=student::getBd()->query($query);
$students=$req->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div>        
            <table>
            <thead>
                <tr>
                <th>id</th>
                <th>name</th>
                <th>birthday</th>
                <th>detail</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student): ?>
                <tr>
                <td> <?= $student->id  ?></td>
                <td><?= $student->name  ?></td>
                <td><?= $student->birth_date  ?></td>
                <td><a href="detailEtudiant.php?id=<?= $student->id ?>"><i class="bi bi-info-circle-fill"></i></a></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            </table>
        </div>            
</body>
</html>
