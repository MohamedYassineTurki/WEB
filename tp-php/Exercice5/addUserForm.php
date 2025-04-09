<?php
session_start();
?>

<!-- External Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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

    .form-container {
        width: 100%;
        max-width: 500px;
        margin: 60px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-container p {
        color: red;
        font-weight: bold;
    }

    .btn-back {
        position: absolute;
        bottom: 20px;
        right: 20px;
    }
</style>

<body>
    <header>
        <h2>Student Management System</h2>
        <div>
            <a href="./home.php">Home</a>
            <a href="./studentList.php">Students List</a>
            <a href="./sectionList.php">Sections List</a>
            <a href="./index.php">Logout</a>
        </div>
    </header>

    <div class="form-container alert alert-warning">
        <?php
            if (isset($_GET['errorMsg'])) {
                echo "<p>{$_GET['errorMsg']}</p>";
            }
        ?>

        <form method='post' action='addUser.php'>
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Role:</label><br>
                <input type="radio" name="role" value="user" checked> User
                <input type="radio" name="role" value="admin"> Admin
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password1" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password1" id="password1" required>
            </div>

            <div class="mb-3">
                <label for="password2" class="form-label">Retype Password:</label>
                <input type="password" class="form-control" name="password2" id="password2" required>
            </div>

            <button type="submit" class="btn btn-primary float-end">Add User</button>
        </form>
    </div>

    <a href="./index.php" class="btn-back">
        <button class="btn btn-secondary">Go Back</button>
    </a>
</body>
