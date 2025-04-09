<?php
include_once "Sections.php";
session_start();
$sections = Sections::getAll();
?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

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

    table th,
    table td {
        text-align: center;
        vertical-align: middle;
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<body>
    <header>
        <h2>Student Management System</h2>
        <div>
            <a href="./home.php">Home</a>
            <a href="./studentList.php">Students List</a>
            <a href="./sectionList.php" style="opacity:1">Sections List</a>
            <a href="./index.php">Logout</a>
        </div>
    </header>

    <br>
    <center>Sections List</center>
    <br>

    <center>
        Copy in
        <?php 
        $parameters = "";
        if (isset($_GET['filter'])){
            $parameters = "?filter=$_GET[filter]";
        }
        ?>
        <a href="./extractSectionsExcel.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">EXCEL</button>
        </a>
        <a href="./extractSectionsCSV.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">CSV</button>
        </a>
        <a href="./extractSectionsPdf.php<?= $parameters?>" class="extractButton">
            <button class="btn btn-light">PDF</button>
        </a>
        <?php if($_SESSION["userRole"]=='admin'){ ?>
            <a href="addSectionForum.php"><i class="bi bi-plus-circle-fill fs-1"></i></a>
        <?php } ?>
    </center>
    <br>

    <div class="container border w-50">      
        <table class="table table-striped-columns" id="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Designation</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($sections as $section): ?>
                <tr>
                    <td><?= $section['id']; ?></td>
                    <td><?= $section['designation']; ?></td>
                    <td><?= $section['description']; ?></td>
                    <td class="text-center">
                        <a href="studentList.php?idSection=<?= $section['id'] ?>"><i class="bi bi-card-list"></i></a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        new DataTable(document.getElementById('table'), { pageLength: 2 });
    });
</script>
