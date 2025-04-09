<?php
session_start();
?>

<!-- CSS & JS Libraries -->
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

    h1 {
        text-align: center;
        margin-top: 80px;
        color: #2c3e50;
        font-weight: 600;
        font-size: 2rem;
    }

</style>

<body>
    <header>
        <h2>Student Management System</h2>
        <div>
            <a href="./home.php" style="opacity:1">Home</a>
            <a href="./studentList.php">Students List</a>
            <a href="./sectionList.php">Sections List</a>
            <a href="./index.php">Logout</a>
        </div>
    </header>

    <h1>Hello, PHP LOVERS! Welcome to your administration platform</h1>
</body>
