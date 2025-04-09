<?php
include_once "Students.php";
include_once "Sections.php";
session_start();
$student = Students::getStudent($_GET['id']);
?>

<!-- External Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
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

    img {
        width: 40px;
        height: 40px;
        object-fit: cover;
        border-radius: 50%;
    }

    .container {
        background-color: white;
        padding: 30px;
        margin-top: 60px;
        box-shadow: 0 0 10px rgba(0,0,0,0.05);
        border-radius: 12px;
    }

    .btn-primary {
        margin-top: 20px;
        border-radius: 20px;
        padding: 8px 20px;
    }
</style>

<body>
    <header>
        <h2>Student Management System</h2>
        <div>
            <a href="./home.php">Home</a>
            <a href="./studentList.php" style="opacity:1">Students List</a>
            <a href="./sectionList.php">Sections List</a>
            <a href="./index.php">Logout</a>
        </div>
    </header>

    <div class="container border w-50">      
        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Birthday</th>
                    <th scope="col">Section</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <!-- Correct Image Path -->
                    <td><img src="<?= htmlspecialchars($student['image']); ?>" alt="Student Image"></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['birthday'] ?></td>
                    <td>
                        <?php 
                        $section = Sections::getSection($student['section']);
                        echo $section['designation']; 
                        ?> 
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="./studentList.php">
            <button class="btn btn-primary">Go Back</button>
        </a>
    </div>
</body>
