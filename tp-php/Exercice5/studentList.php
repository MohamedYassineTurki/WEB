<?php
include_once "Students.php";
include_once "Sections.php";
session_start();

if(isset($_GET['idSection'])){
    $students = Students::getStudentBySection($_GET['idSection']);
} else if(isset($_GET['filter'])){
    $students = Students::getStudentsByNameFilter($_GET['filter']);
} else {
    $students = Students::getAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        header {
            background: linear-gradient(to right, #2c3e50, #4ca1af);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 24px;
        }
        header a {
            margin-left: 20px;
            color: #ffffff;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }
        header a:hover {
            opacity: 1;
            text-decoration: underline;
        }
        center {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        form input[type="text"] {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }
        form button {
            padding: 6px 15px;
            font-weight: 500;
        }
        .extractButton {
            margin: 5px;
            text-decoration: none;
        }
        .extractButton button {
            border-radius: 8px;
            padding: 5px 15px;
            font-size: 0.9rem;
            box-shadow: 1px 1px 4px rgba(0,0,0,0.1);
        }
        table th, table td {
            text-align: center;
            vertical-align: middle;
        }
        img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.05);
        }
        i {
            font-size: 1.2rem;
            margin: 0 5px;
            color: #333;
            transition: color 0.2s ease;
        }
        i:hover {
            color: #007bff;
        }
    </style>
</head>
<body>
    <header>
        <h2>Student Management System</h2>
        <a href="./home.php">Home</a>
        <a href="./studentList.php" style="opacity:1">Students List</a>
        <a href="./sectionList.php">Sections List</a>
        <a href="./index.php">Logout</a>
    </header>

    <br>
    <center>Students List</center>
    <br>

    <center>
        <form action="filterStudents.php" method="post">
            <input type="text" placeholder="filter by name" name="filter">
            <button type="submit" class="btn btn-danger">Filter</button>
            <?php if ($_SESSION["userRole"] == 'admin') { ?>
                <a href="addStudentForum.php"><i class="bi bi-person-fill-add fs-1"></i></a>
            <?php } ?>
        </form>

        Copy in
        <?php 
        $parameters = "";
        if (isset($_GET['idSection'])){
            $parameters = "?idSection=" . $_GET['idSection'];
        } else if (isset($_GET['filter'])){
            $parameters = "?filter=" . $_GET['filter'];
        }
        ?>
        <a href="./extractStudentsExcel.php<?= $parameters ?>" class="extractButton">
            <button class="btn btn-light">EXCEL</button>
        </a>
        <a href="./extractStudentsCSV.php<?= $parameters ?>" class="extractButton">
            <button class="btn btn-light">CSV</button>
        </a>
        <a href="./extractStudentsPdf.php<?= $parameters ?>" class="extractButton">
            <button class="btn btn-light">PDF</button>
        </a>
    </center>

    <br>

    <div class="container border w-50">
        <table class="table table-striped-columns" id="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th style="width: 50px;">image</th>
                    <th>name</th>
                    <th>birthday</th>
                    <th>section</th>
                    <th style="width: 150px;">options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($students as $student): ?>
                    <tr>
                        <td><?= htmlspecialchars($student['id']) ?></td>
                        <td>
                            <?php
                            $imagePath = htmlspecialchars($student['image']);
                            if (!empty($imagePath) && file_exists($imagePath)) {
                                echo "<img src='$imagePath' alt='Student Image'>";
                            } else {
                                echo "<img src='default-avatar.png' alt='No Image'>";
                            }
                            ?>
                        </td>
                        <td><?= htmlspecialchars($student['name']) ?></td>
                        <td><?= htmlspecialchars($student['birthday']) ?></td>
                        <td>
                            <?php 
                            $section = Sections::getSection($student['section']);
                            echo htmlspecialchars($section['designation']); 
                            ?>
                        </td>
                        <td class="text-center">
                            <a href="./detailStudent.php?id=<?= $student['id'] ?>"><i class="bi bi-info-circle-fill"></i></a>
                            <?php if ($_SESSION["userRole"] == 'admin') { ?>
                                <a href="./deleteStudent.php?id=<?= $student['id'] ?>"><i class="bi bi-trash"></i></a>
                                <a href="./updateStudentForm.php?id=<?= $student['id'] ?>"><i class="bi bi-pencil"></i></a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new DataTable(document.getElementById('table'), {
                pageLength: 5
            });
        });
    </script>
</body>
</html>
