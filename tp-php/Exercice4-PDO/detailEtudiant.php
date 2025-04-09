<?php
    include_once "autoloader.php";
    $db = ConnexionDB::getInstance();
    $id = $_GET['id'];
    $query = "SELECT * from students where id={$id}";
    $response = $db->query($query);
    $student=$response->fetch(PDO::FETCH_OBJ);
    if(!$element)
    {
        header("location: ./index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel=stylesheet href="style.css">
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